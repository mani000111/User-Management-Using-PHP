# User-Management-Using-PHP
User Management using PHP involves creating and managing user accounts, ensuring secure registration, authentication, and profile management. It includes implementing role-based access control (RBAC) to restrict access based on user roles. Key features include password hashing, session management,.

Authour:H.MANIVEL

Introduction
The PHP User Management System is a web application that allows administrators to manage user data. The application provides a dashboard for creating, reading, updating, and deleting (CRUD) user records. It includes functionalities for user registration, email verification, and password setup.

Features

User Registration: Allows users to register by providing their details.
Email Verification: Sends an email to users for verification purposes.
Password Setup: Allows users to set up their password after email verification.
CRUD Operations: Administrators can create, read, update, and delete user records.
Dashboard: A user-friendly interface for managing user records.


Technologies Used
Frontend: HTML, CSS
Backend: PHP
Database: MySQL


To recreate database:

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL,
    email

CREATE DATABASE IF NOT EXISTS user_registration;

USE user_registration;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fname VARCHAR(50) NOT NULL,
    lname VARCHAR(50) NOT NULL,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    dob DATE NOT NULL,
    country VARCHAR(50) NOT NULL,
    state VARCHAR(50) NOT NULL,
    city VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


ALTER TABLE users
ADD COLUMN email_verified BOOLEAN DEFAULT FALSE,
ADD COLUMN verification_token VARCHAR(255);
