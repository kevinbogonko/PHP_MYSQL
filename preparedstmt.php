<?php
/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "demo");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
// Prepare an insert statement
$sql = "INSERT INTO persons (first_name, last_name, email) VALUES (?, ?, ?)";
 
if($stmt = mysqli_prepare($link, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "sss", $first_name, $last_name, $email);
    
    /*
    b — binary (such as image, PDF file, etc.)
    d — double (floating point number)
    i — integer (whole number)
    s — string (text)
    */
 
    /* Set the parameters values and execute
    the statement again to insert another row */
    $first_name = "Hermione";
    $last_name = "Granger";
    $email = "hermionegranger@mail.com";
    mysqli_stmt_execute($stmt);
    
    /* Set the parameters values and execute
    the statement to insert a row */
    $first_name = "Ron";
    $last_name = "Weasley";
    $email = "ronweasley@mail.com";
    mysqli_stmt_execute($stmt);
    
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
}
 
// Close statement
mysqli_stmt_close($stmt);
 
// Close connection
mysqli_close($link);
?>
