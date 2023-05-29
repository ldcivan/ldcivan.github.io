import socket
import threading
import random

# 设置服务器的IP和端口号
HOST = '0.0.0.0'
PORT = 14514
clients = {} # 存储客户端信息的字典，键为客户端编号，值为客户端套接字对象

def handle_client(conn, addr):
    client_id = random.randint(1000, 9999) # 为客户端分配一个随机编号
    clients[client_id] = conn # 将客户端信息存储到字典中
    print(f'New connection from {addr}, assigned client ID: {client_id}')
    broadcast(f'\n*** Client {client_id} has joined in ***\n')
    while True:
        try:
            data = conn.recv(1024)
            if not data:
                break
            message = f'Client {client_id}: {data.decode()}'
            broadcast(message)
        except:
            break
    broadcast(f'\n*** Client {client_id} has left ***\n')
    del clients[client_id] # 客户端断开连接后，从字典中删除客户端信息
    print(f'Connection {addr} closed')

def broadcast(message):
    for client_id, conn in clients.items():
        try:
            conn.sendall(message.encode())
        except:
            del clients[client_id]

with socket.socket(socket.AF_INET, socket.SOCK_STREAM) as s:
    s.bind((HOST, PORT))
    s.listen()
    print(f'Server started on {HOST}:{PORT}')
    while True:
        conn, addr = s.accept()
        threading.Thread(target=handle_client, args=(conn, addr)).start()