<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "cake_shop";

$conn = mysqli_connect($server_name, $username, $password, $database_name);

// Check the connection
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if (isset($_POST['submit'])) {
    $user_name = isset($_POST['user']) ? $_POST['user'] : '';
    $password = isset($_POST['pass']) ? $_POST['pass'] : '';

    $sanitized_username = mysqli_real_escape_string($conn, $user_name);
$sanitized_password = mysqli_real_escape_string($conn, $password);

$sql_query = "SELECT username, password FROM login_details WHERE username='$sanitized_username' AND password='$sanitized_password'";

$result = mysqli_query($conn, $sql_query);

if (mysqli_num_rows($result) > 0) {
    mysqli_free_result($result); // Free the result set
    mysqli_close($conn); // Close the database connection
    header("Location: Home.html");
    exit;
} else {
    //echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    header("Location: signup.html?error=incorrect");
    exit;
}

    mysqli_close($conn);
}
?>