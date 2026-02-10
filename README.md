# Student Council Voting System (OSIS Election)

## Description
A web-based student council (OSIS) voting system built using PHP and MySQL.
This application allows students to vote online, while administrators can manage
candidates, student data, and monitor voting statistics through an admin dashboard.
This project is created for learning and portfolio purposes.

## Features

### Student Features
- View list of OSIS candidates
- Vote for one candidate
- One student can vote only once
- Logout functionality

### Admin Features
- Admin dashboard with voting statistics chart
- View total number of votes through graphical visualization
- Manage OSIS candidate data (add, edit, delete)
- Manage student data (add, edit, delete)
- Import student data using Excel file
- View voting results
- Logout functionality

## Technologies Used
- PHP
- MySQL
- HTML
- CSS
- JavaScript
- Chart.js (for voting statistics chart)

## How to Run Locally (Laragon)
1. Install Laragon
2. Start Apache and MySQL from Laragon
3. Copy the project folder into `C:\laragon\www`
4. Import the database file (.sql) using phpMyAdmin
5. Configure database connection in the configuration file
6. Open the project in your browser via `http://localhost/project-folder-name`

## Notes
- Each student is allowed to vote only once
- Student data import uses Excel file format
- This project uses sample data for testing
- Intended for educational and portfolio purposes only
- Not intended for real election use
