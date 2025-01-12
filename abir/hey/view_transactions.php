<?php
    session_start();
    if(!isset($_COOKIE['status'])){
        header('location: login.html');
    }

    require_once('model/userModel.php');
    $transactions = getTransactionAll();    
    // foreach ($usr as $arr){
    //     foreach ($arr as $key => $value){
    //         echo $key ." ".$value;
    //     }
    // }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Transactions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .profile {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            margin-left: 30%;
        }
        .profile img {
            border-radius: 50%;
            width: 50px;
            height: 50px;
            margin-right: 15px;
        }
        .transaction {
            margin-bottom: 15px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .transaction h4 {
            margin: 0;
        }
        .button {
            background-color: #227c78;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 40%;
        }
        .button:hover {
            background-color: #24504d;
        }
        .link {
            color: #007bff;
            cursor: pointer;
        }
        .popup {
            display: none;
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }
        .popup-content {
            background: white;
            padding: 20px;
            border-radius: 8px;
            width: 300px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="profile">
        <img src="https://media.licdn.com/dms/image/v2/D5603AQHSu24yce-gMQ/profile-displayphoto-shrink_800_800/profile-displayphoto-shrink_800_800/0/1714155631314?e=1741219200&v=beta&t=sO6eWlaMUSyThgjMF6GvOjnr4M7RIhXj3gg__52CkvI" alt="Profile Photo">
        <div>
            <h3>Username: <?php echo htmlspecialchars($_SESSION['user_id']); ?></h3>
            <p>Total Amount of Transactions: $1500</p>
        </div>
    </div>

    <button class="button">Subscriptions</button>
    <!-- <button class="button" onclick="showPopup('subscriptionPopup')">Subscriptions</button> -->

    <h2>Recent Transactions</h2>

    <?php
    // Assuming $transactions is an array of transaction data fetched from the database
    foreach ($transactions as $transaction) {
        echo '<div class="transaction">';
        echo '<h4>Transaction ID: ' . htmlspecialchars($transaction['transaction_id']) . '</h4>';
        echo '<p>Amount: $' . htmlspecialchars($transaction['amount']) . '</p>';
        echo '<p>Date: ' . htmlspecialchars($transaction['date']) . '</p>';
        echo '<p>Status: <span style="color: ' . ($transaction['status'] == 'Confirmed' ? 'green' : 'orange') . ';">' . htmlspecialchars($transaction['status']) . '</span></p>';
        echo '<span class="link">More Details</span>';
        echo '</div>';
    }
    ?>

    <div class="transaction">
        <h4>Transaction ID: TX123456</h4>
        <p>Amount: $200</p>
        <p>Date: 2025-01-01</p>
        <p>Status: <span style="color: green;">Confirmed</span></p>
        <span class="link">More Details</span>
        <!-- <span class="link" onclick="showPopup('detailsPopup')">More Details</span> -->
    </div>
    <div class="transaction">
        <h4>Transaction ID: TX123457</h4>
        <p>Amount: $300</p>
        <p>Date: 2025-01-02</p>
        <p>Status: <span style="color: orange;">Pending</span></p>
        <span class="link">More Details</span>
        <!-- <span class="link" onclick="showPopup('detailsPopup')">More Details</span> -->
    </div>

    <a href="transaction_history.php">Transactions History</a>
</div>

<!-- Subscription Popup -->
<div class="popup" id="subscriptionPopup">
    <div class="popup-content">
        <h4>Current Subscription Details</h4>
        <p>Subscription Plan: Premium</p>
        <p>Renewal Date: 2025-12-31</p>
        <button class="button">Close</button>
        <!-- <button class="button" onclick="closePopup('subscriptionPopup')">Close</button> -->
    </div>
</div>

<!-- Transaction Details Popup -->
<div class="popup" id="detailsPopup">
    <div class="popup-content">
        <h4>Transaction Details</h4>
        <p>Transaction ID: TX123456</p>
        <p>Amount: $200</p>
        <p>Date: 2025-01-01</p>
        <p>Status: Confirmed</p>
        <button class="button">Close</button>
        <button class="button" onclick="closePopup('detailsPopup')">Close</button>
    </div>
</div>

<script>
    function showPopup(popupId) {
        document.getElementById(popupId).style.display = 'flex';
    }

    function closePopup(popupId) {
        document.getElementById(popupId).style.display = 'none';
    }
</script>

</body>
</html>