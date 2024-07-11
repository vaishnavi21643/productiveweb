import tkinter as tk
from tkinter import messagebox
from flask import Flask, render_template, request, jsonify

app = Flask(__name__)

questions = [
    "What planet is known as the Red Planet?",
    "Who wrote Harry Potter and the Sorcerer's Stone?",
    "Who was the first man to walk on the moon?",
    "What is the largest ocean on Earth?",
    "What is the formula for the area of a circle?",
    "What is the process by which plants make their food called?",
    "Who directed the movie Jurassic Park?"
]

options = [
    ["A. Mars", "B. Jupiter", "C. Uranus", "D. Pluto"],
    ["A. J.R.R. Tolkien", "B. J.K. Rowling", "C. C.S. Lewis", "D. Suzanne Collins"],
    ["A. Buzz Aldrin", "B. Neil Armstrong", "C. Yuri Gagarin", "D. Alan Shepard"],
    ["A. Atlantic Ocean", "B. Indian Ocean", "C. Arctic Ocean", "D. Pacific Ocean"],
    ["A. 2πr", "B. πr²", "C. πd", "D. 2πr²"],
    ["A. Respiration", "B. Transpiration", "C. Photosynthesis", "D. Germination"],
    ["A. James Cameron", "B. George Lucas", "C. Steven Spielberg", "D. Tim Burton"]
]

answers = ["A", "B", "B", "D", "B", "C", "C"]

class QuizApp:
    def __init__(self, master):
        self.master = master
        self.master.title("Quiz")
        self.question_num = 0
        self.score = 0
        self.guesses = []
        
        self.question_label = tk.Label(master, text=questions[self.question_num], font=('Arial', 16), wraplength=400)
        self.question_label.pack(pady=20)

        self.var = tk.StringVar()
        self.var.set(None)
        
        self.option_buttons = []
        for option in options[self.question_num]:
            button = tk.Radiobutton(master, text=option, variable=self.var, value=option[0], font=('Arial', 14))
            button.pack(anchor="w")
            self.option_buttons.append(button)
        
        self.submit_button = tk.Button(master, text="Submit", command=self.submit, font=('Arial', 14))
        self.submit_button.pack(pady=20)
    
    def submit(self):
        guess = self.var.get()
        self.guesses.append(guess)
        if guess == answers[self.question_num]:
            self.score += 1
        
        self.question_num += 1
        
        if self.question_num < len(questions):
            self.update_question()
        else:
            self.show_results()
    
    def update_question(self):
        self.question_label.config(text=questions[self.question_num])
        self.var.set(None)
        for i, option in enumerate(options[self.question_num]):
            self.option_buttons[i].config(text=option)
    
    def show_results(self):
        result = f"Your score is: {self.score}/{len(questions)}"
        messagebox.showinfo("Results", result)
        self.master.quit()

root = tk.Tk()
app = QuizApp(root)
root.mainloop()

