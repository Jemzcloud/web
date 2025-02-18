import requests

url = "jemz.com/web"

r = requests.get(url)
print(r.status_code)

