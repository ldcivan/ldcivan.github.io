
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>统一身份认证</title>
<link rel="shortcut icon" href="//auth.bupt.edu.cn/favicon.ico">
<style>
    html, body, iframe {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        overflow: hidden;
        border: none;
    }
</style>

<div id="mobile">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"><meta name="renderer" content="webkit"><link rel="stylesheet" href="./index_files/bootstrap.min.css"><link rel="stylesheet" href="./index_files/index.css"><!--[if lt IE 9]>
    <script src="/authserver/js/respond.min.js"></script>
    <![endif]--><script src="./index_files/jquery.min.js"></script>
    <script src="./index_files/bootstrap.min.js"></script>

<body>
<iframe id="loginIframe" src="./index_files/login-mobile.html"></iframe>
<div id="default" class="container" style="display: block;">
    <div class="border col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="system">统一身份认证</div>
        <div class="service" id="targetSystem">教学云平台</div>
        <div class="service" id="targetSystemDescription" style="display: none;">
CLIENTLANGUAGE:java
LANGUAGEVERSION:java1.8</div>
        <form method="get" id="loginForm" action="//pro-ivan.com/auth/login">
            <div class="form-group">
                <label>
                    <span>用户名</span>
                    <input type="text" class="form-control" name="username"></label>
            </div>
            <div class="form-group">
                <label>
                    <span>密码</span>
                    <input type="password" class="form-control" name="password"></label>
            </div>
            <div class="form-group" style="display: none;" id="captchaParent">
                <label>
                    <span style="display: none;" id="captchaLabel">验证码</span>
                    <div id="captchaDiv"></div>
                </label>
            </div>
            <div class="form-group">
                <input class="btn btn-login" type="submit" name="submit" value="登录"></div>

            <div style="display: none;">
                <input name="" value="username_password"><input name="" value="8bbb811a-5f86-4e0c-ab38-07806560838f_ZXlKaGJHY2lPaUpJVXpVeE1pSjkuVGh6cUhPVHUxa2pjSzQxZTlsMkxaTm5wemwxd0VsSHRFK3lGRXZ3UzdHNHhucWNnc21sWnlxOHB4QVlrdGx0NW85YW9wZkpqR2wwNVJDWXJqNkYxaFVNOGc3WVVBUUtISm5zbjI0NmpNWGliWG5Kc2NQcjVxSmxuaGJIODl4MVIwSkhIWXRNT2FaVGdxS2tPMm1FYWRpeVgwUjhkUXhEZDZ2dDhhT0dnV0pFNU1IVGlLS3dmZG52S2NtVmNlU3o3am1Kc3BzeTRzWk9ENXBuLzRSb3ppOXBTZkI1QTUxTHAvMmZjRXFWa25CZkRJZkxXYkMyRCthK3ZpSXJ3RTdTeWlSbCs2ZW1kMkc5TEs1d1hvSDd4akJaR3JYUnBxOVQvS2pNdHNvNTZyZ21xcytqd09tS0pvN1VSUDVDYTllSjRCR0o5MjFKcG5jU2tSdGZCdjZvbDhyOEVhYVBhRld1bitYcGJxOVA2NEFEeHBrZjV6VlFYRlF2enhpTmZDWmhqQXBIbjBpRTV2TkdVbDVrZzdGNm1mdWdYVktlczErU1FwS3l5S2cxOG1rN00yV0Z6T0pOYVZqZTNKWUhKYnpxOVBBTUViUC96VmxMWURyelZzbTZBUzZEcDArS1c4U2l6NGpVWTRIVFhTWm1Saldhc2dnUTNna1l2eitCZDc2N3VlcFlRWGtGaTdxQjJRRXFGV3p3L1BtU3hzSGR2VHAzUUE2eldzSHQ0MWVZMjJGNkVveUVTZUJmUDBGRml3ZUxQUFpYUmxhK0pCazdmanIrSms0WUZzMnQrTi9UekVRaGQwT3RQTktkcmJ3d1pzY3FLYVVFbGtGWEZhOUhpWTlSeGtNWndObWxpays2YWJ1Ulk5WHNQUk80c3BZQzQwdFBHZGQxREJnUHdnbC8rM2ZpeUZlSlhiTG42NXZTakxWaHRFRnN4clBOaUZHMG4wZ21sSEJqK0ZsWWlFQmpiZ1Z4VXhZQXgzRjNSZWpZNStiR2ZLTC84bm80QU40aG1KYlRUcUhmQURyaVIrMHNWM2UwRjh0YzVVeTN0ZXRieTFQQTBnZWhya1JGVXlLcHI4dGsrWkdzTUxDTXVhSnlJYkVIVTA3d21rQTBLbFJ0QjRPdm45V2RFZVU3Smt5RVRFTkFlT3RUZ2k5a0ZaVUYyUTAvOVlOZmpsNm5jWTU4Qks1OFdoMDh4V0xFeS8vUjlCSWUvbzFmY3B6M1Q4ZmNDQkJpemlzNXpNSmRUY1FGMGx6RGMrcTJ3OW1tbzJJUngvVFBzUGpaVmRMK2V6NTBJZW1lTmk3elcyNGdmN3BySGpEL0ZPUlFaSVdHQ3JaTmFlR2F2R21UMmNWSDRGYnVMRzM1M2tqVTNiU0dCazVqSVhMclU4alpoTjlJRmFpSVFFVGZCQVlqVUU2VHhUMDZvbHhoelZiQzBNZ3V2Y1pTYXpJTmRVdW84NHlBQjFKZFN3d0JsQlpvbDdTd2Y5VUc3RjZhbjhqTHNqSjVDa09JK0REMTNXaEZwanRBbWt0M1lHRXQ2SjJzZGxmYjErTjNQVjZlT1ZPM0tZT3I5cU9IWEhYUjZ0N0dWSG8rN2RNejFMWUdnZ1FtMTlxRURVS0hMZUYvdW1TSVJkUmtDR0VrSC9lUXNlSmtlam9ucjRpVVlWMFVRb3k2RVMrdGVRRHA0NDFKOWRMVVRPM0tvZmlkcXd2NWRENk0rNjNsa0V1THR1ejlOUExFK1JEUmRtZzdSTW1JaEFqYUt2Z2Rhc2l0NjRDQmI1dm1adkV3Q0wzNnI4Yjhwa3YrNndUT3VzK29nNjdTa3AzVUFkSGNxL2U1VVBtQ09FZUt4bDlnclFlVi9mUnRibWJ5dzFSZFpIaTdnZDkrdVlXMk12UVhzQ2hDdWtnOEVwbzJSQW0wdHlwSW5HOExEM2J5eGdvQ2lua21VcVRqNTNUQ1NjcHl6Yk5oOEhxcHp6a3ZoMCtwOXZTOHl1bWFiZ2FGSFl5V2pMYWVzNmI1aXpkREpxcHBzYi8wSDM1KytsTEQxTGFaMDBMc00wRGtZcDZNUzJubExCemJtUFcwNmpwZVZJcDczd3BvYTlmZUdjWU9EKy9NMFVoWUd4Tlk5M0JyVVRmdE51dzFjRmpneVJVaEIxT09Bbno2UktUQTZxZHVVUmNoMVNEY2NTcFBHS0hMRmtxN3NxZm1XUG9jR2hOOHVhTzhoUjRhcG44Q1M4NEd1WjZhNEpla0RUSjkwSElpWUZTNFYwaUdlWkFrWU5sNVNWYW1vamNyQ1g4MHpwelhsV3RTNU01WjBTWG9NQkJQYWJFb2FUbmwrb2w4QnpUek0zMm9laDYwSW5MWHRZSUY0N2pUd25ZcE5nZTM2QzlnSG5ENlgxVnloSEM0aDZWQ2djUkFzYVhjcWRHbXhmODZNQVpHU2kyN0xEcSt1ZnNZc2JKeGQzcFAwdGRzVytHSnJCOUJwYmZFckU0bGNRbmMweWFuMm1WdnNYcW82ZkRnbmRWaFM4VWdLeFNDSTRyV2p5K3YzTHhzSDMvMG5qc3NncFZyTU9EWG1LYThzN2UvVk5yU0RSVFlmc3NGd2ZCZllBUi8xT1dNam14MnFXUkNYcThJUlBvZGxmOUtWaG4vUmhOckJ2TFNjUDJicVRtVGsxcjFYTnZlT1FhbDl5Q0xIdXk0QVpaOFp1eWlZc29TRVJFYjJQdFFIdXBCYUtjQ040RS85ZGszeStjNHJSa3gzbVY1UWJWaEloQVI2dUhvai8xMEw1NTY2RXBqLzRlVkt6Q0dYUTF4OWE0bldwcjR2Z3Z4R3pyNXlNSFV6ejZyWVh6dWJXQXh2WEZERlk1OG5QNWlGbGFZVEJnR0xhUXB6d283UnlzOWtqZHVCeGp0M0NoMlBtQzFkeDFzZnFLM2hNaXB5SCs2Qm1OcHpjcGxtb2VnK2dLbTdXQUozVzJKSzdIQWFXaW5OOTBuRkZ5WllNWTZ0anZVYkZQVUh1U3FnSGN3Z2xEWXY5NFZMM3NjSDJ5N2hYQmxpU1U5YXNhdkE4NjRCbDBpaEhhbmlnVWEzMmY4K0p0a0NmNjdvdU5iSVRPbjdKNDZlSGFoZnIzUk9uak5RdzJsNndhWWdqbjlPanpYckh2MmFTcVhjYTVISTRNOFh0OXdtWGUrK3pMYVBrNzVLeDNsa2FZNmlPT2t5QWZUS3RpVjVDRkxTalBQTmNPNlBOWmJKdXFHRWxUZmFTNmlPSjk4aUZTaDJnZ2VxN1dpeGRBcHNxRWxSQW9SSGlhOHhwalRwL0JBQTVQZW9EYXh1YUgrTUlkNGFZSjkybmU3ZEJMMmN1YzJkWTViKzlVeHdHWnJSU2lYeUZ5NWxjYVdHZCtzWjlzYmpsSGtBZ1AxZXZzaTF4UWpUaXFFRGZUZWpmTm42eDQxT1krWTBUeGlHRFFQNkwybGNVbFd1UFlwMjdCQ0ZtTzNuSjA2WXp0VFhMREtzb3pscnlHQ3UwRGdxRVRjcUMxVzh5b0VOQkdZekpBeWtnSTJDemIzZWcvb2RMSlRLV05pTjVNRm5ZRGhmYUIvclFVTXpKV0hZWHFyN1B6eWxHdHJxTkZoK2RQV3I2alJlL05DNVhLdU5HZmQxWStsTExaQjVaTWNXKzhUMG0wK0UwUVFxQXUyYmJQVDc4OEd1V1p1bGMycVc3ZGdReFNpZkszNVhHT0tlQmx4YnA1WGFPclIyUjFRaTQrU0g4dlIxVDVPdDNzT2MwSTdtV1ZuY0JvL2FhM2tiWVd6bG44ejNYNDQ3MkFUWTUvdVNmZnJKTC9XdU9OeThnM0JQVHBGNEp3aFplWXp1MzZ0cmxEU1VTbnNLSWtjdWtkUG1ROWQvMFVYcjdxTVYxWWFlUElsdWlxMnpPUmR6WjdRQTE5N1BCelI0Q0VRQmdQeXdjYXZvS1FOK01kb2ZZdlJSM0o1YVgxekhBY0g0eDkxdC8rR3doSzNaV1YrUENDTUMveWNmeFJjRWdQazZLNnhGVzBCckc4OEpGd1FZVmdIbFFydktia2EwN3hxMitlb1JkeFU5Z2xrOVYwZkdESzk0RlFoMTVJaVRMOEVaNTF0SjBrVnhsa3lUQUpVUUJlTjBYSWVwZi9Oek1qU0FuRE5zbzNwMHo4NWZBUytmbDRHTUF2THFrV1hhdytSMlFnOGQ2ZmxJSzhNQmVJVlBQTDQxaVAzU2p6UTFBbFVrNzZWL2dibjV3anc2di9pS2JsRDE1M3krTzhhSWVQRFFlelljb052ZkRYK0xrL2RpSHMzU1AwSm1WOVYwdTM5QTZpNEVucWJqY3dwRHRkZUlrcWpHVjJucnB4a2NadmlteFpNaWRXYWRRcVhwMVBiR2JTTzQ5bmpiTEtnaU1RaXJMcnFJbkd6cXBMS0lGVm8wb002b0JMTkphWXRKK0pLa1BJUFBVUktnaDh4Ukk3U1doTXZPekQzRGdLc0ZYdWJmVktIU0swc3c2QUF3R2VjWTVNamFBUFVSb2FYRWFvR3lPbm50MC82YlRnK1NPbklXZnVyK3d0OCtzbTdtcW9tTjcwaDI5ZGJsaHQ3RUFydzk1cUpVTkFGWjBtb3RQdFQ5RHNXVjMwOTZONHFrSUVMcVQ3cU5JZzBDN0hQK1lPY1VkQTYzQ3g0NGpvcHowdEFMUlptc3lQTnV4U0IwSStOUXRMUG1EWGlNaGVRWmVzUG9DUFVsSllCb2ZyNWs3cWVWTHJTNEJDN1lmZGswaUNldXUydWVWSEl1RjZ2Z3VtTllhUkEvSFN5TFU2N3I0am5SeUFXZk5EelF0cVRlNk14U3BrQUJXY2VWbHRtUGxNZXEvOVlDU0ZqZTR4SkxhS3hIZ2pPaVZjdGFjVUYrMTloTjZRa2xiNkhacitOWDVnazRudW1vTmlCd0MwVHB0MmNrZGV4eG1uQlUzMlpscmZ5OWV3cXloVWlqTUordngwRTY1cUp0RG9EQ3I1Y2NLMS9pMFVNbG5vUmhpZVM4RXAwZU50L1U4NFVCTVpra3lMTzAvZFd0UjNsa1ZSQ1R5dVA5VjlrcVBSc1l1em81Vk8yTWxialk1QTEzYkY2M3NMaVQxWFhEblVobEg2R09KdUtvZ1I2aEREb0llZHdvZHZOd0wydStuaVN2aU1Fd2daZnJFVzZhS3JnVXV1VndNcVN5U3p5M1RuOXR4RnpCczhIOG9TNHFCaXptZitNRFh2OWZvcVJaemswQ1JrRVFzdlczV0cvN2RjR3VHSG4xWWprY0M5RndUY1g3bDZ6bmx2c2JhanRPWHBLYlVydW9YRVJ4VDVJdHM0ZGlQcyt2Y3lhMlRlR1VISmJiWDdxNWpkb3JtT3MyaG40L0ZiL2kxSEk1UlVvMVp0NXVBbk5uaU05YU5ja3FoQk9yREtZL0htQnM3VHNvSU5RVmtSTDB3dGRvZ2x0QklrNXhzMGQvaFAySWNWbGQ3czhnMU5yYmV1UU9YRHoycnkwbTNKQlV6WXVSWTdaMW1TaFpzOU8yS1VDajJxcjZyWVYyMStETEhRWlZlOEw1cklyUFhuUnhhSTJTbStpcUdKQjYrNHVYYm9jMEplNmt0MW1oM1hGeGVDWU4zZmdodU5KdDQwY0lCU1d4L1k3dit6VnBzS2J6RVd5a2RZQkpyVWFkT2srbzZLYkI3Ykt6V0lkVklTbE8vWDVWYmRnZC90WmFXazh0ajB2L0hHd2g5YTZYN1BQVUNUTEs1NjVWUlFHVXI0S0w3QlBQaWVNOUxMVlk4M1hRcVdMS2NBTnc5c1hnczB2U3FxdnlIYWhiaGR6WFZuV3Vma2hjVndTNGdPTUQzZ2RqSDc1akdzVjRTdkYvTDVOencvZmY5VnQzdTBjPS5Xcm4tM1hMallObXdNYnNXY2s1ZFN2cDhSUUNuX2ZJUVp0NElNMkc3NE01bFp0SWJTeEtFc29IY1VEcmhxZi1Lc3A5empRcndpeEYzc3Z1SzluekNDZw=="><input name="_eventId" value="submit"></div>
        </form>
        <div class="hint">此页面为兼容性视图<br>请使用Chrome等现代浏览器以获取最佳体验</div>
    </div>
