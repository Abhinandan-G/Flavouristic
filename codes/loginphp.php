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

    $sql_query = "INSERT INTO login_details (username, password)
                  VALUES ('$user_name', '$password')";

    if (mysqli_query($conn, $sql_query)) {
        header("Location: Home.html");
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>