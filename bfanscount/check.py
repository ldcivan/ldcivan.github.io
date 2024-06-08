import os
import random
import json
import datetime
import requests

# 获取当前日期的前一天
previous_day = datetime.datetime.now() - datetime.timedelta(days=1)
previous_day_start = datetime.datetime(previous_day.year, previous_day.month, previous_day.day, 12, 0, 0)
previous_day_end = datetime.datetime(previous_day.year, previous_day.month, previous_day.day, 23, 59, 59)

# 获取./json目录下的所有文件
json_files = os.listdir("./json")

# 随机抽取5个文件
selected_files = random.sample(json_files, 5)

for file_name in selected_files:
    with open(f"./json/{file_name}", "r") as file:
        data = json.load(file)
        
        # 获取最后一项的"time"值
        last_item_time = datetime.datetime.strptime(data[-1]["time"], "%Y-%m-%d %H:%M:%S")
        
        # 检查时间是否在前一天的12:00-24:00之间
        if previous_day_start <= last_item_time <= previous_day_end:
            print(f"文件 {file_name} 中的时间在前一天的12:00-24:00之间")
        else:
            # 发送错误报告
            mail_url = "https://pro-ivan.com/api/e-mail/"  # 替换为实际的邮件发送接口
            jsonerr_data = {
                'mailto': '2531667489@qq.com',
                'subject': 'bilibili粉丝观测系统异常',
                'body': f'观测出现错误(uid: {file_name.split(".")[0]})'
            }
            jsonerr_response = requests.post(mail_url, data=jsonerr_data)
            print(f"错误报告已发送至 {jsonerr_data['mailto']}")
            break

