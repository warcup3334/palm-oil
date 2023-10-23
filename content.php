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

if (isset($_GET['id'])) {
    $contentId = $_GET['id'];

    // Perform a query to retrieve the content based on the content ID
    $sql = "SELECT title, content_info, image FROM content WHERE content_id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $contentId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

}

// Close the database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);

?>


<!DOCTYPE html>
<html>
<head>
    <title>ใส่ปุ๋ยปาล์มน้ำมันอายุ 1 ปี</title>
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
            <button class="account-button"><?php echo $firstname?></button>
            <div class="account-dropdown-content">
                <a href="profile.php">My Profile</a>
                <a href="logout.php">Logout</a>
            </div>
        </div>
    </nav>
</header>
    
<h2>การแนะนําการใส่ปุ๋ย</h2>
<br><br>

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
            $editLink = "<td><a href='edit.php?content_id=" . $contentId. "'>Edit</a></td>";
            $deleteLink = "<td><a href='delete.php?content_id=" . $contentId . "' onclick='return confirm(\"Are you sure you want to delete this content?\")'>Delete</a></td>";
        } else {
            $editLink = "";  // If the role is "user," these links will be empty
            $deleteLink = "";
        }
        echo "<tr>
        <td>" . $contentId . "</td>
        <td>" . $row["title"] . "</td>
        <td>" . $row["content_info"] . "</td>
        <td><img src='img/" . $row["image"] . "' alt='Image' class='custom-image'></td>
        $editLink
        $deleteLink
      </tr>";
    }
    ?>
</table><br>

  
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
   

<br><br><br>

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