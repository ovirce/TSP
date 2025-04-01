<?php
session_start();
include 'db_connection.php';

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
   
} else {
   
    echo "Please log in to view your game history.";
    exit; 
}
$sql = "SELECT level, selected_option, is_correct, timestamp
        FROM attempts
        WHERE user_id = ?
        ORDER BY level, timestamp";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();

$attempts = [];
while ($row = $result->fetch_assoc()) {
    $attempts[] = $row;
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Game History</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Game History</h1>
    <?php
    $previousLevel = null;
    foreach ($attempts as $attempt) {
        if ($attempt['level'] != $previousLevel) {
            if ($previousLevel !== null) {
                echo "</ul>";
            }
            echo "<h2>Level " . $attempt['level'] . "</h2>";
            echo "<ul>";
            $previousLevel = $attempt['level'];
        }
        if ($attempt['level'] == 1) {
            $options = [1 => 'Wool', 2 => 'Velvet', 3 => 'Denim'];
        } elseif ($attempt['level'] == 2) {
            $options = [1 => 'Martin Luther', 2 => 'Henry 8th', 3 => 'Shakespeare'];
        } elseif ($attempt['level'] == 3) {
            $options = [1 => 'Tudor', 2 => 'Stuart', 3 => 'Victorian'];
        } else {
            $options = []; // Default case, if needed
        }
        $selectedText = $options[$attempt['selected_option']];
        $correctText = $attempt['is_correct'] ? 'Correct' : 'Incorrect';

        echo '<li>Selected: ' . $selectedText . ' - ' . $correctText . ' on ' . $attempt['timestamp'] . '</li>';
    }
    if ($previousLevel !== null) {
        echo "</ul>";
    }
    ?>
    <div>
        <button onclick="window.location.href='studentPage.php'">Back to Student Page</button>
    </div>
</body>
</html>