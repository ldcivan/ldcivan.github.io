# coding: utf-8
import requests
import json
from datetime import datetime
import time
import os.path
from interval import Interval

#jump = int(input('时间间隔：') or 43200)
jump = int(42200)
#uid = input('uid:') or 2100679
uids = [2, 11073, 13540, 41593, 53466, 112428, 198297, 208259, 290982, 341368, 373471, 375375, 396194, 398510, 406868, 407522, 410964, 511982, 520492, 530682, 546195, 562197, 592761, 637783, 745493, 755824, 814133, 895617, 908383, 946974, 1393437, 1473830, 1482610, 1576121, 1589613, 1643718, 1749046, 1992514, 2100679, 2192108, 2843897, 3066511, 3127528, 3341680, 3380239, 3499624, 3633594, 4128618, 4637682, 4708216, 5294454, 5563350, 5591639, 5849993, 6823116, 6989655, 7195010, 7204638, 7223194, 7275647, 7450650, 7980111, 8034163, 8469526, 8569439, 9420577, 10558098, 10874201, 11031510, 11472377, 11685197, 11688464, 11742550, 11997177, 13294045, 13397992, 13609064, 13926577, 14110780, 14311770, 14402657, 14897804, 15161351, 16098578, 18012896, 18149131, 18355431, 19291133, 19467193, 19584552, 20128701, 20165629, 20247643, 21317806, 22157527, 23295567, 23340150, 23343219, 23947287, 25815250, 26104684, 27534330, 29153009, 31012715, 32395478, 32820037, 35386084, 36621411, 36623120, 38053181, 38606568, 39012132, 42561463, 43367551, 43645887, 51537052, 59598675, 59905809, 73415355, 85230887, 90361813, 91542133, 106320250 , 161775300, 163637592, 163917943, 170088482, 172204099, 174902557, 177291194, 198748058, 203655966, 212535360, 233114659, 246370149, 254463269, 256667467, 262453663, 269396974, 280793434, 297242063, 297786973, 305550122, 321828401, 327506375, 348066266, 350001139, 375241551, 375504219, 376666642, 378595726, 382651856, 385105236, 393681308, 399789906, 399789906, 401742377, 402417817, 404145357, 404216060, 407054668, 414149787, 419303895, 423738152, 424397461, 429741851, 429765143, 433459183, 434773406, 435765590, 438790493, 439420557, 441606900, 471259688, 473244363, 477631979, 481714350, 489024723, 489676359, 494819449, 501183549, 504090336, 508963009, 509638078, 511148568, 515339598, 517717593, 521738322, 541696090, 551852678, 591856754, 595407557, 609012502, 617459493, 624757844, 638816489, 670241936, 676513039, 695820059, 698537200, 701012337, 701305680, 1042854135, 1065315233, 1089059487, 1123353719, 1238329219, 1310478759, 1312086407, 1340190821, 1369335586, 1399272173, 1468951948, 1517060220, 1534555786, 1599820022, 1636034895, 1649321129, 1686392291, 1711342368, 1740827542, 1838190318, 1851748934, 1851748934, 1882380182, 1883857209, 1900434152, 1912640352, 1988649419, 2004577615, 2045047052, 2073012767, 2138676495, 2143967328]

wait = 5

my_path = os.path.abspath(os.path.dirname(__file__))
path = os.path.join(my_path, "")



fanss = []
names = []
names1 = {}
fanss2 = {}
names2 = {}

i = 0
for uid in uids:
    web = 'https://api.bilibili.com/x/web-interface/card?mid=' + str(uid)
    data = requests.get(web)
    info = json.loads(data.text)
    if info['code'] == 0:
        fanss.append(info['data']['card']['fans'])
        names.append(info['data']['card']['name'])
    else:
        fanss.append(-1)
        names.append("Null")
    print(datetime.now().strftime("%Y-%m-%d %H:%M:%S"))
    print(names[i]+" 的粉丝数量为："+str(fanss[i]))
    print('变化量：-')

    filename = path+"/文档/" + str(uid) + "  " + str(names[i]) + '.txt'

    if not os.path.exists(filename):
        def text_create(name, msg):
            desktop_path = path+"/文档/"  # 新创建的txt文件的存放路径
            full_path = desktop_path + name + '.txt'  # 也可以创建一个.doc的word文档
            file = open(full_path, 'w')
            file.write(msg)  # msg也就是下面的Hello world!
            # file.close()

        text_create(str(uid) + "  " + str(names[i]), '')

    file_handle=open(path+"/文档/" + str(uid) + "  " + str(names[i]) + '.txt', mode='a')
    file_handle.write('|-'+'\n'+'|'+datetime.now().strftime("%Y-%m-%d %H:%M:%S")+'  ' + "||"+str(fanss[i])+' || '+'-'+'\n')
    file_handle.close()
    i = i+1
    time.sleep(wait)

def timer(n):
    ifif = 0
    while True:
        for index in range(len(uids)):
            f = open(path+"/文档/" + str(uids[index]) + "  " + str(names[index]) + '.txt', mode='a')

            if (ifif == 0):
                web = 'https://api.bilibili.com/x/web-interface/card?mid=' + str(uids[index])
            else:
                fanss[index] = fanss2[index]
                names[index] = names2[index]

        ifif = 1
        #time.sleep(n)
        
        time.sleep(20)  # 每日6，18时开始记录
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
        
        for index in range(len(uids)):
            web = 'https://api.bilibili.com/x/web-interface/card?mid=' + str(uids[index])
            data2 = requests.get(web)
            info2 = json.loads(data2.text)
            if info2['code'] == 0:
                fanss2[index] = info2['data']['card']['fans']
                names2[index] = info2['data']['card']['name']
            else:
                fanss2[index] = -1
                names2[index] = "Null"
            print(datetime.now().strftime("%Y-%m-%d %H:%M:%S"))
            print(names[index]+" 的粉丝数量为："+str(fanss2[index]))
            print('变化量：'+str(fanss2[index]-fanss[index]))

            str2 = '|-'+'\n'+'|'+datetime.now().strftime("%Y-%m-%d %H:%M:%S")+'  ' + "||"+str(fanss2[index])+' || '+str(fanss2[index]-fanss[index])+'\n'
            # str2 = bytes(str2, encoding = "utf8")
            ff = open(path + "/文档/" + str(uids[index]) + "  " + str(names[index]) + '.txt', mode='a')
            ff.write(str2)
            ff.close()
            time.sleep(wait)

timer(jump)