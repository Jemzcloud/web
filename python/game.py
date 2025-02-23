import random
def computer():
    return random.choice(['rock','paper','scissor'])
def player():
    select = input("Enter Rock,Paper,Scissor: ").lower()    
    while select not in ['rock','paper','scissor']:
        print("give Correct input")
        select = input("Enter Rock,Paper,Scissor: ").lower() 
    return select

def winer(player,computer):
    if player == computer:
        print("game Tie!")
    elif player == "rock" and computer == "scissor" or  player == "scissor" and computer == "paper" or  player == "paper" and computer == "rock":
        print("You Win the game!!")
    else:
        print("Computer wins the Game!")
user = player()
com = computer()
winer(user,com)