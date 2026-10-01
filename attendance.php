<?php
require 'db_connect.php';
​try {
$stmt = $conn-query("SELECT register_number, name FROM students")
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
echo "Error fetching students: " . $e->getMessage();
}
?>
​<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Student Attendance</title>
<style>
body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
.container { background-color: #fff; padding: 20px; border-radius: 8px; max-width: 600px; margin: 0 auto; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
h2 { text-align: center; color: #333; }
table { width: 100%; border-collapse: collapse; margin-top: 20px; }
th, td { padding: 10px; border-bottom: 1px solid #ccc; text-align: left; }
.radio-group { display: flex; gap: 15px; align-items: center; }
.radio-group label { display: flex; align-items: center; gap: 5px; cursor: pointer; }
input[type="radio"] { appearance: none; width: 20px; height: 20px; border-radius: 50%; border: 2px solid #ccc; outline: none; transition: background-color 0.2s; }
input[type="radio"]:checked { border-color: transparent; }
input[type="radio"].present:checked { background-color: #28a745; }
input[type="radio"].absent:checked { background-color: #dc3545; }
button { display: block; width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; margin-top: 20px; font-size: 16px; }
button:hover { background-color: #0056b3; }
</style>
</head>
<body>
<div class="container">
<h2>Mark Attendance</h2>
<form id="attendanceForm" action="process_attendance.php" method="POST">
<table>
<thead>
<tr>
<th>Register Number</th>
<th>Name</th>
<th>Status</th>
</tr>
</thead>
<tbody id="studentList">
<?php foreach ($students as $index => $student): ?>
<tr>
<td><?php echo htmlspecialchars($student['register_number']); ?></td>
<td><?php echo htmlspecialchars($student['name']); ?></td>
<td>
<div class="radio-group">
<label><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="present" class="present" required> Present</label>
<label><input type="radio" name="attendance[<?php echo $index; ?>][status]" value="absent" class="absent"> Absent</label>
<input type="hidden" name="attendance[<?php echo $index; ?>][register_number]" value="<?php echo htmlspecialchars($student['register_number']); ?>">
</div>
</td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
<button type="submit">Submit Attendance</button>
</form>
</div>
</body>
</html>
