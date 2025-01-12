CREATE TABLE transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255),
    amount DECIMAL(10, 2),
    date TIMESTAMP,
    status ENUM('Completed', 'Pending', 'Refunded', 'Disputed'),
    reason TEXT
);