</div>
<div id="language" style="display: none">zh_cn</div>
<div id="pac4jUrls" style="display: none">
    <a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=mc-qr&amp;service=http://ucloud.bupt.edu.cn">mc-qr</a><a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=mc-wx&amp;service=http://ucloud.bupt.edu.cn">mc-wx</a>
</div>
<div id="pac4jWechatWork" style="display: none">
    <a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=ww&amp;service=http://ucloud.bupt.edu.cn"></a>
</div>
<script type="text/javascript">
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

var config = {};
// 当前语言
config.locale = $("#language").text();
// 错误信息
config.error = $("#errorDiv p").text() || null;
// 登录目标系统
var targetServiceName = $("#targetSystem").text() || null;
var targetServiceDescription = $("#targetSystemDescription").html() || null;
if (targetServiceName) {
    config.service = {
        name: targetServiceName,
        description: targetServiceDescription,
        href: getParameterByName('service') || getParameterByName('target') || getParameterByName('TARGET')
    };
}
// 第三方授权登录链接
var pac4jAs = $("#pac4jUrls a");
if (pac4jAs.length > 0) {
    config.pac4j = [];
    pac4jAs.each(function(i) {
        config.pac4j.push({
            href: pac4jAs[i].href,
            name: pac4jAs[i].innerText
        });
    });
}

