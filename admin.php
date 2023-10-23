<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["admin"])) {
    // Include the database connection file (conn.php)
    include('conn.php');

    // Retrieve form data
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Query to check if the user exists with the provided email
    $sql = "SELECT * FROM user WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) == 1) {
        // User with the provided email exists
        $row = mysqli_fetch_assoc($result);

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Password is correct, check the user role
            if ($row['role'] === 'admin') {
                // User is an admin, allow login
                session_start();
                $_SESSION['user_id'] = $row['id'];
                echo "Welcome | Admin";
                echo('<script>
                setTimeout(function() {
                    window.location.href = "home.php";
                }, 3000); // 3000 milliseconds (3 seconds)
            </script>');
                exit(); // Make sure to exit to prevent further execution of the script
            } else {
                // User is not an admin, restrict login
                echo "You do not have the necessary privileges to log in.";
                echo('<script>
                setTimeout(function() {
                    window.location.href = "index.php";
                }, 3000); // 3000 milliseconds (3 seconds)
            </script>');
            }
        } else {
            // Incorrect password
            echo "Incorrect password. Please try again.";
            echo('<script>
            setTimeout(function() {
                window.location.href = "admin-login.php";
            }, 3000); // 3000 milliseconds (3 seconds)
        </script>');
        }
    } else {
        // User with the provided email doesn't exist
        echo "User with this email does not exist. Please register.";
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
