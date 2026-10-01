<?php
require 'db_connect.php';
​if (_SERVER["REQUEST_METHOD"] == "POST" && isset(_POST['attendance'])) {
$date = date('Y-m-d');
try {
$stmt = $conn->prepare("INSERT INTO attendance (student_id, date, status) VALUES
((SELECT id FROM students WHERE register_number = :register_number), :date, :status)");
​foreach ($_POST['attendance'] as $record) {
$stmt->execute([
'register_number' => $record['register_number'],
'date' => $date,
'status' => $record['status']
]);
}
echo "Attendance submitted successfully!";
} catch(PDOException $e) {
echo "Error submitting attendance: " . $e->getMessage();
}
}
?>
