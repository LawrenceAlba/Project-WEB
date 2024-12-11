<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    $content = $_POST['content'];

    $filePath = "data/{$section}.txt";
    try {
        // Open the file in write mode
        $file = fopen($filePath, 'w');
        if (!$file) {
            throw new Exception("Error opening file.");
        }
        // Write content to the file
        if (fwrite($file, $content) === false) {
            throw new Exception("Error writing to file.");
        }
        // Close the file after writing
        fclose($file);
        $message = "Content updated successfully!";
    } catch (Exception $e) {
        $message = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="assets/style.css">
</head>

<body>
    <div class="container">
        <header class="sidebar">
            <img src="assets/images/pfp.jpg" alt="Your Photo" class="profile-img">
            <nav>
                <a href="Main.html">Home</a>
                <a href="about.html">About Me</a>
                <a href="projects.html">Projects</a>
                <a href="skills.html">Skills</a>
                <a href="contact.html">Contact</a>
                <a href="admin.php">Admin</a>
            </nav>
        </header>
    </div>
    <div class="panel">
        <h1>Admin Panel</h1>
        <form method="POST">
            <label for="section">Select Section:</label>
            <select name="section" id="section">
                <option value="home">Home</option>
                <option value="about">About Me</option>
                <option value="projects">Projects</option>
                <option value="skills">Skills</option>
            </select><br><br>

            <label for="content">Content:</label><br>
            <textarea name="content" id="content" rows="10" cols="50"></textarea><br><br>

            <button type="submit">Update</button>
        </f>
    </div>
    <?php if (!empty($message)) echo "<p>$message</p>"; ?>
</body>
</html>
