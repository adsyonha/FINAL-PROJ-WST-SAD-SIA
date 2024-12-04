<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hypnotized";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    $delete_query = "DELETE FROM orders WHERE id = $delete_id";
    if (mysqli_query($conn, $delete_query)) {
        echo "";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
$sql_query = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql_query);

if (isset($_POST["save"])) {
    $name = $_POST["name"];
    $teestyle = $_POST["teestyle"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $zipcode = $_POST["zip"];
    $size = $_POST["size"];
    $method = $_POST["method"];

    $sql_query = "INSERT INTO orders (name, teestyle, phone, address, zip, size, method) 
                  VALUES ('$name', '$teestyle', '$phone', '$address', '$zipcode', '$size','$method')";

    if (mysqli_query($conn, $sql_query)) {
        echo "";
    } else {
        echo "Error: " . $sql_query . "<br>" . mysqli_error($conn);
    }
}

$sql_query = "SELECT * FROM orders";
$result = mysqli_query($conn, $sql_query);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hypnotized.Studios</title>
    <link rel="stylesheet" href="vieworder.css">

</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">Hypnotized.Studio</label>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="product.html">Products</a></li>
            <li><a class="active" href="order.php">View Order</a></li>
        </ul>
    </nav>
<body>
    <h2>Order List</h2>
    <table>
        <thead>
                <th>Order ID</th>
                <th>Name</th>
                <th>Item No.</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Zipcode</th>
                <th>Size</th>
                <th>Method</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>" . $row['id'] . "</td>
                            <td>" . $row['name'] . "</td>
                            <td>" . $row['teestyle'] . "</td>
                            <td>" . $row['phone'] . "</td>
                            <td>" . $row['address'] . "</td>
                            <td>" . $row['zip'] . "</td>
                            <td>" . $row['size'] . "</td>
                            <td>" . $row['method'] . "</td>
                            <td>
                                <a href='?delete_id=" . $row['id'] . "'>
                                    <button class='cancel-button'>Cancel</button>
                                </a>
                            </td>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No orders found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>