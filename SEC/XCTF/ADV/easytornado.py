import hashlib

filename = '/fllllllllllllag'
cookie_secret = "17724ff8-577f-4985-8369-7dcd320509d9"


def getvalue(string):
    md5 = hashlib.md5()
    md5.update(string.encode('utf-8'))
    # print(md5.hexdigest())
    return md5.hexdigest()


def merge():
    # 注意md5有大小寫的區別
    print(cookie_secret + getvalue(filename))
    print(getvalue(cookie_secret + getvalue(filename)))


merge()
