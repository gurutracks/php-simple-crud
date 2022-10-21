<html lang="en">
<head>
    <title>Create Record</title>
</head>
<body>
    <h1>CRUD application with PHP and MySQL</h1>
    <!-- HTML form for user input. Form submits to itself to execute PHP code bellow -->
    <form action="<?php ($_SERVER["PHP_SELF"]); ?>" method="post">
        <label>Name</label><br>
        <input type="text" name="form_name" size="50"><br>
        <label>Address</label><br>
        <input type="text" name="form_address" size="50"><br>
        <label>Phone</label><br>
        <input type="text" name="form_phone" size="50"><br>
        <label>Email</label><br>
        <input type="text" name="form_email" size="50"><br><br>
        <input type="submit">
    </form>
</body>
</html>

<?php  
    // Include the config file
    include('config.php');

    // If form submits and method is POST
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // Get form session variables
        $input_name = $_POST["form_name"];
        $input_address = $_POST["form_address"];
        $input_phone = $_POST["form_phone"];
        $input_email = $_POST["form_email"];

        // Insert the variables's data into table
        $sql = "INSERT INTO address_table (name, address, phone, email)
            VALUES ('$input_name', '$input_address', '$input_phone', '$input_email')";

        // Execute the query
        if(mysqli_query($conn, $sql)){
            // On success, redirect to landing page
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
