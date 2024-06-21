<?php
// Assuming you have a function to fetch projects by organization from your database
include_once('db_connection.php'); // Adjust this according to your database connection script

// Function to retrieve projects by organization
function getProjectsByOrganization($organization) {
    global $dsn; // Assuming $conn is your database connection

    $projects = array();

    $stmt = $dsn->prepare("SELECT project_name, description, duration, contact_person FROM projects WHERE organization = ?");
    $stmt->bind_param("s", $organization);
    $stmt->execute();
    $stmt->bind_result($project_name, $description, $duration, $contact_person);

    while ($stmt->fetch()) {
        $projects[] = array(
            'project_name' => $project_name,
            'description' => $description,
            'duration' => $duration,
            'contact_person' => $contact_person
        );
    }

    $stmt->close();

    return $projects;
}

// Example: Retrieve projects for Gementee Leiden
$organization = "Gementee Leiden";
$projects = getProjectsByOrganization($organization);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gementee Leiden Projects</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <h2><?php echo htmlspecialchars($organization); ?> Projects</h2>
                <div class="list-group">
                    <?php foreach ($projects as $project): ?>
                        <div class="list-group-item">
                            <h5 class="mb-1"><?php echo htmlspecialchars($project['project_name']); ?></h5>
                            <p class="mb-1"><?php echo htmlspecialchars($project['description']); ?></p>
                            <small>Duration: <?php echo htmlspecialchars($project['duration']); ?> weeks</small><br>
                            <small>Contact Person: <?php echo htmlspecialchars($project['contact_person']); ?></small>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
