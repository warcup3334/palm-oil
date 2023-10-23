<?php
// Start a session to persist user login status
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit();
}

// Include the database connection file (conn.php)
include('conn.php');

// Retrieve the user's data
$user_id = $_SESSION['user_id'];
$sql = "SELECT firstname, lastname, email, role FROM user WHERE id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);

    // User data
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];
    $email = $row['email'];
    $role = $row['role'];

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle error if user data retrieval fails
    echo "Error: Unable to retrieve user data.";
    exit();
}
// Include the database connection file (conn.php)
include('conn.php');

// Retrieve the search query from the URL parameter
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Perform a search query using SQL (e.g., using the LIKE clause)
    $sql = "SELECT content_id, title FROM content WHERE title LIKE ?";
    $stmt = mysqli_prepare($conn, $sql);
    $searchQuery = '%' . $searchQuery . '%'; // Add wildcards to search for partial matches
    mysqli_stmt_bind_param($stmt, "s", $searchQuery);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    // Display search results


    // Close the database connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>ผลการค้นหา</title>
    <link rel="stylesheet" href="1y.css">
</head>
<body>
<header>  
    <nav class="navigation">
        <a href="home.php">Home</a>
        <a href="rf.php">Fertilizing</a>
    </nav>   

    <h2 class="logo"><a href="https://www.youtube.com/watch?v=C2c9QH28js" target="_blank"> <img src="img/palmy-126.png" width="60" height="60"></a></h2>

    <nav class="navigation">
        <a href="dt.php">Disease</a>
        <div class="account-dropdown">
            <button class="account-button"><?php echo $firstname; ?></button>
            <div class="account-dropdown-content">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
</header>
    
<h2>ผลการค้นหา</h2>
<br><br>
<?php
if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo"<table>
            <tr>
                <th><a href='content.php?id=" . $row["content_id"] . "'>" . $row["title"] . "</a><br></th>
            </tr>
            </table>";
            
        }
    } else {
        echo "No results found.";
    }




?>