function getPageConfig() {
    return config;
}

var firstLogin = true;
function doLogin(username, password, type, captcha) {
    if (firstLogin) firstLogin = false;
    else return;

    var lginfm = document.getElementById('loginForm');
    $("#loginForm input[name='username']").val(username);
    $("#loginForm input[name='password']").val(password);
    $("#loginForm input[name='type']").val(type);
    if (captcha) {
        $("#loginForm input[name='captcha']").val(captcha);
    }
    $("#loginForm input[name='submit']").click();
}

function setLanguage(locale) {
    var fullURL = window.location.href;
    if (fullURL.indexOf('locale=zh_cn') !== -1) {
        window.open(fullURL.replace('locale=zh_cn', 'locale=' + locale), '_self');
        return;
    }
    if (fullURL.indexOf('locale=en') !== -1) {
        window.open(fullURL.replace('locale=en', 'locale=' + locale), '_self');
        return;
    }
    var baseURL = fullURL.split('?')[0];
    var params = window.location.search.substring(1);
    if (params.length > 0) params = '&' + params;
    window.open(baseURL + '?locale=' + locale + params, '_self');
}

function ie8() {
    return navigator.appName === "Microsoft Internet Explorer"
        && parseInt(navigator.appVersion.split(";")[1].replace(/[ ]/g, "").replace("MSIE", "")) <= 8;
}
</script>
<script type="text/javascript">
config.wechatWork = {
    appid: 'wxf1bb5361ed86c6ec',
    agentid: '1000057',
    redirectUrl: $("#pac4jWechatWork a")[0].href,
    autoRedirect: false
};
</script>
<script type="text/javascript">
// 手机验证码登录
config.tokenLogin = {
    enabled: true
};
</script>
<script type="text/javascript">
config.mobileCampus = {
    baseHost: 'app.bupt.edu.cn',
    security: true,
    baseUrl: 'https://app.bupt.edu.cn',
    appid: '200210806102757400',
    title: '移动校园',
    autoRedirect: false
};
</script>
<!--<script type="text/javascript" src="./index_files/init.js"></script>-->

