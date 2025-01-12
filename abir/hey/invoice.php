<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payment Workflow</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        section {
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px auto;
            max-width: 600px;
        }

        #invoice {
            text-align: center;
        }

        p {
            margin: 10px 0;
            color: #555;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }

        button {
            background-color: #227c78;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #24504d;
        }

        #download-invoice {
            display: block;
            margin: 20px auto;
            text-align: center;
        }

        #download-invoice:hover {
            background-color: #24504d;
        }
    </style>
</head>
<body>

<!-- Invoice Section -->
<section id="invoice">
    <h2>Invoice</h2>
    <div>
        <p>Booking/Service Details: Station A, 10:00 AM - 12:00 PM</p>
        <p>Bill To: Abir</p>
        <p>Ship To: Abir</p>
        <p>Invoice Number: INV12345</p>
        <p>Amount Paid: $90</p>
        <p>Date: 2024-12-15</p>
        <p>Transaction ID: TXN67890</p>
        <button id="download-invoice">Download Invoice</button>
    </div>
</section>

<!-- Send Money Section -->
<section id="send-money">
    <h2>Send Money</h2>
    <form>
        <label for="recipient-address">Recipient Address:</label>
        <input type="text" id="recipient-address" name="recipient-address" placeholder="Recipient Address" required>
        
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" placeholder="Amount" required min="0">
        
        <label for="retype-amount">Re-type Amount:</label>
        <input type="number" id="retype-amount" name="retype-amount" placeholder="Re-type Amount" required min="0">
        
        <label for="message">Message:</label>
        <input type="text" id="message" name="message" placeholder="Optional Message">
        
        <button type="button" id="sign-private-key">Sign with Private Key</button>
        <button type="submit">Submit</button>
    </form>
</section>

<!-- Terms and Conditions Section -->
<section id="terms-conditions">
    <h2>Terms and Conditions</h2>
    <p>Please read the <a href="Terms_and_conditions.php">Terms and Conditions</a> carefully before proceeding with your transactions.</p>
</section>

</body>
</html>