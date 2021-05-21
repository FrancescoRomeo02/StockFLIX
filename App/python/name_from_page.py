import ftplib
import os

file = ('/home/romeo/StockN/Data/stockname.txt')
server = ftplib.FTP_TLS("ftp.romeofrancesco.altervista.org", "romeofrancesco",
                        "cJhMDN9VF3Hd")
server.cwd('Data/')
server.retrbinary("RETR " + 'stockname.txt', open(file, 'wb').write)

os.system('python3 App/python/stock_data.py')