import ftplib
import os

file = ('C:/Users/Francesco Romeo/Documents/Scuola/StockN/Data/stockname.txt')
FTP_host = "ftp.romeofrancesco.altervista.org"
FTP = ftplib.FTP()
FTP.encoding = "latin-1"
FTP.connect(FTP_host)
FTP.login("romeofrancesco", "cJhMDN9VF3Hd")
FTP.cwd('Data/')
FTP.retrbinary("RETR " + 'stockname.txt', open(file, 'wb').write)

os.system('python App/python/stock_data.py')
