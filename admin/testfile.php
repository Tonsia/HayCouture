<?php
// Connect to database
$servername = "localhost";
$username = "yourusername";
$password = "yourpassword";
$dbname = "yourdatabase";
$conn = mysqli_connect($servername, $username, $password, $dbname, 0, 65536);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement
$jobtitle = "Software Engineer";
$jobdescription = "We are looking for a talented software engineer to join our team.";
$par = "Bachelor's degree in Computer Science or related field.";
$sql = "INSERT INTO jobs (jobtitle, jobid, jobdesc, jobreq, status) 
        VALUES ('$jobtitle', NULL, '$jobdescription', '$par', 1);
        SET @jobid = CONCAT('HCJ', LAST_INSERT_ID());
        UPDATE jobs SET jobid = @jobid WHERE id = LAST_INSERT_ID();";

// Execute SQL statement
// if (mysqli_multi_query($conn, $sql)) {
//     do {
//         // Store first result set
//         if ($result = mysqli_store_result($conn)) {
//             mysqli_free_result($result);
//         }
//     } while (mysqli_next_result($conn));
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
// }


if ($mysqli -> multi_query($sql)) {
    do {
      // Store first result set
      if ($result = $mysqli -> store_result()) {
        while ($row = $result -> fetch_row()) {
          printf("%s\n", $row[0]);
        }
       $result -> free_result();
      }
      // if there are more result-sets, the print a divider
      if ($mysqli -> more_results()) {
        printf("-------------\n");
      }
       //Prepare next result set
    } while ($mysqli -> next_result());
  }
  





// Close connection
mysqli_close($conn);
?>


https://www.w3schools.com/php/func_mysqli_multi_query.asp