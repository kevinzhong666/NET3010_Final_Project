CREATE DATABASE user_database;

USE user_database;

CREATE TABLE users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
   VARCHAR(50) NOT NULL,
  last_name VARCHAR(50) NOT NULL,
  preferred_name VARCHAR(50),
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  date_of_birth DATE NOT NULL
);