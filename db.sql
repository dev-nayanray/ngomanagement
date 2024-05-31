-- Users Table
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'director', 'staff') NOT NULL
);

-- Members Table
CREATE TABLE Members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info TEXT,
    address TEXT
);

-- Directors Table
CREATE TABLE Directors (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    contact_info TEXT
);

-- Loans Table
CREATE TABLE Loans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    amount DECIMAL(10, 2),
    status ENUM('pending', 'approved', 'rejected') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (member_id) REFERENCES Members(id)
);

-- Banks Table
CREATE TABLE Banks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    branch VARCHAR(100),
    account_number VARCHAR(100)
);

-- DPS Table
CREATE TABLE DPS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    scheme VARCHAR(100),
    start_date DATE,
    maturity_date DATE,
    amount DECIMAL(10, 2),
    FOREIGN KEY (member_id) REFERENCES Members(id)
);

-- FDR Table
CREATE TABLE FDR (
    id INT AUTO_INCREMENT PRIMARY KEY,
    member_id INT,
    scheme VARCHAR(100),
    start_date DATE,
    maturity_date DATE,
    amount DECIMAL(10, 2),
    FOREIGN KEY (member_id) REFERENCES Members(id)
);

-- Transactions Table
CREATE TABLE Transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type ENUM('credit', 'debit') NOT NULL,
    amount DECIMAL(10, 2),
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    account_type VARCHAR(100),
    member_id INT,
    director_id INT,
    FOREIGN KEY (member_id) REFERENCES Members(id),
    FOREIGN KEY (director_id) REFERENCES Directors(id)
);

-- SMS Table
CREATE TABLE SMS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    template_name VARCHAR(100),
    content TEXT
);

-- Reports Table
CREATE TABLE Reports (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(100),
    generated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
