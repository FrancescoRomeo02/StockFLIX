# upload file by python
import requests
import glob
import os


def hconn_send(name):
    url = 'https://romeofrancesco.altervista.org/Data/csv_upload.php'
    file = {'myfile': open(name, 'rb')}
    r = requests.post(url, files=file)


def main():
    os.chdir("C:/Users/Francesco Romeo/Documents/Scuola/StockN/Data")
    for file in glob.glob("*.csv"):
        print(f'Upload di {file}')
        name = "C:/Users/Francesco Romeo/Documents/Scuola/StockN/Data/" + file
        hconn_send(name)
        os.remove(name)
        print('|___Upload completato.')
    print('Tutti i file sono stati caricati con successo.')
    print('Script completato')


main()
