import qrcode
from PIL import Image
word = input("Enter a 'URL' or Word to convert QRcode: ")
qr = qrcode.make(word)
qr.show()
ask = input("Did you want to store the QR? (y/n): ")
if ask == "y":
    name = input("Enter a name to save: ")
    qr.save(name+".png")
