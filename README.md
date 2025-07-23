# Car Rental Project

A simple car rental website using HTML, CSS, JavaScript, PHP, and MySQL. Designed for beginners and ready to run on XAMPP.

## Project Structure
- `index.html` – Login page
- `client_dashboard.php` – Client dashboard
- `admin_dashboard.php` – Admin dashboard
- `css/` – Stylesheets
- `js/` – JavaScript files
- `images/` – Car images
- `php/` – PHP backend scripts
- `sql/` – SQL scripts for database setup

## XAMPP Setup Instructions
(Instructions will be added after project files are created) 

## How to Launch the Project on XAMPP

1. **Install XAMPP**
   - Download and install XAMPP from https://www.apachefriends.org/

2. **Start Apache and MySQL**
   - Open the XAMPP Control Panel
   - Start the Apache and MySQL modules

3. **Set Up the Database**
   - Open phpMyAdmin (usually at http://localhost/phpmyadmin)
   - Click on the "Import" tab
   - Import the `sql/init_cars.sql` file to create the `car_rental` database and populate it with sample data

4. **Place Project Files**
   - Copy the entire project folder into the `htdocs` directory inside your XAMPP installation (e.g., `C:/xampp/htdocs/CarRental`)
   - Make sure the folder structure is preserved

5. **Add Car Images**
   - Place car images (e.g., `c5x.jpg`, `corolla.jpg`, etc.) in the `images/` folder. You can use your own images or download free car images online. The image filenames should match those in the database or as uploaded by the admin.

6. **Access the Website**
   - In your browser, go to `http://localhost/CarRental/index.html`
   - Login as a client (username: `client1`, password: `clientpass`) or as an admin (username: `admin1`, password: `adminpass`)

7. **Usage**
   - Clients can rent, release, and view cars.
   - Admins can add, remove, and view cars, and see who rented each car.

---

If you have any issues, make sure file permissions allow uploads to the `images/` folder and that your XAMPP services are running. 