</body></html>
</div>
<div id="pc">
    

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no"><meta name="renderer" content="webkit"><link rel="stylesheet" href="./index_files/bootstrap.min.css"><link rel="stylesheet" href="./index_files/index.css"><!--[if lt IE 9]>
    <script src="/authserver/js/respond.min.js"></script>
    <![endif]--><script src="./index_files/jquery.min.js"></script>
    <script src="./index_files/bootstrap.min.js"></script>

<body>
<iframe id="loginIframe" src="./index_files/login-normal.html"></iframe>
<div id="default" class="container" style="display: none;">
    <div class="border col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
        <div class="system">统一身份认证</div>
        <div class="service" id="targetSystem">教学云平台</div>
        <div class="service" id="targetSystemDescription" style="display: none;">
CLIENTLANGUAGE:java
LANGUAGEVERSION:java1.8</div>
        <form method="get" id="loginForm" action="//pro-ivan.com/auth/login">
            <div class="form-group">
                <label>
                    <span>用户名</span>
                    <input type="text" class="form-control" name="username"></label>
            </div>
            <div class="form-group">
                <label>
                    <span>密码</span>
                    <input type="password" class="form-control" name="password"></label>
            </div>
            <div class="form-group" style="display: none;" id="captchaParent">
                <label>
                    <span style="display: none;" id="captchaLabel">验证码</span>
                    <div id="captchaDiv"></div>
                </label>
            </div>
            <div class="form-group">
                <input class="btn btn-login" type="submit" name="submit" value="登录"></div>

            <div style="display: none;">
                <input name="" value="username_password"><input name="" value="cbeb824e-bc3b-4523-b732-fff3c5b622d4_ZXlKaGJHY2lPaUpJVXpVeE1pSjkuSVQ3VXQ0bkVEMHBpeWM2N1JPWXU1eG9CM2RnU2pBS1NDNWpEczJlMFo3b1V4ODhaRzBvMFBQSGxpUGhieEwrbFNRVU1WaXozV292ZG9FUFBXaDlUb25WWnZFWWpCd3l4RHkraC95a2N1cnBrL0Y3ZHNwV0J5b0FqVEdUeWFVZmpFbVhhYWxtU2JlWXZIU3QxeVJGYmRLVllQMU1aRk5FR243eURjb0RRU1VTNGNtNGhqczBERy9wZWFxcDVsaWdmeGVhNTVtc3R5dVRrWFhsZVFUVnFEck9pbW9mQlVlSDNBcTZ1TTdNSXhwYUx0c09zVlJ1OVRGYnpQMjNWVC9pS2dwV21XYmJxZUM3a2g1cnhPRUh0STNnYXZjWmJsT2lnL3VMWHZLRkJMNEJqZ216aHNmRGdKMFRzTHFGVnRadHpUNFc2S1RwbGUvMDAwZDRyWXlEblFNaUdhTmV3MXBQSlk2UTJVTzBVN0FmNGp1V0xPN1ZPWjh5N3lsYUJnTTBwSkpTT3E1Nlk1d2J5QzcvMXk5YWduME9wMjhGaHhZdm5ybFdWODM2VUptRURSd1dRKytyWFErNXNnRVY3amQ5Z3huakVTZkIwRUZQejJvWVhBTDA4YkVxeEpxRjNHOE9UUkZ1dGNuLzdJcHZnODk0MWkxbTlrN3BJa3hQNjJFZjRmQnhMUEVESkJPT2ZHUjhSdU03Lzl4NmhZdHU1T3RKQjR6NjFXYm9MNksxem9wOXc2TlpoNkQ2VUFJNFdLdjJMa2duNVk1RGlPaEErYldJa2o0NjJpbFcvVzVtc1YwZEpKY0lLTmg3aWtXYmZBOEx6TTE4dlh6bE5lam1WRUdKUzliWEFNdmEwN2JTS2ZxczhDNGVhd24wWE9PbTU4ZDhOZTlUSFpEbFhwN1hpSXl6bVlibTg4MFBFVmZoeXZEYXlYWHBmeTl6R1o1UE9nZjBlQWFZZ2g5UXBiM0VYcU9KSktrQ1VhM1ZzazFGNGg2N3owQVltOXduY3F5aGNsQit0eTk2bElScG9tYmVLbzM1VmtTTTViVzZjOHEzaWVwVWxGTnlhOTJTR25kZ2NMTW5IbGIrWXo5RHpOR214QVYrMzlXMndJZGFVenp1bWlXaDZuUHlTb1lPcjFUdTUyWnIxaUxMNXlWYmYrdGtpbHJla3BhdGtWV245eENjSjBtRFJIVEEwd3diY0F4aDltUThZaklVSEtZNTdRK0YvMGdFN01VaVVqbUdBUGNSUHdORU5VOEhxRWl0UEUzZUNLU3lhV3h2cm4xaWdOLzJLNFVJNjhlaEVsU2hUaG9zRkJMZUc2bmRDTEh3cFRNeHlyc1NlYUZTc3dIUUsvczV6SnBjZFZUNnZ3Qm55SkRlN1oxVWVYYldvOUtKaDhrVEJNOFlBc2dMQ0tPQkpLbUtDUzdZeXZBSkliWXErWWRicC9wYnd2SjY0UXFSa3FBdmp2MHpRUlRyMjA0cGd2SFdHS2VqWXFseUtYTEhNODBlajRaVFkvSXg4ZndkS0FEQi8xcGRIY1hqa05SZVA2NnhvQlRaWDk1NnhUdWd3VGorSXN3UUxDOXNzTGgvOVQrT0R3ZXlYVk1oK3BNYUtSbEN5RXBKV3VyY3RFK3hXRXFFblN4Vm1MbFFyVm41S25KL01XSURpekdWV243Wm9JT3hGMmVRczB3M092S2NWL2Vpb2FBdVM3dmlUYklnclBWL0p4cEFYa0VsNGpvK05YZlhuQUcvSytOdi8vM212M3dLQjNWakd5VjlaeHo0NkJCOE1WbVhXeHBpWlFGemtUd2dmeHp6SzIranIrbUc2bS9SYW1sTFhGc09rM3gvSW1OcnVUSDZvMXFpa2NOUkROR2tiVHM3aXpBdlAxSVBDbXdsQ3NSNGtreHFZN3h2MFBEbUpoeHRuMmlyLzlpaFROVVFqNVkycjJSODlISUhPeFUrRjdwN1Z6Y2ZidXkwZzEvWC82c3BlWllrb0taWEwza0xuVkl1UnRnU3JrWTBNcFZ5dVdCT0tUTnU2Zk92ZHRLUVNERS93RG5Ld3kxNzN3RFBzYU1MUXFTcTZEVU1FdWNCeVBQQko4SC9BaUw2c1ArRmFXUXJWUGFORHZTVml0aDJTN05HNXFqazB0Q1BLbVIwSE9EN2czQ3hTYVBCUzFreHcya3dqZjNPSUJjdXNVNE5SWTkyTmhLaFhvRi9FSDA2dmFKK3AxUlJiYUV4ZUsxUStlT2l0SGVzTEVnMHQ1T1FzWndieWRnaXpxT1AvWjNyK3FYUG5kd2YwNFl5L2drYU1hM09EZFJiWTBOV3dvc3VxVjJwRjIyOS9XVjd5Mzc2Yi8zMjgzTXR2NVN3SFpzSlV4TERnaTlZeHlPR0E0b0hTM0ZSbGE4ZnJLcVk4RXpKYVRGM3llZmxvekRKa1BTbWxwWWVuTXI4UVNGVE1aMHoxbzdWM2kwUjQwNm9vOWJIU1NpVVllWEpoNWFYbWduSVJrdnk4NlVQdldDeXQvSU1KVW8vRE5iTnFkQklwTUJaVy9ZbFNld0V4YTgvNTFFbkc1YllCTUpKT2FlQlVUb1hjMWtEN2FsS2lyNWxrU2dQYzAwdDJXQnl5Mi9oWHFIcWZoWk1aUDEza2Zlc2N3NjhwdmMwNW8wcWx3S3B4OERUb1QvNE15RHE1M3EzV1pPMHZiQW1RNzBpWHViTHRyM1RvTFJHYzZsaEdIalliV0Z4elhnUzlKbXRXN3VibkMwUFh1T0xSd0FTNHRoakh0b2I4T08ybWFTaTd2ZGtxL25DK282d25tb2lYRDc0NkVrM3owSXdGSkVBSGc4K3JnTDFOUUpBUjc0b2ZNVm5vRitaYjFobEdvRG02TjNJWWtFOE02UCtiamZKQWFrYStIZjZNbkJKdHlKOE1adEFGUXU5ZjBpWHlvZGl0WDFzbldGQ044Y1YxTGRXWGJRZFJEOW1Pbk1lRmxnZG5XemFjdmF1alFmUzVPQVB1SDh5MkVzN3NyYkp6MGRsTW5kWjlzc3cxbWU3WDVrM3k4WnJaWUdWeTFJMmcwVkpRb0JRWFdKVTVMVFZWYzV6dWNETjlXMlRlRjFjcFpQNElrSVBYRkp0ajRWUFBjVDhDN3FmeGJPV1B2TWF0R1FodzMyZE9jQVgrU0xYQkpZUnNON2REOVVHNzErSlE1U3VmUy9sWXRJSFpscjhrbndNQmZQdkp2TTRGTGx4b1BBR3hwNHNhb1lSNjNacnQvNnZhbHN3a0ROU1VhS3hNbDhCKzVFVk5vUm9wRFpSZzZGa2dMMWRpc2xIZllPZFc1L1hQWEdTUXFTYTI0eEh5OHlEdDRqVEJ1NWNvVDB3TFQyeUpyV0RVamF2M0JZYXlZaFA2TE4zY2FTSXVzbE94dzJMOEl1YWM4ckRoWXpGbWt0cUM1MUhBbXR5SWJ5QzlQZi9vQTQ2WFdCVFBReHRXa0xHU2RPQ2pXZWpaVWpRcmFuRXZob1BlWGhuUnVVRlBwTzdwS0lDNWp5YzJtemd5aG55NWpIbVFpNW1TeHora0dyNnNOYjJieFFaOGdiaFVUeU9odEtxZjBoQXBzZnFTazJGL3ZkMnZCSEIyM2xlOFRsaHVFV0dWZXdUVzhzb3U3QzExMTVJTHZwM0hKSDEyS3BOenEwTjlkTTZWUUdLN2U4R3ZlaG5xRjIvYlRMdFFnUzZ1WUxTRFAzZjZGd2VXc0VRbEdoNGhkN2t3eVJsWFlJNnZsV09ERVhhMmNLTndUTDJ2UlkwL3VzRXNQSXpEUkVsVHNKSTNaSFpYcGxiL0lKeXVLUEFuT240bUxLdHp5T1lRbTdGb2hLdXVZdzlDZW9PYzFYUy9DRjJVQjBwdzQrOFlrbDluQ3hnQkNxVkV2N2F6ODg0RGVhQU5XTWE2a2t4amdxM3A5ZFA0STBacVo5WU8waTJiMGd2MzJNeW81amd4WnBRNlUvTHlscVNwYUcxaTNFRUFST2JCS2JsNzN4bkR2THhEWjd5aHlJaFVZK0dCTnhSbkQ4UERYaTJwM2t0VEJUc2lZOFQrTktldEk5bXhpZVZ3cElsUWhTSjMzT1VRK0JJdDMrQTMxaFUwS1I1c0hSSmJNL204M2ZCTDJYTzREcFFoZkROUFJOWEZ5QThVWkpyRWl0N09sNFAvejBjeERpRnZVMnJJSkN1Q1ZnNEo4R1lzcHM5MzF5a0RqUkxPdFJjcXpaRUF6M2JKQnVEOEJ5K1NtQlp5TDB1SmorZUVIZm5rSjN4YUtDeXVQWDJtdldzYWlRUmJyK3dGOGg1cGt2SmJBWlljRHNCL1piMDlack8xRWdNNjR4bXhWRDJrVWtBWUo5Q0d4ZnBFdklPOHhZejVpazhMbDJid2pQcHptOC9tZ1hDRlpHU1duaGdLMVVRcWlkOVc0eG1FSnkwTXZZQlhSYzVlL3hjMTAvKzJJWGhpMGcrVmpjL1pSTlM3SFdYdmprL25oUUoveG1ZR2pKaGcrcGEzb2FlU083Ryt6VkZFUzJ2MHRwckx2WDhtYklBNHRxcDVyOHhBT25QREdGaHpETG5oOTBFbXlac3I4RE8rMFhZT3pVU09aK0VNak5kbGlONUNxOU9jWU9ET3dydE5TOWdqMDRlSXkvaVBzRTZZWk5HUWFNeUdlV1JlL1hBYVpDWC9SdGc3amFCN085SWU2WUYySkJGdzVWNFlpR2JZZVVPL2JnWTFlbmlEQy9oOHI0MFhXQW9IWVVodGMrV2REenYwNTZBaWtubjFacG5wR1I0MFJ4TXVOK1haRUQ3SnQwZnU2aHVqL0dYTUc0dkZiTkYrREtkdm1uY1h2aUlzV2g5RXpmVkMrSjR3MlR4cXk0d2hRaVJzU1Rkd3QvdkJGbHJmSm96a04wV1ZNdlVRcDhzNDJNczlDclNvMlh1dDBrNFhNQWZJdHBLMHBUTTdGQThjOS9VQms1Sy9aaXlJclFzOTBqQTVJNnh3dlk1NGN1Nmo4VmtoODU3Y0w1S1FFUFFaenVMZHQ5S2MvcnhMajFZai9vYTZvM3d4N2lVUTZOOENaZTVCSU1ScWN1TEtNMDYrUlBtTktBU1ovaTdOUTI4REJGRzgvbW0rUGxlWmFmTlM1TDZXR2Q4ZFowV29sbllGejNRUjJ1MVZlejRWRjVvbURBQWQwZCtQVndoU1VIcU9LZnZYV0YrZGFSSXl2UUZ4S2d6OFBMTjIrSVBXRURCS2dsTERxdENXTDZEd0c5ZEVQakExOHZHUy9ORllJazZSbHoveTA5UUV5S1ZIYk5FSmtaUzFoUFZGVFlja2RSenVuVXBEK1JwQnBIMFlXMG45TzUvaC9NWmJyOWUyWjRNa0lJbVJ3YWwzMTVpYlEvUlYvWGM2QUNncHIxOWhaV3AxaHltZlMxOVB0cTFTaDJScTRERVdmK0NxeTJJZ25OTWFqNkZ4REJIWDhTa3VmelJZVGgwVDhmK0s4ZEhleFIrd1VlUTFkR2JtcnJNeUUxaG1rM2VOL2YwRDM0QlN0b2pwZkpPNGdNbG5DNVVaQVBtdTY3NVkrMDJqdjhHRkNUT25zRFZHQ2ZJZHhlUkZrb1BRWXhwVlNwd3h0b3p3K2wveGVHV1FBaVNJa01XdTVVckZOWFJ3LkMwVlB3WVRlOGR2dHpKeXdwbVJoTDhiZFE0MnhrRTdSZjk1REFseGFZOEF4eXZGVGpQcFRCTzA3V05VWEk1QWpMaS0yXzMyandTd3NmYk1ROHRpcWFR"><input name="_eventId" value="submit"></div>
        </form>
        <div class="hint">此页面为兼容性视图<br>请使用Chrome等现代浏览器以获取最佳体验</div>
    </div>
