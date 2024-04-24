<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'schoolserver_hackaton';
$username = 'root';
$password = 'root';

try {
    // Establish a database connection
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get form data safely with isset
$date = isset($_POST['date']) ? $_POST['date'] : '';
$datum = isset($_POST['datum']) ? $_POST['datum'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';
$grades = isset($_POST['grades']) ? $_POST['grades'] : '';

// Insert the data into the database
$stmt = $conn->prepare("INSERT INTO Activity (date, datum, status, grades) VALUES (:date, :datum, :status, :grades)");
$stmt->bindParam(':date', $date);
$stmt->bindParam(':datum', $datum);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':grades', $grades);
$stmt->execute();

    echo "Entry added successfully!";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$stmt = $conn->prepare("SELECT * FROM Activity");
$stmt->execute();
$result = $stmt -> fetchAll();

echo "<ul>";
foreach( $result as $resultaat){
    // print_r($resultaat);
    echo "<li>".$resultaat['grades']."</li>";
    // echo '<br>';
}
echo "</ul>";



// Close the database connection
$conn = null;
header('Location:index.php'); 
exit;
?>



