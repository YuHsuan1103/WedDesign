import urllib.request as req
import bs4
import pymysql
from urllib.parse import urlparse
import re


url = "https://www.imdb.com/chart/moviemeter/?ref_=nv_mv_mpm"

request = req.Request(url, headers={
"User-Agent":"Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1"})

with req.urlopen(request) as response:
    data = response.read().decode("utf-8")

root = bs4.BeautifulSoup(data, "html.parser")

titles1 = root.find_all("td", attrs={"class": "titleColumn"})
for j in titles1:
    lists = j.find('a',{'href': re.compile('ref_=chtmvm_tt')})
    linkUrl = "https://www.imdb.com" + lists['href']
    request2 = req.Request(linkUrl, headers={
                "User-Agent":"Mozilla/5.0 (iPad; CPU OS 11_0 like Mac OS X) AppleWebKit/604.1.34 (KHTML, like Gecko) Version/11.0 Mobile/15A5341f Safari/604.1"})

    with req.urlopen(request2) as response2:
        data2 = response2.read().decode("utf-8")

    root2 = bs4.BeautifulSoup(data2, "html.parser")

    titles2 = root2.find_all("h1", attrs={"class": ""})
    for i in titles2:
        titles3 = i.get_text()
        print(titles3)
        characters = root2.find_all('a', {'href': re.compile('ref_=tt_ov_st_sm')})
        for k in characters:
            name = k.get_text()
            print(name)
            conn = pymysql.connect(   
            host='127.0.0.1',
            user='root',
            passwd='',
            database='test',
            charset='utf8',)   
            introduction = "NULL"
            cursor = conn.cursor()    
            sql = "INSERT INTO characters(C_MovieTitle,C_name,introduction) VALUES('%s','%s','%s');"%(titles3,name,introduction)
                
            try :
                cursor.execute(sql)
                conn.commit() 
                print("Succeed")
                
                        
            except:
                conn.rollback() 
conn.close()
    

 