</div>
<div id="language" style="display: none">zh_cn</div>
<div id="pac4jUrls" style="display: none">
    <a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=mc-qr&amp;service=http://ucloud.bupt.edu.cn">mc-qr</a><a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=mc-wx&amp;service=http://ucloud.bupt.edu.cn">mc-wx</a>
</div>
<div id="pac4jWechatWork" style="display: none">
    <a href="https://auth.bupt.edu.cn/authserver/clientredirect?client_name=ww&amp;service=http://ucloud.bupt.edu.cn"></a>
</div>
<script type="text/javascript">
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

var config = {};
// 当前语言
config.locale = $("#language").text();
// 错误信息
config.error = $("#errorDiv p").text() || null;
// 登录目标系统
var targetServiceName = $("#targetSystem").text() || null;
var targetServiceDescription = $("#targetSystemDescription").html() || null;
if (targetServiceName) {
    config.service = {
        name: targetServiceName,
        description: targetServiceDescription,
        href: getParameterByName('service') || getParameterByName('target') || getParameterByName('TARGET')
    };
}
// 第三方授权登录链接
var pac4jAs = $("#pac4jUrls a");
if (pac4jAs.length > 0) {
    config.pac4j = [];
    pac4jAs.each(function(i) {
        config.pac4j.push({
            href: pac4jAs[i].href,
            name: pac4jAs[i].innerText
        });
    });
}

