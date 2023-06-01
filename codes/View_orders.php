<html>
<head>
    <title>Orders</title>
    <style>
        /* Center the table */
        #orderDetailsContainer {
            display: flex;
            align-content:center;
            width: 100%;
            
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
        .orders{
            text-align:center;
            padding-top:10px;
        }
    </style>
</head>
<body>
    <h1 class="orders">Orders</h1>
    <br>
    <br>
    <div id="orderDetailsContainer">
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
    
        // Retrieve order details from the database
        $sql_query = "SELECT * FROM order_details";
        $result = mysqli_query($conn, $sql_query);
    
        if (mysqli_num_rows($result) > 0) {
            // Output order details
            echo "<table>";
            echo "<tr>";
            echo "<th>Quantity</th>";
            echo "<th>Name</th>";
            echo "<th>Phone number</th>";
            echo "<th>Door no</th>";
            echo "<th>Area</th>";
            echo "<th>City</th>";
            
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>";
              echo "<td>" . $row['quantity'] . "</td>";
              echo "<td>" . $row['name'] . "</td>";
              echo "<td>" . $row['mobile'] . "</td>";
              echo "<td>" . $row['door_no'] . "</td>";
              echo "<td>" . $row['area'] . "</td>";
              echo "<td>" . $row['city'] . "</td>";
              echo "</tr>";
          }
          echo "</table>";
      } else {
          echo "No order details found.";
      }
    
      mysqli_close($conn);
      ?>
        
    </div>
</body>
</html>
