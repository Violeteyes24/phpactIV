<html>
<body>
<!-- showing off details, $POST - associative array of variables passed to current script via HTTP POST method -->
Welcome 
<?php echo $_POST["emp_no"]; ?>
<br>
Your email address is:
<?php echo $_POST["birth_date"]; ?>
<br>
Your age is:
<?php echo $_POST["first_name"]; ?>
<br>
You live in:
<?php echo $_POST["last_name"]; ?>
<br>
Your gender is:
<?php echo $_POST["gender"]; ?>
<br>
Your interest are:
<?php echo $_POST["hire_date"]; ?>
<br>

<?php
$servername = "localhost"; // default for xampp
$username = "root"; // default for xampp
$password = ""; // default for xampp
$database = "zlegariaa"; // dbname

$empno = $_POST['emp_no'];
$bdate = $_POST['birth_date'];
$fname = $_POST['first_name'];
$lname = $_POST['last_name'];
$gender = $_POST['gender'];
$hdate = $_POST['hire_date'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if (isset($_POST['submit_button'])) {
    $empno = $_POST['emp_no'];
    $bdate = $_POST['birth_date'];
    $fname = $_POST['first_name'];
    $lname = $_POST['last_name'];
    $gender = $_POST['gender'];
    $hdate = $_POST['hire_date'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `users` (name, email, age, Country, gender, interests)
            VALUES ('$empno','$bdate','$fname','$lname','$gender','$hdate')";

    $conn->exec($sql);
    echo "New record inserted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

</body>
</html>