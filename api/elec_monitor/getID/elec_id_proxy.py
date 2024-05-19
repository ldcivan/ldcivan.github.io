import requests
import json
import time
import traceback

YOUR_COOKIE = 'vr3ta5ok87d95148j0s65b4ns3'  # TODO: 在此处填写你登录https://app.bupt.edu.cn/后的cookie中的eai-sess的值
if YOUR_COOKIE == '':
    YOUR_COOKIE = input('未填入cookie，请在此填写您cookie的eai-sess的值：')

content = {'西土城': [], '沙河': []}

try:
    # 打开 JSON 文件
    with open('drom_num_data.json', 'r') as file:
        # 从文件中加载 JSON 数据为 Python 对象（数组）
        ori_data = json.load(file)
    print("读取到历史数据")
except:
    ori_data = {}
    print("无历史数据", traceback.format_exc())

def get_proxy():
    while True:
        proxy = requests.get("http://proxypool.pro-ivan.com/get/?type=https").json()
        if proxy.get("https") == True:
            print(proxy, proxy.get("https"), '找到支持https的ip')
            break
        else:
            print(proxy, proxy.get("https"), '等待支持https的ip')
            time.sleep(1)
    return proxy


def get_id():
    base_url = "https://app.bupt.edu.cn/buptdf/wap/default/"
    part_url = base_url + 'part'
    floor_url = base_url + 'floor'
    drom_url = base_url + 'drom'
    search_url = base_url + 'search'
    cookies = {'eai-sess': YOUR_COOKIE}
    proxy = get_proxy().get("proxy")

    content['西土城'].append('1')
    content['沙河'].append('2')
    for area in range(1, 3):
        if area == 1:
            area_name = "西土城"
        else:
            area_name = "沙河"
        post_data = {"areaid": area}
        while True:
            try:
                response = requests.post(part_url, data=post_data, cookies=cookies, proxies={"https": "http://{}".format(proxy)}, timeout=5)
                area_data = json.loads(response.text)
                break
            except:
                print(traceback.format_exc())
                proxy = get_proxy().get("proxy")
                
        # content[area_name].append(area_data)
        content[area_name].append({})
        # time.sleep(1)

        for partment, partment_item in enumerate(area_data["d"]["data"]):
            print(f"{partment + 1}. {partment_item['partmentName']}")
            partment_id = area_data["d"]["data"][partment]["partmentId"]
            print(f"您选择的宿舍楼ID为：{partment_id}")

            post_data['partmentId'] = partment_id
            while True:
                try:
                    response = requests.post(floor_url, data=post_data, cookies=cookies, proxies={"https": "http://{}".format(proxy)}, timeout=5)
                    # print(response.text)
                    floor_data = json.loads(response.text)
                    break
                except:
                    print(traceback.format_exc())
                    proxy = get_proxy().get("proxy")

            content[area_name][1][partment_item['partmentName']] = [partment_id, {}]
            # time.sleep(1)
            for floor, floor_item in enumerate(floor_data["d"]["data"]):
                print(f"{floor + 1}. {floor_item['floorName']}")
                floor_id = floor_data["d"]["data"][floor]["floorId"]
                print(f"您选择的楼层ID为：{floor_id}")

                post_data['floorId'] = floor_id
                while True:
                    try:
                        response = requests.post(drom_url, data=post_data, cookies=cookies, proxies={"https": "http://{}".format(proxy)}, timeout=5)
                        # print(post_data)
                        drom_data = json.loads(response.text)
                        break
                    except:
                        print(traceback.format_exc())
                        proxy = get_proxy().get("proxy")

                content[area_name][1][partment_item['partmentName']][1][floor_item['floorName']] = [floor_id, {}]
                # time.sleep(1)
                for drom, drom_item in enumerate(drom_data["d"]["data"]):
                    print(f"{drom + 1}. {drom_item['dromName']}")

                    drom_Number = drom_data["d"]["data"][drom]["dromNum"]
                    print(f"您选择的宿舍ID为：{drom_Number}")
                    
                    
                    if ori_data != {} and ori_data[area_name][1][partment_item['partmentName']][1][floor_item['floorName']][1][drom_item['dromName']] != None and ori_data[area_name][1][partment_item['partmentName']][1][floor_item['floorName']][1][drom_item['dromName']]['time'] == None:
                        content[area_name][1][partment_item['partmentName']][1][floor_item['floorName']][1][drom_item['dromName']] = {'drom_Num': drom_Number, 'surplus': None, 'time': None}
                        print("该宿舍数据不可用，跳过")
                    else:
                        while True:
                            try:
                                response = requests.post(search_url, data={"dromNumber": drom_Number}, cookies=cookies, proxies={"https": "http://{}".format(proxy)}, timeout=5)
                                # print(post_data)
                                data = json.loads(response.text)
                                break
                            except:
                                print(traceback.format_exc())
                                proxy = get_proxy().get("proxy")
    
                        surplus = data["d"]["data"]["surplus"]
                        surplus_time = data["d"]["data"]["time"]
                        print(f"截至{surplus_time}您选择的宿舍电费余额为：{surplus}")
                        content[area_name][1][partment_item['partmentName']][1][floor_item['floorName']][1][drom_item['dromName']] = {'drom_Num': drom_Number, 'surplus': surplus, 'time': surplus_time}
                        time.sleep(0.5)
            
            proxy = get_proxy().get("proxy")
    
    #清空文件内容的方法
    with open('drom_num_data.json', 'a') as f:
        f.seek(0)#将文件指针移动到文件开头
        f.truncate()#清空文件内容
    
    # 将 JSON 数据编码为 UTF-8 并格式化输出
    with open('drom_num_data.json', 'a', encoding='utf-8') as f:
        json.dump(content, f, ensure_ascii=False, indent=4)

def main():
    try:
        get_id()
    except:
        time.sleep(60)
        main()

main()
