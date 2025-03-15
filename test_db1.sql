-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
-- 
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 12:51 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

-- Create a second database if it doesn't exist and switch to it:
CREATE DATABASE IF NOT EXISTS test_db2;
USE test_db2;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Table structure for table `users`
-- --------------------------------------------------------

CREATE TABLE users (
  id int(11) NOT NULL AUTO_INCREMENT,
  user_name varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  name varchar(255) NOT NULL,
  email varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (id)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------
-- Dumping data for table `users`
-- --------------------------------------------------------

INSERT INTO users (id, user_name, password, name, email) VALUES
(3, 'ela', '202cb962ac59075b964b07152d234b70', 'Ela', 'ela@example.com'),
(4, 'elias', '202cb962ac59075b964b07152d234b70', 'elias', 'elias@example.com');

COMMIT;
