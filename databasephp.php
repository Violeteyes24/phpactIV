<html>
<body>
<!-- showing off details, $POST - associative array of variables passed to current script via HTTP POST method -->
Welcome 
<?php echo $_POST["name"]; ?>
<br>
Your email address is:
<?php echo $_POST["email"]; ?>
<br>
Your age is:
<?php echo $_POST["age"]; ?>
<br>
You live in:
<?php echo $_POST["Country"]; ?>
<br>
Your gender is:
<?php echo $_POST["gender"]; ?>
<br>
Your interest are:
<?php echo $_POST["interests"]; ?>
<br>

<?php
$servername = "localhost"; // default for xampp
$username = "root"; // default for xampp
$password = ""; // default for xampp
$database = "zlegaria"; // dbname

$name = $_POST['name'];
$email = $_POST['email'];
$age = $_POST['age'];
$country = $_POST['Country'];
$gender = $_POST['gender'];
$interests = $_POST['interests'];

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if (isset($_POST['submit_button'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $country = $_POST['Country'];
    $gender = $_POST['gender'];
    $interests = $_POST['interests'];
}

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO `users` (name, email, age, Country, gender, interests)
            VALUES ('$name','$email','$age','$country','$gender','$interests')";

    $conn->exec($sql);
    echo "New record inserted successfully";
} catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
?>

</body>
</html>