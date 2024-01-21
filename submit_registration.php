<?php
// Ensure that the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $participants = $_POST["country"];
    $amount = $_POST["amount"];

    // Validate and sanitize input data (you might want to add more validation)
    $name = htmlspecialchars(trim($name));
    $phone = htmlspecialchars(trim($phone));
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $participants = intval($participants);
    $amount = intval($amount);

    // Connect to SQLite database
    $db = new SQLite3('registration.db');

    // Prepare and execute SQL query to insert data into the database
    $stmt = $db->prepare('INSERT INTO registrations (name, phone, email, participants, amount) VALUES (:name, :phone, :email, :participants, :amount)');
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':phone', $phone, SQLITE3_TEXT);
    $stmt->bindValue(':email', $email, SQLITE3_TEXT);
    $stmt->bindValue(':participants', $participants, SQLITE3_INTEGER);
    $stmt->bindValue(':amount', $amount, SQLITE3_INTEGER);
    
    $result = $stmt->execute();

    // Close the database connection
    $db->close();

    // Redirect to a success page or do any other actions
    header("Location: success_page.html");
    exit;
}
?>
