<?php
// Check if the payment form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve payment information
    $cardNumber = $_POST['card_number'];
    $cardHolder = $_POST['card_holder'];
    $expiryDate = $_POST['expiry_date'];
    $cvv = $_POST['cvv'];

    // Validate the payment information
    // Add your validation logic here

    // Process the payment
    $paymentSuccessful = processPayment($cardNumber, $cardHolder, $expiryDate, $cvv);

    // Check if the payment was successful
    if ($paymentSuccessful) {
        // Payment successful, show a success message
        $message = "Payment successful!";
    } else {
        // Payment failed, show an error message
        $error = "Payment failed. Please try again.";
    }
}

/**
 * Process the payment using a payment gateway or API.
 *
 * @param string $cardNumber The card number
 * @param string $cardHolder The card holder's name
 * @param string $expiryDate The expiry date of the card
 * @param string $cvv The CVV code
 * @return bool True if the payment was successful, false otherwise
 */
function processPayment($cardNumber, $cardHolder, $expiryDate, $cvv)
{
    // Add your payment processing logic here
    // You can integrate with a payment gateway or API to process the payment

    // Simulating a successful payment
    return true;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <link rel="stylesheet" href="payment-page-style.css">
</head>
<body>
    <h2>Payment form</h2>
    <?php if (isset($message)) { ?>
        <p><?php echo $message; ?></p>
    <?php } ?>
    <?php if (isset($error)) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>
    <form method="POST" action="#">
        <input type="text" name="card_number" placeholder="Card Number" required><br><br>
        <input type="text" name="card_holder" placeholder="Card Holder Name" required><br><br>
        <input type="text" name="expiry_date" placeholder="Expiry Date (MM/YY)" required><br><br>
        <input type="text" name="cvv" placeholder="CVV" required><br><br>
        <input type="submit" value="Submit Payment">
    </form>
</body>
</html>
