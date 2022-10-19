<?php  
// index.php

// Include the config file
include('config.php');

// Add a link for new record addition
echo "<a href=create.php>Add New Address</a><br>";

// Select fields
$sql = "SELECT * FROM address_table";

// Execute query
$result = mysqli_query($conn, $sql);

// Show Fields
if (mysqli_num_rows($result) > 0) {
?>
<!-- Create a HTML table to format the output -->
  <table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th>EMail</th>
        <th>Actions</th>
	  </tr>
<?php
    // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        echo "<td>" . $row["id"] . "</td>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["address"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["email"] . "</td>";
        // Links to update and delete file by passing table "id" filed
        echo "<td><a href=update.php?id=" .$row["id"] . ">Update</a>&nbsp;"; 
        echo "<a href=delete.php?id=" .$row["id"] . ">Delete</a>";
        echo "</td>";
    echo "</tr>";
  }
  echo "</table>";
} else {
  echo "No records found";
}

// Close mysql connection
mysqli_close($conn);
?>