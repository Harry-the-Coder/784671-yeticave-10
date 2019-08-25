CREATE DATABASE Yeti
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE Yeti;

CREATE table categories (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR NOT NULL,
  symbol_code CHAR NOT NULL
);

CREATE table users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email CHAR NOT NULL UNIQUE,
  name CHAR NOT NULL,
  password CHAR NOT NULL UNIQUE,
  contacts CHAR UNIQUE,
  lot_id INT,
  rate_id INT
);

CREATE table rates (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  description CHAR,
  image CHAR UNIQUE,
  start_price INT,
  finishing_date DATETIME,
  step INT,
  user_id INT,
  winner_id INT,
  category_id INT
);

CREATE table lots (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price INT NOT NULL,
  user_id INT,
  lot_id INT
);

