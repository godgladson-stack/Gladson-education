<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Student Attendance</title>
</head>
<body>
    <h2>Mark Attendance</h2>
    <form method="post" action="">
        <label for="reg_no">Register Number:</label><br>
        <input type="text" id="reg_no" name="reg_no" required><br><br>

        <label for="name">Student Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label>Status:</label><br>
        <input type="radio" id="present" name="status" value="Present" required>
        <label for="present">Present</label>
        <input type="radio" id="absent" name="status" value="Absent">
        <label for="absent">Absent</label><br><br>

        <input type="submit" name="submit" value="Submit Attendance">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $reg_no = htmlspecialchars($_POST['reg_no']);
        $name = htmlspecialchars($_POST['name']);
        $status = htmlspecialchars($_POST['status']);
        $date = date('Y-m-d H:i:s');

        // Displaying the submitted data for now
        echo "<h3>Attendance Submitted Successfully!</h3>";
        echo "Register Number: " . $reg_no . "<br>";
        echo "Name: " . $name . "<br>";
        echo "Status: " . $status . "<br>";
        echo "Date & Time: " . $date . "<br>";
        
        // You can add database or file saving logic here later
    }
    ?>
</body>
</html>
