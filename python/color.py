from colorama import Fore

string = input("Enter any Word: ")
choice = input("Enter any Color: ").upper()
color = getattr(Fore,choice,Fore.WHITE)
print(color+string)
