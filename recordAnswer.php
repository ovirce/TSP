<?php
header('Content-Type: application/json'); // Ensure the response is JSON
session_start();
include 'db_connection.php'; // Include database connection

// Get data from the POST request
$data = json_decode(file_get_contents('php://input'), true);
$level = $data['level'];
$selectedOption = $data['selectedOption'];
$userId = $_SESSION['user_id'];

// Define the correct option (2 for level 1, adjust as needed for other levels)
//$correctOption = ($level == 1) ? 2 : 0;
if ($level == 1) {
    $correctOption = 2; // Correct answer for level 1
} elseif ($level == 2) {
    $correctOption = 3; // Correct answer for level 2
} elseif ($level == 3) {
    $correctOption = 1; // Correct answer for level 3
}
/*elseif ($level == 2) {
    $correctOption = 3; // Correct answer for level 2
} elseif ($level == 3) {
    $correctOption = 1; // Correct answer for level 3
}*/
$isCorrect = ($selectedOption == $correctOption) ? 1 : 0;

// Insert attempt into the database
$sql = "INSERT INTO attempts (user_id, level, selected_option, is_correct, timestamp)
        VALUES (?, ?, ?, ?, NOW())";
$stmt = $conn->prepare($sql);
$stmt->bind_param("iiii", $userId, $level, $selectedOption, $isCorrect);
$stmt->execute();

$stmt->close();
$conn->close();

// Return a success response
echo json_encode(['status' => 'success']);
?>