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
    
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : '';
    $user_name = isset($_POST['username']) ? $_POST['username'] : '';
    $mobile_no = isset($_POST['phone']) ? $_POST['phone'] : '';
    $door_no = isset($_POST['door']) ? $_POST['door'] : '';
    $area = isset($_POST['area']) ? $_POST['area'] : '';
    $city = isset($_POST['city']) ? $_POST['city'] : '';

    $sql_query = "INSERT INTO order_details (quantity, name ,mobile, door_no, area, city)
                  VALUES ('$quantity','$user_name','$mobile_no','$door_no','$area','$city')";

    if (mysqli_query($conn, $sql_query)) {
        header("Location: success.html");
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>