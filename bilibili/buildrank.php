<?php
function formatNumber($number, $isFans) {
    if ($number > 0 && !$isFans) {
        $formatted_number = "<font color='red'>";
    } elseif ($number < 0 && !$isFans) {
        $formatted_number = "<font color='green'>";
    } elseif (!$number || ($number === 0 && !$isFans)) {
        $formatted_number = "<font color='grey'>";
    } else {
        $formatted_number = "<font color='black'>";
    }
    
    if (!$number) {
        $formatted_number .= '-';
    } elseif ($number < 10000 && $number > -10000) {
        $formatted_number .= $number;
    } elseif($number < 10000000 || $number > -1000000) {
        $formatted_number .= number_format($number / 10000, 1, '.', '') . '万';
    } else {
        $formatted_number .= number_format($number / 10000, 0, '.', '') . '万';
    }
    $formatted_number .= "</font>";
    return $formatted_number;
}

$cache_file = '../bfanscount/cache/ranking.cache';
$cache_expiration_time = 7200; // 缓存有效期为7200秒（2小时）

$current_time = time();

if (file_exists($cache_file) && ($current_time - filemtime($cache_file) < $cache_expiration_time) && file_get_contents($cache_file) !== '' || ((date('G') >= 6 && date('G') < 9) || (date('G') >= 18 && date('G') < 21))) {
    // 如果缓存文件存在且未过期，则直接输出缓存内容
    $ranking_content = file_get_contents($cache_file);
    echo $ranking_content;
    $last_update_time = date('Y-m-d H:i:s', filemtime($cache_file));
    if (((date('G') >= 6 && date('G') < 9) || (date('G') >= 18 && date('G') < 21))) {
        $last_update_time .= '(粉丝数据更新中，榜单暂停更新)';
    }
} else {
    // 如果缓存文件不存在或已过期，则创建或更新缓存
    // 这里假设$ranking_content是你提供的新内容
    $dir = '../bfanscount/json'; // JSON 文件所在目录
    $infoDir = '../bfanscount/up_info'; // 包含相关信息的目录
    $ranking_content = '';
    
    // 扫描目录并获取所有 JSON 文件
    $files = glob($dir . '/*.json');
    
    // 创建一个数组来存储文件名和对应的最后一组数据的 fans 数量和 rate1
    $dataToSort = array();
    
    foreach ($files as $file) {
        $jsonData = file_get_contents($file);
        $data = json_decode($jsonData, true);
    
        // 获取最后一组数据
        $lastData = end($data);
    
        // 检查是否存在 rate1 字段
        if (isset($lastData['rate1'])) {
            $rate1 = $lastData['rate1'];
            $rate7 = $lastData['rate7'];
            $fans = $lastData['fans'];
    
            // 获取文件名（不带 .json 后缀）
            $filename = pathinfo($file, PATHINFO_FILENAME);
    
            // 在 ../fanscount/up_info 目录中查找同名的 JSON 文件
            $infoFile = $infoDir . '/' . $filename . '.json';
            $infoJsonData = file_get_contents($infoFile);
            $infoData = json_decode($infoJsonData, true);
    
            // 提取 ["data"]["card"]["name"] 和 ["data"]["card"]["face"] 的值
            $name = $infoData['data']['card']['name'];
            $face = $infoData['data']['card']['face'];
    
            // 存储文件名、fans 数量、rate1、name 和 face 到数组中
            $dataToSort[] = array(
                'filename' => $filename,
                'fans' => $fans,
                'rate1' => $rate1,
                'rate7' => $rate7,
                'name' => $name,
                'face' => $face
            );
        }
    }
    
    
    // 根据 rate7 进行排序
    usort($dataToSort, function($a, $b) {
        return $b['rate7'] - $a['rate7'];
    });
    
    $ranking_content .=  '<div id="ranking_tab1" class="mdui-p-a-2"><ul class="mdui-list" style="width: 100%; position: absolute; left: 50%; transform: translate(-50%, 0%); margin-top:25px;">';
    // 输出排序后的结果
    $ranking = 1;
    foreach ($dataToSort as $data) {
        $ranking_content .=  '<li class="mdui-list-item" onclick="window.location.href = `./?uid='.$data['filename'].'`;"><i class="mdui-list-item-icon mdui-icon" style="margin-right: 15px; font-weight: bold;">'.$ranking.'</i><div class="mdui-list-item-avatar"><img class="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" data-src="'.$data['face'].'"/></div><div class="mdui-list-item-content mdui-row"><div class="mdui-col-xs-3">'.$data['name'].'</div><div class="mdui-col-xs-3">'.formatNumber($data['fans'], true).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate1'], false).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate7'], false).'</div></div></li>';
        $ranking = $ranking + 1;
        if ($ranking > 20) break;
    }
    $ranking_content .=  '</ul></div>';
    
    
    // 根据 rate1 进行排序
    usort($dataToSort, function($a, $b) {
        return $b['rate1'] - $a['rate1'];
    });
    
    $ranking_content .=  '<div id="ranking_tab2" class="mdui-p-a-2"><ul class="mdui-list" style="width: 100%; position: absolute; left: 50%; transform: translate(-50%, 0%); margin-top:25px;">';
    // 输出排序后的结果
    $ranking = 1;
    foreach ($dataToSort as $data) {
        $ranking_content .=  '<li class="mdui-list-item" onclick="window.location.href = `./?uid='.$data['filename'].'`;"><i class="mdui-list-item-icon mdui-icon" style="margin-right: 15px; font-weight: bold;">'.$ranking.'</i><div class="mdui-list-item-avatar"><img class="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" data-src="'.$data['face'].'"/></div><div class="mdui-list-item-content mdui-row"><div class="mdui-col-xs-3">'.$data['name'].'</div><div class="mdui-col-xs-3">'.formatNumber($data['fans'], true).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate1'], false).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate7'], false).'</div></div></li>';
        $ranking = $ranking + 1;
        if ($ranking > 20) break;
    }
    $ranking_content .=  '</ul></div>';
    
    // 根据 fans 进行排序
    usort($dataToSort, function($a, $b) {
        return $b['fans'] - $a['fans'];
    });
    
    $ranking_content .=  '<div id="ranking_tab3" class="mdui-p-a-2"><ul class="mdui-list" style="width: 100%; position: absolute; left: 50%; transform: translate(-50%, 0%); margin-top:25px;">';
    // 输出排序后的结果
    $ranking = 1;
    foreach ($dataToSort as $data) {
        $ranking_content .=  '<li class="mdui-list-item" onclick="window.location.href = `./?uid='.$data['filename'].'`;"><i class="mdui-list-item-icon mdui-icon" style="margin-right: 15px; font-weight: bold;">'.$ranking.'</i><div class="mdui-list-item-avatar"><img class="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" data-src="'.$data['face'].'"/></div><div class="mdui-list-item-content mdui-row"><div class="mdui-col-xs-3">'.$data['name'].'</div><div class="mdui-col-xs-3">'.formatNumber($data['fans'], true).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate1'], false).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate7'], false).'</div></div></li>';
        $ranking = $ranking + 1;
        if ($ranking > 20) break;
    }
    $ranking_content .= '</ul></div>';
    
    // 根据 rate1 进行排序
    usort($dataToSort, function($a, $b) {
        return $a['rate1'] - $b['rate1'];
    });
    
    
    $ranking_content .=  '<div id="ranking_tab4" class="mdui-p-a-2"><ul class="mdui-list" style="width: 100%; position: absolute; left: 50%; transform: translate(-50%, 0%); margin-top:25px;">';
    // 输出排序后的结果
    $ranking = 1;
    foreach ($dataToSort as $data) {
        $ranking_content .=  '<li class="mdui-list-item" onclick="window.location.href = `./?uid='.$data['filename'].'`;"><i class="mdui-list-item-icon mdui-icon" style="margin-right: 15px; font-weight: bold;">'.$ranking.'</i><div class="mdui-list-item-avatar"><img class="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" data-src="'.$data['face'].'"/></div><div class="mdui-list-item-content mdui-row"><div class="mdui-col-xs-3">'.$data['name'].'</div><div class="mdui-col-xs-3">'.formatNumber($data['fans'], true).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate1'], false).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate7'], false).'</div></div></li>';
        $ranking = $ranking + 1;
        if ($ranking > 20) break;
    }
    $ranking_content .= '</ul></div>';
    
    // 根据 rate7 进行排序
    usort($dataToSort, function($a, $b) {
        return $a['rate7'] - $b['rate7'];
    });
    
    
    $ranking_content .=  '<div id="ranking_tab5" class="mdui-p-a-2"><ul class="mdui-list" style="width: 100%; position: absolute; left: 50%; transform: translate(-50%, 0%); margin-top:25px;">';
    // 输出排序后的结果
    $ranking = 1;
    foreach ($dataToSort as $data) {
        $ranking_content .=  '<li class="mdui-list-item" onclick="window.location.href = `./?uid='.$data['filename'].'`;"><i class="mdui-list-item-icon mdui-icon" style="margin-right: 15px; font-weight: bold;">'.$ranking.'</i><div class="mdui-list-item-avatar"><img class="lazy" referrerpolicy="no-referrer" crossorigin="anonymous" data-src="'.$data['face'].'"/></div><div class="mdui-list-item-content mdui-row"><div class="mdui-col-xs-3">'.$data['name'].'</div><div class="mdui-col-xs-3">'.formatNumber($data['fans'], true).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate1'], false).'</div><div class="mdui-col-xs-3">'.formatNumber($data['rate7'], false).'</div></div></li>';
        $ranking = $ranking + 1;
        if ($ranking > 20) break;
    }
    $ranking_content .= '</ul></div>';
    
    
    // 更新缓存内容
    file_put_contents($cache_file, $ranking_content);

    // 输出更新后的$ranking_content
    echo $ranking_content;
    //$last_update_time = filemtime($cache_file);
    $last_update_time = date('Y-m-d H:i:s');
}

// 输出$ranking_content的更新时间
echo "<div style='width: 100%; text-align: center; font-size: 1em;'>最后更新时间：" . $last_update_time ."</div>";

?>