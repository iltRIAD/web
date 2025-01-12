<?php
// Database connection setup
function getConnection() {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "root"; // Default MAMP MySQL password
    $dbname = "webtech";
    $port = 8889; // MAMP MySQL port

    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}


// Function to add a new user
function addUser($username, $password, $email) {
    $conn = getConnection(); // Ensure this function is working
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

    $sql = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql); // Use prepared statements for security

    if ($stmt === false) {
        die("SQL prepare failed: " . $conn->error); // Debugging error
    }

    $stmt->bind_param("sss", $username, $hashedPassword, $email);

    if ($stmt->execute()) {
        return true; // User successfully added
    } else {
        die("SQL execute failed: " . $stmt->error); // Debugging error
    }

    return false; // User addition failed
}

// Function to login user
function login($username, $password) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return true; // Login successful
        }
    }

    $stmt->close();
    $conn->close();
    return false; // Login failed
}

// Function to get user ID
function getUserID($username, $password) {
    $conn = getConnection();
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            return $user['id']; // Return user ID if password matches
        }
    }

    $stmt->close();
    $conn->close();
    return null; // User not found or password doesn't match
}


// Fetch all users
function getAllUsers() {
    $conn = getConnection();
    $sql = "SELECT * FROM users";
    $result = $conn->query($sql);
    $users = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $users;
}

// Update user profile
function updateUser($id, $name, $email, $status) {
    $conn = getConnection();
    $sql = "UPDATE users SET username = ?, email = ?, status = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $status, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// Delete user
function deleteUser($id) {
    $conn = getConnection();
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// ---------- User Registration Approval ----------

// Fetch pending users
function getPendingUsers() {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE status = 'pending'";
    $result = $conn->query($sql);
    $pendingUsers = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $pendingUsers;
}

// Approve user
function approveUser($id) {
    $conn = getConnection();
    $sql = "UPDATE users SET status = 'approved' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    logAction($id, 'approved');
    $stmt->close();
    $conn->close();
    return true;
}

// Reject user
function rejectUser($id, $reason) {
    $conn = getConnection();
    $sql = "UPDATE users SET status = 'rejected' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    logAction($id, 'rejected', $reason);
    $stmt->close();
    $conn->close();
    return true;
}

// Log admin actions
function logAction($userId, $action, $reason = null) {
    $conn = getConnection();
    $sql = "INSERT INTO logs (user_id, action, reason) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $userId, $action, $reason);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

// ---------- Charging Station Management ----------

// Add new charging station
function addStation($location, $capacity, $availability) {
    $conn = getConnection();
    $sql = "INSERT INTO stations (location, capacity, availability) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sis", $location, $capacity, $availability);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// Update charging station
function updateStation($id, $location, $capacity, $availability) {
    $conn = getConnection();
    $sql = "UPDATE stations SET location = ?, capacity = ?, availability = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sisi", $location, $capacity, $availability, $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// Delete charging station
function deleteStation($id) {
    $conn = getConnection();
    $sql = "DELETE FROM stations WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// Fetch all charging stations
function getAllStations() {
    $conn = getConnection();
    $sql = "SELECT * FROM stations";
    $result = $conn->query($sql);
    $stations = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $stations;
}

// ---------- Energy Analytics ----------

// Fetch energy data (real-time and historical)
function getEnergyData() {
    $conn = getConnection();
    $sql = "SELECT * FROM energy_data";
    $result = $conn->query($sql);
    $energyData = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $energyData;
}


// ---------- Pricing Management ----------

// Add or update pricing rules
function setPricing($model, $rules) {
    $conn = getConnection();
    $sql = "INSERT INTO pricing (model, rules) VALUES (?, ?) ON DUPLICATE KEY UPDATE rules = VALUES(rules)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $model, $rules);
    $stmt->execute();
    $stmt->close();
    $conn->close();
    return true;
}

// Fetch pricing details
function getPricing() {
    $conn = getConnection();
    $sql = "SELECT * FROM pricing";
    $result = $conn->query($sql);
    $pricing = $result->fetch_all(MYSQLI_ASSOC);
    $conn->close();
    return $pricing;
}
?>
?>
