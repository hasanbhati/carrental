-- delete database if exists
DROP TABLE IF EXISTS rental_history;
DROP TABLE IF EXISTS cars;
DROP DATABASE IF EXISTS car_rental;

-- SQL script to create and populate the cars table

CREATE DATABASE IF NOT EXISTS car_rental;
USE car_rental;

CREATE TABLE IF NOT EXISTS cars (
    id INT AUTO_INCREMENT PRIMARY KEY,
    manufacturer VARCHAR(50),
    brand VARCHAR(50),
    model VARCHAR(50),
    registration_plate VARCHAR(20),
    type VARCHAR(20),
    fuel_type VARCHAR(20),
    transmission VARCHAR(20),
    mileage INT,
    image VARCHAR(100),
    info TEXT,
    status ENUM('available', 'rented', 'removed') DEFAULT 'available',
    rented_by VARCHAR(50) DEFAULT NULL,
    rent_start DATETIME DEFAULT NULL,
    rent_end DATETIME DEFAULT NULL
);
CREATE TABLE IF NOT EXISTS rental_history (
    id INT AUTO_INCREMENT PRIMARY KEY,
    car_id INT NOT NULL,
    username VARCHAR(50) NOT NULL,
    action ENUM('rent', 'release') NOT NULL,
    action_time DATETIME NOT NULL,
    FOREIGN KEY (car_id) REFERENCES cars(id)
);

INSERT INTO cars (manufacturer, brand, model, registration_plate, type, fuel_type, transmission, mileage, image, info, status)
VALUES
('Stellantis', 'Citroen', 'C5X', 'DW12345', 'sedan', 'gasoline', 'automatic', 53400, 'c5x.jpg', 'Spacious and comfortable.', 'available'),
('Toyota', 'Toyota', 'Corolla', 'AB123CD', 'sedan', 'hybrid', 'automatic', 42000, 'corolla.jpg', 'Reliable and efficient.', 'available'),
('Volkswagen', 'VW', 'Golf', 'EF456GH', 'hatchback', 'diesel', 'manual', 38000, 'golf.jpg', 'Compact and sporty.', 'available'),
('Ford', 'Ford', 'Focus', 'IJ789KL', 'hatchback', 'gasoline', 'manual', 29000, 'focus.jpg', 'Fun to drive.', 'available'),
('Hyundai', 'Hyundai', 'Tucson', 'MN012OP', 'SUV', 'gasoline', 'automatic', 61000, 'tucson.jpg', 'Great for families.', 'available'),
('Kia', 'Kia', 'Sportage', 'QR345ST', 'SUV', 'diesel', 'automatic', 57000, 'sportage.jpg', 'Modern and safe.', 'available'),
('Renault', 'Renault', 'Clio', 'UV678WX', 'hatchback', 'gasoline', 'manual', 33000, 'clio.jpg', 'Economical city car.', 'available'),
('Peugeot', 'Peugeot', '308', 'YZ901AB', 'hatchback', 'diesel', 'automatic', 41000, '308.jpg', 'Stylish and efficient.', 'available'),
('Mazda', 'Mazda', 'CX-5', 'CD234EF', 'SUV', 'gasoline', 'automatic', 48000, 'cx5.jpg', 'Sporty SUV.', 'available'),
('Honda', 'Honda', 'Civic', 'GH567IJ', 'sedan', 'hybrid', 'automatic', 36000, 'civic.jpg', 'Popular and reliable.', 'available'); 