CREATE DATABASE Yeti
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE Yeti;

CREATE table categories (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(128) NOT NULL,
  symbol_code VARCHAR(128) NOT NULL
);

CREATE table users (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  email VARCHAR(128) NOT NULL,
  name VARCHAR(128) NOT NULL,
  password VARCHAR(128) NOT NULL UNIQUE,
  contacts VARCHAR(128) UNIQUE,
  lot_id INT,
  rate_id INT
);

CREATE table lots (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  name VARCHAR(128) NOT NULL,
  description VARCHAR(128),
  image VARCHAR(128) UNIQUE,
  start_price INT,
  finishing_date DATETIME,
  step INT,
  user_id INT,
  winner_id INT,
  category_id INT
);

CREATE table rates (
  id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  register_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  price INT NOT NULL,
  user_id INT,
  lot_id INT
);

