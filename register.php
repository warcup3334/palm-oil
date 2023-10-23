<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["register"])) {
    // Include the database connection file (conn.php)
    include('conn.php');

    // Retrieve form data
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $knowledge = ($_POST["knowledge"] == "yes") ? 1 : 0; 
    $password = $_POST["password"];
    $role = "user";

    // Hash the password for security (you should use a more secure method)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Insert data into the "user" table
    $sql = "INSERT INTO user (firstname, lastname, email, knowledge, password, role)
            VALUES ('$firstname', '$lastname', '$email', '$knowledge', '$hashedPassword', '$role')";

if (mysqli_query($conn, $sql)) {
    // Registration successful
    echo("Registration successful! We'll bring you back to page!");
    
    // Add a JavaScript script for redirection
    echo('<script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 3000); // 3000 milliseconds (3 seconds)
    </script>');
} else {
    // Registration failed
    echo("Error: " . $sql . "\n") . mysqli_error($conn);
        // Add a JavaScript script for redirection
        echo('<script>
        setTimeout(function() {
            window.location.href = "index.php";
        }, 3000); // 3000 milliseconds (3 seconds)
    </script>');
}

// Close the database connection
mysqli_close($conn);

}


?>
