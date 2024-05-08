CREATE DATABASE /*!32312 IF NOT EXISTS*/`canteen_db`;
USE `canteen_db`;

CREATE TABLE `canteen_db`.`canteen`(
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255)  ,
  `phone` VARCHAR(30) NOT NULL ,
  `roll` INT(255)  ,
  `password` VARCHAR(255) 
  );
INSERT INTO `canteen`(`username`, `email`, `phone`, `roll`,`password`) VALUES
  ('sujith', '210010047@iitdh.ac.in', '8143710340', '210010047','093aada6d1d9f8510b71ef25946ec0d3'),
  ('vivek', '210010059@iitdh.ac.in', '9172055252', '210010059', 'a18f9469f9423fe7c7efc1551fc972c0'),
  ('mahesh', '210010013@iitdh.ac.in', '9390525151', '210010013', '733661b0ee1b80c951d58637ee2c1d51'),
  ('Asreenivasu', '210020001@iitdh.ac.in', '9676180949', '210020001', 'e5a55afa1a37d42a009ae2c26d3579c2');

CREATE TABLE `canteen_db`.`canteen_admin`(
  `username` VARCHAR(255) NOT NULL ,
  `email` VARCHAR(255)  ,
  `phone` VARCHAR(30) NOT NULL ,
  `upi`VARCHAR(255)  ,
  `password` VARCHAR(255) 
  );
INSERT INTO `canteen_admin`(`username`, `email`, `phone`, `upi`,`password`) VALUES
  ('admin', 'admin@iitdh.ac.in', '9876543210', '0123456789@idl','0e7517141fb53f21ee439b355b5a1d0a');

CREATE TABLE `canteen_db`.`items` (
  `item_name` VARCHAR(255) NOT NULL ,
  `price` INT(11) NOT NULL , 
  `veg_non_veg` VARCHAR(30) NOT NULL , 
  `quantity` INT(11) NOT NULL 
  );

INSERT INTO `items` (`item_name`, `price`, `veg_non_veg`, `quantity`) VALUES 
('Paneer_Roll', '60', 'veg', '10'), 
('Egg_Roll', '75', 'non-veg', '5'),
('Pav_Bhaji','50','veg','10'),
('Chicken_65','65','non-veg','15');

CREATE TABLE `canteen_db`.`order` (
  `username` VARCHAR(255) NOT NULL ,
  `item_name` VARCHAR(255) NOT NULL ,
  `price` INT(11) NOT NULL , 
  `veg_non_veg` VARCHAR(30) NOT NULL,
  `quantity` INT(11) NOT NULL  
  );
  
CREATE TABLE `canteen_db`.`ordered` (
  `username` VARCHAR(255) NOT NULL ,
  `item_name` VARCHAR(255) NOT NULL ,
  `price` INT(11) NOT NULL , 
  `veg_non_veg` VARCHAR(30) NOT NULL,
  `quantity` INT(11) NOT NULL ,
  `upi` VARCHAR(30) NOT NULL 
  );

CREATE TABLE `canteen_db`.`delivered` (
  `username` VARCHAR(255) NOT NULL ,
  `item_name` VARCHAR(255) NOT NULL ,
  `price` INT(11) NOT NULL , 
  `veg_non_veg` VARCHAR(30) NOT NULL,
  `quantity` INT(11) NOT NULL ,
  `upi` VARCHAR(30) NOT NULL 
  );

