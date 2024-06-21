<?php
include 'db_connection.php';

// Retrieve the organization name from the URL query string
$organization = $_GET['organization'] ?? '';

if (empty($organization)) {
    die('No organization specified.');
}

// Fetch projects from the database
$sql = "SELECT * FROM projects WHERE organization = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$organization]);
$projects = $stmt->fetchAll();

if (!$projects) {
    echo "No projects found for this organization.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Projects - <?php echo htmlspecialchars($organization); ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h1>Projects for <?php echo htmlspecialchars($organization); ?></h1>
    <?php if ($projects): ?>
    <table class="table">
        <thead>
            <tr>
                <th>Project Name</th>
                <th>Description</th>
                <th>Duration</th>
                <th>Contact Person</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?php echo htmlspecialchars($project['project_name']); ?></td>
                    <td><?php echo htmlspecialchars($project['description']); ?></td>
                    <td><?php echo htmlspecialchars($project['duration']); ?></td>
                    <td><?php echo htmlspecialchars($project['contact_person']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <p>No projects available for this organization.</p>
    <?php endif; ?>
    <a href="index.php" class="btn btn-primary">Back to Dashboard</a>
</div>
</body>
</html>
