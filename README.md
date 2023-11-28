# doctor-patient

How to install:

1. Set up your php Laravel Environment
2. Make sure that the php.ini file matches that in the settings given in the main branch of the repository	
2. Clone the repository or download the project files from GitHub from the master branch of the repository
3. Create a database called "doctor-patient"
4. Import the "mysql" file from GitHub into your database
5. Go to the "env.example" file, duplicate and name the new file ".env"
6. Change the following database credentials depending on your database username and password:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=doctor-patient
DB_USERNAME=root
DB_PASSWORD=root

7. run "php artisan serve" in the terminal to run the application.
8. Account Credentials for testing (Feel free to create more accounts):

Receptionist Account:
emailaddress: systemadmin@example.com
password: password

Doctor Accounts:
1. emailaddress: chrispineoluoch@example.com password: password
2. emailaddress: lincoln@example.com password: password
3. emailaddress: benjamin@example.com password: password
