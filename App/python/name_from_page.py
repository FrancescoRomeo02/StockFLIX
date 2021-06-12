import ftplib
import os

file = ('C:/Users/Francesco Romeo/Documents/Scuola/StockFLIX/Data/stockname.txt')
FTP_host = "ftp.romeofrancesco.altervista.org"
FTP = ftplib.FTP()
FTP.encoding = "latin-1"
FTP.connect(FTP_host)
FTP.login("romeofrancesco", "cJhMDN9VF3Hd")
FTP.cwd('Data/')
FTP.retrbinary("RETR " + 'stockname.txt', open(file, 'wb').write)

print('Nomi delle azioni recuperati con successo.')
print('Avvio raccolta dati da Alpha Vantage.')
os.system('python App/python/stock_data.py')
