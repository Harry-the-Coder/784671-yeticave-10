CREATE DATABASE Yeti
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE Yeti;

CREATE table categories (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name CHAR NOT NULL,
  symbol_code CHAR NOT NULL
);

CREATE table users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email CHAR NOT NULL UNIQUE,
  name CHAR NOT NULL,
  password CHAR NOT NULL UNIQUE,
  contacts CHAR UNIQUE,
  lot_id INT NOT NULL,
  rate_id INT NOT NULL
);

CREATE table rates (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  description CHAR,
  image CHAR UNIQUE,
  start_price INT,
  finishing_date DATETIME,
  step INT,
  user_id INT NOT NULL,
  winner_id INT NOT NULL,
  category_id INT NOT NULL
);

CREATE table lots (
  id INT AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price INT NOT NULL,
  user_id INT NOT NULL,
  lot_id INT NOT NULL
);

