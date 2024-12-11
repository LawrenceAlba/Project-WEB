<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Correct file path
    $filePath = '../data/contact_submissions.txt';

    try {
        // Ensure the directory exists
        if (!is_dir('../data')) {
            mkdir('../data', 0777, true); // Create the folder if it doesn't exist
        }

        $logEntry = "Name: $name\nEmail: $email\nMessage: $message\n---\n";
        if (file_put_contents($filePath, $logEntry, FILE_APPEND) === false) {
            throw new Exception("Error writing to file.");
        }

        // Use JavaScript to display a pop-up and reset the form
        echo "<script>
                alert('Thank you for your message!');
                window.location.href = '../contact.html';
              </script>";
    } catch (Exception $e) {
        // Use JavaScript to display an error message
        echo "<script>
                alert('Error: " . $e->getMessage() . "');
                window.location.href = '../contact.html';
              </script>";
    }
}
?>
