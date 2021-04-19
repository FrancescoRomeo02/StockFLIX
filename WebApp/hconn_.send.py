# upload file by python
import requests


def hconn_send():
    url = 'http://romeofrancesco.altervista.org/html/services/get_file.php'
    file = {'file': open('./Export_DataFrame.json', 'rb')}
    r = requests.post(url, files=file)
    if r.status_code != 200:
        print('sendErr: ' + r.url)
    else:
        print(r.text)


# main
hconn_send()
