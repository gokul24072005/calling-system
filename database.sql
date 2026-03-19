-- Create database
CREATE DATABASE IF NOT EXISTS callcenter;
USE callcenter;

-- Users table
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    username VARCHAR(50) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    role ENUM('admin','manager','employee') NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Leads table
CREATE TABLE leads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    assigned_to INT NOT NULL,
    client_name VARCHAR(100) NOT NULL,
    client_phone VARCHAR(20) NOT NULL,
    client_email VARCHAR(100),
    description TEXT,
    due_date DATE,
    status ENUM('pending','interested','not_interested','call_later','completed') DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (assigned_to) REFERENCES users(id) ON DELETE CASCADE
);

-- Call logs table
CREATE TABLE call_logs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    lead_id INT NOT NULL,
    user_id INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    notes TEXT,
    called_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (lead_id) REFERENCES leads(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Insert sample users (passwords hashed with PHP password_hash())
-- Passwords: admin123, 1234, 1234, 1234
INSERT INTO users (name, username, password, email, role) VALUES
('Admin User', 'admin', '$2y$10$YourHashHereForAdmin123', 'admin@izonetech.com', 'admin'),
('Manager Raj', 'manager', '$2y$10$YourHashHereFor1234', 'manager@izonetech.com', 'manager'),
('Priya Sharma', 'priya', '$2y$10$YourHashHereFor1234', 'priya@izonetech.com', 'employee'),
('Amit Patel', 'amit', '$2y$10$YourHashHereFor1234', 'amit@izonetech.com', 'employee');

-- Insert sample leads
INSERT INTO leads (assigned_to, client_name, client_phone, client_email, description, due_date, status) VALUES
(3, 'Rahul Verma', '9876543210', 'rahul@gmail.com', 'Solar Panel Inquiry', '2026-02-20', 'pending'),
(3, 'Sunita Rao', '9123456789', 'sunita@yahoo.com', 'Home Loan Follow-up', '2026-02-19', 'interested'),
(4, 'Vikram Singh', '9988776655', 'vikram@outlook.com', 'Credit Card Upgrade', '2026-02-21', 'pending');