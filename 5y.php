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

// Include the database connection file (conn.php) again for querying content data
include('conn.php');

// Retrieve content data
$sql = "SELECT content_id, title, content_info, image FROM content where content_id = 3";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>
    <title>ใส่ปุ๋ยปาล์มน้ำมันอายุ 5 ปีหรือออกผลผลิตแล้ว</title>
    <link rel="stylesheet" href="1y.css">
</head>
<body>
<header>  
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
    <form id="search-form" action="search_form.php" method="GET">
    <input type="text" name="query" id="search-input" placeholder="Search by title">
    <button type="submit" id="search-button">
        <ion-icon name="search-outline"></ion-icon>
    </button>
</form>
</header>
    
<h2>การแนะนําการใส่ปุ๋ย</h2>
<br><br>

<!-- Loop through the content data and display in a table -->
<table>
    <tr>
        <th>ที่</th>
        <th width="15%">หัวข้อ</th>
        <th>เนื้อหา</th>
        <th>รูปภาพ</th>
        <?php
        if ($role === 'admin') {
            echo "<th>แก้ไข</th><th>ลบ</th>";
        }
        ?>
    </tr>
    <?php
    
    while ($row = mysqli_fetch_assoc($result)) {
        if ($role === 'admin') {
            $editLink = "<td><a href='edit.php?content_id=" . $row["content_id"] . "'>Edit</a></td>";
            $deleteLink = "<td><a href='delete.php?content_id=" . $row["content_id"] . "' onclick='return confirm(\"Are you sure you want to delete this content?\")'>Delete</a></td>";
        } else {
            $editLink = "";  // If the role is "user," these links will be empty
            $deleteLink = "";
        }
        echo "<tr>
        <td>" . $row["content_id"] . "</td>
        <td>" . $row["title"] . "</td>
        <td>" . $row["content_info"] . "</td>
        <td><img src='img/" . $row["image"] . "' alt='Image' class='custom-image'></td>
        $editLink
        $deleteLink
      </tr>";
    }
    ?>
</table><br>
<br>
<div class="text-box">
    <h3>Reference</h3>
    <ul>
        <li>https://www.fkx.asia/</li>
        <li>https://yvpgroup.com/palm-oil-fertilizer/</li>
        <li>https://th.wikipedia.org/wiki/</li>
        <li>https://puimongkut.com/en/site/farmerguide/detail/</li>
    </ul>
    </div>
<br><br>

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

<script src="search.js"></script>
<script src="script.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
mysqli_close($conn);
?>
