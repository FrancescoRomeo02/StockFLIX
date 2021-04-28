# upload file by python
import requests
import glob
import os


def hconn_send(name):
    url = 'http://romeofrancesco.altervista.org/Data/csv_upload.php'
    file = {'myfile': open(name, 'rb')}
    r = requests.post(url, files=file)


# main
os.chdir("/home/romeo/StockN/Data")
for file in glob.glob("*.csv"):
    name = "/home/romeo/StockN/Data/" + file
    hconn_send(name)