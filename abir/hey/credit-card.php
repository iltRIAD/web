<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            padding: 20px;
        }

        .payment-form {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
        }

        .payment-form h2 {
            margin-bottom: 20px;
            font-size: 20px;
        }

        .input-group {
            margin-bottom: 15px;
        }

        .input-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .input-group input {
            width: 80%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-group .error {
            color: red;
            font-size: 0.875rem;
            margin-top: 5px;
        }

        .checkbox-group {
            margin-bottom: 15px;
        }

        .checkbox-group input {
            margin-right: 10px;
        }

        .checkbox-group label {
            font-size: 0.9rem;
            color: #333;
        }

        .buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .buttons button {
            padding: 10px 15px;
            font-size: 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .buttons .check-booking {
            background-color: #ffffff;
            color: #227c78;
            border: 1px solid #227c78;
            font-weight: 550;
        }

        .buttons .complete-booking {
            background-color: #227c78;
            color: white;
            font-weight: 550;
        }

        .buttons button:hover {
            opacity: 0.8;
        }

        .info {
            margin-top: 20px;
            font-size: 0.875rem;
            color: #555;
        }

        .info a {
            color: #007bff;
            text-decoration: none;
        }

        .info a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <form class="payment-form" enctype="">
        <h2>How would you like to pay?</h2>

        <div class="credit-cards">
            <img src="https://img.icons8.com/color/48/000000/visa.png" alt="visa">
            <img src="https://img.icons8.com/color/48/000000/mastercard.png" alt="mastercard">
            <img src="https://img.icons8.com/color/48/000000/amex.png" alt="amex">
            <img src="https://img.icons8.com/color/48/000000/discover.png" alt="discover">

        <div class="input-group">
            <label for="cardholder-name">Cardholder's Name *</label>
            <input type="text" id="cardholder_name" placeholder="Enter cardholder's name" required>
            <div class="error"><?php echo isset($errors['cardholder_name']) ? $errors['cardholder_name'] : ''; ?></div>
            <!-- <div class="error">Please enter the cardholder's name</div> -->
        </div>

        <div class="input-group">
            <label for="card-number">Card Number *</label>
            <input type="text" id="card_number" placeholder="Enter card number" required>
            <div class="error"><?php echo isset($errors['card_number']) ? $errors['card_number'] : ''; ?></div>
        </div>

        <div class="input-group">
            <label for="card-number">CVV *</label>
            <input type="text" id="cvv" placeholder="Enter cvv" required>
            <div class="error"><?php echo isset($errors['cvv']) ? $errors['cvv'] : ''; ?></div>
        </div>

        <div class="input-group">
            <label for="expiry-date">Expiry Date *</label>
            <input type="text" id="expiry_date" placeholder="MM / YY" required>
            <div class="error"><?php echo isset($errors['expiry_date']) ? $errors['expiry_date'] : ''; ?></div>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="marketing-consent" checked>
            <label for="marketing-consent">I consent to receiving marketing emails from EVstation.com .com, including promotions, personalized recommendations, and more.</label>
        </div>

        <div class="checkbox-group">
            <input type="checkbox" id="secondary-consent">
            <label for="secondary-consent">I consent to receiving marketing emails about EVstation.com Transport Limited's products and services.</label>
        </div>

        <div class="info">
            By signing up, you let us tailor offers and content to your interests. Read our 
            <a href="PrivacyPolicy.html">privacy policy</a>.
        </div>

        <div class="info">
            Read the 
            <a href="#">booking conditions</a>, 
            <a href="Terms_and_conditions.html">general terms</a>, 
            <a href="PrivacyPolicy.html">privacy policy</a>, and 
            <a href="#">wallet terms</a>.
        </div>

        <div class="buttons">
            <button class="check-booking">Check your booking</button>
            <button type="submit" name="complete_booking" class="complete-booking" value="Complete booking"><a href="invoice.php" style= "text-decoration: none; color: white;">Complete booking</a></button>
        </div>
    </form>

    
    <?php
        // PHP Validation Logic
        $errors = [];

        if (isset($_POST['complete_booking'])) {

            $cardholder_name = trim($_POST['cardholder_name']);
            $card_number = trim($_POST['card_number']);
            $cvv = trim($_POST['cvv']);
            $expiry_date = trim($_POST['expiry_date']);

            // Validate Cardholder's Name
            if (empty($cardholder_name)) {
                $errors['cardholder_name'] = "Please enter the cardholder's name.";
            }

            // Validate Card Number
            if (empty($card_number) || !preg_match('/^\d{16}$/', $card_number)) {
                $errors['card_number'] = "Please enter a valid 16-digit card number.";
            }

            // Validate CVV
            if (empty($cvv) || !preg_match('/^\d{3}$/', $cvv)) {
                $errors['cvv'] = "Please enter a valid 3-digit CVV.";
            }

            // Validate Expiry Date
            if (empty($expiry_date) || !preg_match('/^(0[1-9]|1[0-2])\/?([0-9]{2})$/', $expiry_date)) {
                $errors['expiry_date'] = "Please enter a valid expiry date in MM/YY format.";
            }

            // If no errors, process the payment (this is where you would integrate with a payment gateway)
            if (empty($errors)) {
                // Payment processing logic goes here
                echo "Payment processed successfully!";
            }

            // If there are errors, display them
            if (!empty($errors)) {
                echo "<div class='error'>Please correct the following errors:</div>";
                foreach ($errors as $error) {
                    echo "<div class='error'>$error</div>";
                }
            }

            
        }
    ?>

</body>
</html>