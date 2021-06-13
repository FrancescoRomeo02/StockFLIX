# upload file by python
import requests
import glob
import os


def hconn_send(name):
    url = 'https://romeofrancesco.altervista.org/Data/csv_upload.php'
    file = {'myfile': open(name, 'rb')}
    r = requests.post(url, files=file)


def main():
    os.chdir("C:/Users/Francesco Romeo/Documents/Scuola/StockFLIX/Data")
    for file in glob.glob("*.csv"):
        print(f'Upload di {file}')
        name = "C:/Users/Francesco Romeo/Documents/Scuola/StockFLIX/Data/" + file
        hconn_send(name)
        os.remove(name)
        print('|___Upload completato.')
    print('Tutti i file sono stati caricati con successo.')
    print('Script completato')
    os.remove('new_stockname.txt')
    os.remove('stockname.txt')


main()
