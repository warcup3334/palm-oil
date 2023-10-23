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
$sql = "SELECT firstname FROM user WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $user_id);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $firstname = $row['firstname'];
} else {
    // Handle error if user data retrieval fails
    $firstname = "Error"; // Display a default value or handle the error as you prefer
}

// Retrieve titles from the content table with content_id 1, 2, and 3
$content_ids = [1, 2, 3];
$titles = [];

$sql = "SELECT content_id, title FROM content WHERE content_id IN (?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "iii", ...$content_ids); // Bind the content_ids array
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) >= 1) {
    while ($row = mysqli_fetch_assoc($result)) {
        $titles[$row['content_id']] = $row['title'];
    }
} else {
    // Handle error if title retrieval fails
    // You can handle this as needed
}

$firsttitle = $titles[1];
$secondtitle = $titles[2];
$thirdtitle = $titles[3];

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizing</title>
    
    <link rel="stylesheet" href="rf.css">
</head>

<body>
    <style>
#search-form{
    margin-right: -310px;

}        
#search-form input{
    width: 70%;
    padding: 10px;
    border: 2px solid crimson;
    border-radius: 6px;
    font-size: 1.1em;
    background: transparent;
    font-family: 'Poppins', sans-serif;
    margin-left: 40px;
    transition: .5s;
}

#search-form:focus {
    background-color: crimson;
    color: #FFB000;
}

/* Style for the search button */
#search-button {   
    background: crimson;
    border-radius: 6px;
    border: none;
    color: #FFB000;
    cursor: pointer;
    font-size: 1em;
    padding: 12px 12px 12px 12px;
    margin-left: -48px;
    transition: .5s;
}

#search-button:hover {
    background-color: #FFB000;
    color: crimson;
}

#search-input::placeholder {
    color: aliceblue;
}

#search-input:focus {
    background-color: crimson;
    color: #FFB000;
}

    </style>
 <header> 
    <nav class="navigation">
        <a href="home.php" >Home</a>
        <a href="rf.php" >Fertilizing</a>
        
    </nav>   

    <h2 class="logo"><a href="https://www.youtube.com/watch?v=C2c9QaH28js" target="_blank"> <img src="img/palmy-126.png" width="60" height="60"></a></h2>

    <nav class="navigation">
        <a href="dt.php" >Disease</a>
        <div class="account-dropdown">
            <button class="account-button"><?php echo $firstname;?></button>
            <div class="account-dropdown-content">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
    <form id="search-form" action="search_form.php" method="GET">
    <input type="text" name="query" id="search-input" placeholder="Search by title">
    <button type="submit" id="search-button">
        <ion-icon name="search-outline"></ion-icon>
    </button>
</form>
 </header>
 
 <div class="wrapper">
    <h2>การแนะนําการใส่ปุ๋ย</h2>

   
    <div class="text-box">
        <p>
            <br>
            <h3>รายการ การแนะนําการใส่ปุ๋ย</h3><br><br>
            <ul id="myUL">
                <li><a href="1y.php"><?php echo $firsttitle; ?></a><a href="1ypalm.pdf" download><button class="btn-download">Download</button></a></li><br>

                <li> <a href="2y.php"><?php echo $secondtitle; ?></a> <a href="2ypalm.pdf" download><button class="btn-download" >Download</button></a></li><br>
                <li><a href="5y.php"><?php echo $thirdtitle; ?></a><a href="5ypalm.pdf" download><button class="btn-download" >Download</button></a></li><br>
            </ul>   
        </p>    
   
    </div>
  
</div>

<footer>
<div class="social-media">
<a href="https://www.facebook.com/profile.php?id=100024454597292" target="_blank"><ion-icon name="logo-facebook"></ion-icon></a>
<a href="https://www.instagram.com/warcup3334" target="_blank"><ion-icon name="logo-instagram"></ion-icon></a>
<a href="https://www.pinterest.com/jsnvrh13" target="_blank"><ion-icon name="logo-pinterest"></ion-icon></a>
</div>
    <div class="footer-content">
        <p>&copy; 2023 Atithep Kaewthong & Ploychompu Laoubon / PALMY OIL inc.</p>
    </div>
</footer>

    <link rel="stylesheet" href="search.css">
    <script src="script.js"></script>
    <script src="search.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<!-- <a href="https://www.flaticon.com/free-icons/tree" title="tree icons">Tree icons created by Freepik - Flaticon</a> -->
<!-- Image by <a href="https://www.freepik.com/free-vector/realistic-autumn-landscape_20828167.htm#query=red%20landscape%20tree&position=2&from_view=search&track=ais">Freepik</a> -->
</html>