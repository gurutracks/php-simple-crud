<?php
// Include the config file
include('config.php');

// Get record id from landing page link
$id=$_GET["id"];

// Select the field to be updated
$sql = "SELECT * FROM address_table where id=$id";

// execute the query
$result = mysqli_query($conn, $sql);

// Get the row
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Record</title>
</head>
<body>
    <h1>CRUD application with PHP and MySQL</h1>
    <!-- HTML form with old data. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Name</label><br>
        <input type="text" name="form_name" value="<?php echo $row["name"]; ?> " size="50"><br>
        <label>Address</label><br>
        <input type="text" name="form_address" value="<?php echo $row["address"]; ?> " size="50"><br>
        <label>Phone</label><br>
        <input type="text" name="form_phone" value="<?php echo $row["phone"]; ?> " size="50"><br>
        <label>Email</label><br>
        <input type="text" name="form_email" value="<?php echo $row["email"]; ?> " size="50"><br><br>
        <input type="submit">
    </form>
</body>
</html>
<?php  
    // If form submits and method is POST? Get form data into variables
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $input_name = $_POST["form_name"];
        $input_address = $_POST["form_address"];
        $input_phone = $_POST["form_phone"];
        $input_email = $_POST["form_email"];
        // Update record with new changed data
        $sql = "UPDATE address_table SET name='$input_name', address='$input_address', phone='$input_phone', email='$input_email' where id='$id'";
        // Execute the query
        if(mysqli_query($conn, $sql)){
            // If successfull, redirect to landing page
            header("location: index.php");
            exit();
        } else{
            // If faild, throw an error
            echo "Something went wrong. Please try again later.";
        }
    }
// Close mysql connection
mysqli_close($conn);
?>
