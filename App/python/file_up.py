# upload file by python
import requests
import glob
import os


def hconn_send(name):
    url = 'http://romeofrancesco.altervista.org/Data/csv_upload.php'
    file = {'myfile': open(name, 'rb')}
    r = requests.post(url, files=file)


def main():
    os.chdir("C:/Users/Francesco Romeo/Documents/Scuola/StockN/Data")
    for file in glob.glob("*.csv"):
        name = "C:/Users/Francesco Romeo/Documents/Scuola/StockN/Data/" + file
        hconn_send(name)
        os.remove(name)
    print('upload completato.')
    print('Script concluso')


main()
