import bcrypt
password = "password"
hash = bcrypt.hashpw(password.encode(),bcrypt.gensalt(5))
pas = input("Enter Passwoed: ")
verift = bcrypt.checkpw(pas.encode(),hash)
print(verift)
if (verift):
    print("Passord is correct!")
else:
    print("You enter wrong passeord")




