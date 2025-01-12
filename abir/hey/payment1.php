<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Payment</title>
    <style>
        /* General Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        section {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            padding: 20px;
            max-width: 600px;
        }

        h2 {
            color: #227c78;
            margin-bottom: 10px;
        }

        #user-profile div {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        #user-profile img {
            /* border-radius: 50%; */
            border: 2px solid #227c78;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 5px 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-top: 10px;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"] {
            width: 80%;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        fieldset {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        fieldset .form-group {
            margin: 20px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        button {
            background-color: #227c78;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 20px;
        }

        button:hover {
            background-color: #24504d;
        }

        #payment-confirmation div {
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <section id="user-profile">
        <h2>User Profile</h2>
        <div>
            <p>Username: <span id="username">Abir</span></p>
            <img id="profile-picture" src="default-profile.png" alt="Profile Picture" width="100">
        </div>
    </section>

    <section id="booking-details">
        <h2>Booking Details</h2>
        <div>
            <p>Station Name: <span id="station-name">Station A</span></p>
            <p>Slot Time: <span id="slot-time">10:00 AM - 12:00 PM</span></p>
            <p>Pricing Details: <span id="pricing-details">$100</span></p>
            <p>Total Cost Breakdown:</p>
            <ul>
                <li>Base Cost: $80</li>
                <li>Taxes: $15</li>
                <li>Discounts: -$5</li>
            </ul>
            <p>Total: $90</p>
        </div>
    </section>

    <!-- Payment Form Section -->
    <section id="payment-form">
        <h2>Payment Form</h2>
        <form>
            <fieldset>
                <legend>User Details</legend>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" placeholder="example@example.com">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" placeholder="+880-1234567890">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" placeholder="Your Name">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" placeholder="Your Address">
                </div>
                
            </fieldset>

            <fieldset>
                <div class="form-group">
                    <legend>Choose One Payment Method</legend>
                    <label><input type="radio" name="payment-method" value="credit-debit"> Credit/Debit Card</label>
                    <label><input type="radio" name="payment-method" value="online"> Online Payment Gateway</label>
                    <label><input type="radio" name="payment-method" value="wallet"> Wallet</label>
                </div>
            </fieldset>

        </form>
    </section>

    <!-- Payment Confirmation Section -->
    <section id="payment-confirmation">
        <h2>Payment Confirmation</h2>
        <div>
            <p>Amount: <span id="payment-amount">$90</span></p>
            <p>Selected Method: <span id="selected-method">Credit Card</span></p>
            <p>Booking Details: <span id="payment-booking-details">Station A, 10:00 AM - 12:00 PM</span></p>
            <button id="proceed-to-pay"><a href="credit-card.php" style= "text-decoration: none; color: white;">Proceed to Pay</a></button>
    </section>

</body>
</html>
