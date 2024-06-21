<?php
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $organization = htmlspecialchars($_POST['organization']);
    $project_name = htmlspecialchars($_POST['project_name']);
    $description = htmlspecialchars($_POST['description']);
    $duration = intval($_POST['duration']);
    $contact_person = htmlspecialchars($_POST['contact_person']);

    // Prepare an SQL statement for insertion
    $sql = "INSERT INTO projects (organization, project_name, description, duration, contact_person) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    
    // Execute the statement and check for success
    if ($stmt->execute([$organization, $project_name, $description, $duration, $contact_person])) {
        // Redirect back to dashboard (index.php) after successful submission
        header("Location: index.php");
        exit();
    } else {
        // Handle error if data cannot be saved
        echo "Failed to add project. Please try again later.";
    }
} else {
    // Redirect to index.php if accessed directly without POST method
    header("Location: index.php");
    exit();
}
?>
