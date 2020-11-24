# 426productivityBoard
Busy-Bee Board: Productivity Board for Students

Designed for time management and project organization for college students, Busy-Bee is a productivity board coded in PHP, Javascript, and HTML/CSS, that utilizes a mySQL database to store, edit, and delete agenda cards and is universally accessible from all devices.  Students will be able to create an account to log into. Within a single board, students can create “cards” of to-do tasks. Each card can be edited, or delete upon completion. The board also provides randomized motivational quotes using REST API. 

# How to use:
First, sign in or create an account. If you already have an account, your previous board will be saved.  Sign up is secured with Google reCAPTCHA API.
Each card has an edit and delete button, and you can freely add additional cards as needed. An new inspirational quote will show each day, acheived by using the Quotes REST API.

# Backend features
JawsDB, which uses the AWS cloud, was used to create the backend to store both user information and card information.


# Features to meet requirements:
Will be a public website that one can log into
Will create user-based accounts (through PHP and mySQL)
Through backend, will create/delete/update cards for each user.
Backend will be dynamic as tasks are moved/finished
