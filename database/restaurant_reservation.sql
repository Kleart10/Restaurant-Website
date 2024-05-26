-- database/schema.sql
CREATE DATABASE IF NOT EXISTS restaurant_reservation;

USE restaurant_reservation;

CREATE TABLE IF NOT EXISTS reservations (
    Klienti INT AUTO_INCREMENT PRIMARY KEY,
    emri VARCHAR(100) NOT NULL,
    mbiemri varchar(100) NOT NULL,
    phone INT NOT NULL,
    persona INT(100),
    email VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