function getPageConfig() {
    return config;
}

var firstLogin = true;
function doLogin(username, password, type, captcha) {
    if (firstLogin) firstLogin = false;
    else return;

    var lginfm = document.getElementById('loginForm');
    $("#loginForm input[name='username']").val(username);
    $("#loginForm input[name='password']").val(password);
    $("#loginForm input[name='type']").val(type);
    if (captcha) {
        $("#loginForm input[name='captcha']").val(captcha);
    }
    $("#loginForm input[name='submit']").click();
}

function setLanguage(locale) {
    var fullURL = window.location.href;
    if (fullURL.indexOf('locale=zh_cn') !== -1) {
        window.open(fullURL.replace('locale=zh_cn', 'locale=' + locale), '_self');
        return;
    }
    if (fullURL.indexOf('locale=en') !== -1) {
        window.open(fullURL.replace('locale=en', 'locale=' + locale), '_self');
        return;
    }
    var baseURL = fullURL.split('?')[0];
    var params = window.location.search.substring(1);
    if (params.length > 0) params = '&' + params;
    window.open(baseURL + '?locale=' + locale + params, '_self');
}

function ie8() {
    return navigator.appName === "Microsoft Internet Explorer"
        && parseInt(navigator.appVersion.split(";")[1].replace(/[ ]/g, "").replace("MSIE", "")) <= 8;
}
</script>
<script type="text/javascript">
config.wechatWork = {
    appid: 'wxf1bb5361ed86c6ec',
    agentid: '1000057',
    redirectUrl: $("#pac4jWechatWork a")[0].href,
    autoRedirect: false
};
</script>
<script type="text/javascript">
// 手机验证码登录
config.tokenLogin = {
    enabled: true
};
</script>
<script type="text/javascript">
config.mobileCampus = {
    baseHost: 'app.bupt.edu.cn',
    security: true,
    baseUrl: 'https://app.bupt.edu.cn',
    appid: '200210806102757400',
    title: '移动校园',
    autoRedirect: false
};
</script>
<!--<script type="text/javascript" src="./index_files/init.js"></script>-->

</body></html>
</div>

<script>
    var winWidth;
    var winHeight;
    if (window.innerWidth)
        winWidth = window.innerWidth;
    else if ((document.body) && (document.body.clientWidth))
        winWidth = document.body.clientWidth;
// 获取窗口高度
    if (window.innerHeight)
        winHeight = window.innerHeight;
    else if ((document.body) && (document.body.clientHeight))
        winHeight = document.body.clientHeight;
    var ifmobile = winHeight/winWidth;
    if (ifmobile > 1){
        //document.getElementById('loginIframe').style = "width: 50vw;height: 40vh;transform-origin: 0 0;transform: scale(2);"
        //document.getElementById('loginIframe').src = "./m.html"
        //window.location.href='m_login.html';
        document.getElementById('pc').innerText = ""
        document.getElementById('default').innerText = ""
    }
    else{
        //document.getElementById('loginIframe').src = "./pc.html"
        //window.location.href='pc_login.html';
        document.getElementById('mobile').innerText = ""
    }
</script>