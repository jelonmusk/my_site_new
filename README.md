# my_site_new
  A Student-oriented, DBMS e-commerce online shopping web application for buying academic essentials with student discounts.

Here’s a summary of the tech stack and steps to run it locally using WAMP:

## Tech Stack


- PHP (main backend language)
- Hack (PHP variant, but only a small portion)
- CSS (for styling)
- JavaScript (for interactive frontend elements)
- MySQL ( typical for PHP DBMS projects and works with WAMP)

## How to Run Locally with WAMP

1. **Install WAMP**
   - Download and install WAMP from the official site: https://www.wampserver.com/en/

2. **Clone the Repository**
   - Download this repo as a ZIP or open a terminal and run:
     ```bash
     git clone https://github.com/jelonmusk/my_site_new.git
     ```

3. **Move Project to WAMP**
   - Move the cloned folder (my_site_new) to the WAMP www directory (usually C:\wamp64\www).

4. **Set Up the Database**
   - Check the repo for any .sql file or instructions in README for setting up the database.
   - Open phpMyAdmin (http://localhost/phpmyadmin) in your browser.
   - Create a new database (e.g., my_site_new).
   - Import the .sql file into this database (if available).

5. **Configure Database Connection**
   - Look for a config file (commonly config.php, db.php, or similar) in the project.
   - Update database credentials to match your local WAMP setup:
     - host: localhost
     - user: root (default for WAMP)
     - password: (leave blank unless you set one)
     - database: my_site_new

6. **Start WAMP**
   - Launch WAMP and ensure both Apache and MySQL services are running (green icon).

7. **Run the Project**
   - In your browser, go to: http://localhost/my_site_new

## Notes

- If you encounter errors, check for missing dependencies or PHP extensions in WAMP.
- If there’s a README or INSTALL file in the repo, follow any extra steps mentioned.

Would you like a specific walkthrough for setting up the database or configuring the PHP files? If you share the project structure or config file, I can give detailed help!
