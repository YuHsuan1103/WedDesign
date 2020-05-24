import urllib.request as req
import bs4
import pymysql


url = "https://www.imdb.com/search/title/?genres=comedy&start=0&explore=title_type,genres&ref_=adv_nxt"

request = req.Request(url, headers={
    "User-Agent":"Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1"})

with req.urlopen(request) as response:
    data = response.read().decode("utf-8")

root = bs4.BeautifulSoup(data, "html.parser")

titles1 = root.find_all("div" , class_= "lister-item-content")
casts1 = root.find_all("p", class_="")


count2 = 0 #計算
cmpD = "Director"

for title1 in titles1 :
    conn = pymysql.connect(                   #連結資料庫
    host='127.0.0.1',
    user='root',
    passwd='',
    database='作業',
    charset='utf8',)   
    cursor = conn.cursor()

    titleTemp1 = title1.get_text()

    
    castTemp4 = casts1[count2].a.get_text()
    print(castTemp4)
    
    sql1 = "INSERT INTO characters(name) VALUES('%s');"%(castTemp4)

    count2 = count2 + 1

    try :
        cursor.execute(sql1)
        conn.commit() 
        print("Succeed")
        
    except:
        conn.rollback() 

conn.close()
    

 








