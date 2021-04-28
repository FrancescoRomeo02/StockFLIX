import requests

session = requests.Session()
response = session.get(
    'https://romeofrancesco.altervista.org/Web/home_page.php')
print(session.cookies.get_dict())
