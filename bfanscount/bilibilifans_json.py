# coding: utf-8
import requests
from datetime import datetime
import time
import os.path
from interval import Interval
import json

# jump = int(input('时间间隔：') or 43200)
jump = int(42200)
# uid = input('uid:') or 2100679

wait = 4

my_path = os.path.abspath(os.path.dirname(__file__))
path = os.path.join(my_path, "")

i = 0

def get_proxy():
    while True:
        proxy = requests.get("http://proxypool.pro-ivan.com/get/?type=https").json()
        if proxy.get("https") == True:
            print('找到支持https的ip', proxy.get("https"), proxy)
            break
        else:
            print('等待支持https的ip', proxy.get("https"), proxy)
            time.sleep(3)
    return proxy

def timer(n):
    global json, data
    while True:
        while True:
            # 当前时间
            now_localtime = time.strftime("%H:%M:%S", time.localtime())
            # 当前时间（以时间区间的方式表示）
            now_time = Interval(now_localtime, now_localtime)

            time_interval_1 = Interval("06:00:00", "06:01:00")
            time_interval_2 = Interval("18:00:00", "18:01:00")

            if now_time in time_interval_1 or now_time in time_interval_2:
                print("新一轮记录开始")
                break
            else:
                print("等待下一轮记录")
                time.sleep(40)

        
        with open(path + '.config', "r") as f:
            uids = json.loads(f.read())  # 每轮都刷新表
        
        if not os.path.exists(path + "/json/"):
            os.makedirs(path + "/json/")
            
        if not os.path.exists(path + "/up_info/"):
            os.makedirs(path + "/up_info/")
        
        proxy = ''

        for index in range(len(uids)):
            if not os.path.exists(path + "/json/" + str(uids[index]) + '.json'):
                with open(path + "/json/" + str(uids[index]) + '.json', 'w'):
                    print("创建了" + str(uids[index]) + '.json')
            
            

            web = 'https://api.bilibili.com/x/web-interface/card?mid=' + str(uids[index])
            headers = {
                'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.93 Safari/537.36',
                'Accept': 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
                'Accept-Language': 'zh-CN,zh;q=0.9',
                'Referer': 'https://www.bilibili.com/',
                'DNT': '1',
                'Connection': 'keep-alive',
                'Upgrade-Insecure-Requests': '1',
                'Cache-Control': 'max-age=0'
            }
            
            retry_time = 0
            while True:
                ifnext = 0
                try:
                    if proxy == '':
                        data = requests.get(web, headers=headers)
                    else:
                        data = requests.get(web, headers=headers, proxies={"https": "http://{}".format(proxy)}, timeout=5)
                    if json.loads(data.text)['code'] == 0:
                        break
                    else:
                        print(str(uids[index]) + "：将进行第" + str(retry_time+1) + "次重试……")
                        if retry_time > 0:
                            proxy = get_proxy().get("proxy")
                        retry_time = retry_time + 1
                        if retry_time > 10:
                            print(str(uids[index]) + "：放弃重试")
                            fanss = -1
                            with open(path + "/json/" + str(uids[index]) + '.json', "r") as f:
                                if os.path.getsize(path + "/json/" + str(uids[index]) + '.json'):
                                    content = json.loads(f.read())
                                    timenow = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
                                    json_content = {'fans': fanss, 'time': timenow}
                                    if not content[:-1] == []:
                                        rate1 = -1
                                        json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1}
                                        if not content[:-13] == []:
                                            rate7 = -1
                                            json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1, 'rate7': rate7}
                                    content.append(json_content)
                                else:
                                    content = [{'fans': 0, 'time': datetime.now().strftime("%Y-%m-%d %H:%M:%S")}]
                            with open(path + "/json/" + str(uids[index]) + '.json', "w") as f:
                                json.dump(content, f)
                            ifnext = 1
                            break
                        time.sleep(2)
                except:
                    proxy = get_proxy().get("proxy")
                    retry_time = retry_time + 1
                    if retry_time >= 10:
                        print(str(uids[index]) + "：放弃重试")
                        fanss = -1
                        with open(path + "/json/" + str(uids[index]) + '.json', "r") as f:
                            if os.path.getsize(path + "/json/" + str(uids[index]) + '.json'):
                                content = json.loads(f.read())
                                timenow = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
                                json_content = {'fans': -1, 'time': timenow}
                                if not content[:-1] == []:
                                    rate1 = -1
                                    json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1}
                                    if not content[:-13] == []:
                                        rate7 = -1
                                        json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1, 'rate7': rate7}
                                content.append(json_content)
                            else:
                                content = [{'fans': 0, 'time': datetime.now().strftime("%Y-%m-%d %H:%M:%S")}]
                        with open(path + "/json/" + str(uids[index]) + '.json', "w") as f:
                            json.dump(content, f)
                        ifnext = 1
                        break
                    print(str(uids[index]) + "：将进行第" + str(retry_time) + "次重试……")
                    time.sleep(2)
            if ifnext == 1:
                continue
            info = json.loads(data.text)
            # print(info)
            if info['code'] == 0:
                fanss = info['data']['card']['fans']
                names = info['data']['card']['name']
                if names != '账号已注销':  # 账号注销则不再更新info
                    with open(path + "/up_info/" + str(uids[index]) + '.json', 'w', encoding='utf-8') as f:
                        if not os.path.exists(path + "/json/" + str(uids[index]) + '.json'):
                            f.truncate()  # 清空文件
                        json.dump(info, f, ensure_ascii=False)
            else:
                fanss = -1
                names = "Null"
            timenow = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
            #timenow = int(time.time())
            print(datetime.now().strftime("%Y-%m-%d %H:%M:%S"))
            print(names + " 的粉丝数量为：" + str(fanss))

            # str = '|-'+'\n'+'|'+datetime.now().strftime("%Y-%m-%d %H:%M:%S")+'  ' + "||"+str(fanss2[index])+' ||
            # '+str(fanss2[index]-fanss[index])+'\n' str2 = bytes(str2, encoding = "utf8")
            json_content = {'fans': fanss, 'time': timenow}
            # ff = open(path + "/json/" + str(uids[index]) + "  " + str(names[index]) + '.json', mode='a')
            # ff.write(str2)
            # ff.close()
            with open(path + "/json/" + str(uids[index]) + '.json', "r") as f:
                if os.path.getsize(path + "/json/" + str(uids[index]) + '.json'):
                    content = json.loads(f.read())

                    if not content[:-1] == []:
                        if fanss != -1:
                            rate1 = int(fanss) - int(content[-2]['fans'])
                        else:
                            rate = -1
                        json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1}
                        if not content[:-13] == []:
                            if fanss != -1:
                                rate7 = int(fanss) - int(content[-14]['fans'])
                            else:
                                rate = -1
                            json_content = {'fans': fanss, 'time': timenow, 'rate1': rate1, 'rate7': rate7}

                    content.append(json_content)
                else:
                    content = [json_content]

            with open(path + "/json/" + str(uids[index]) + '.json', "w") as f:
                json.dump(content, f)
            time.sleep(wait)


timer(jump)
