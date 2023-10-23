<?php
include 'conn.php';

if (isset($_GET['content_id'])) {
    $content_id = $_GET['content_id'];
    $sql = "SELECT title, content_info FROM content WHERE content_id = $content_id";
    $result = mysqli_query($conn, $sql);
    
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $title = $row['title'];
        $content_info = $row['content_info'];
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update content in the database
    $title = $_POST['title'];
    $content_info = $_POST['content_info'];

    $sql = "UPDATE content SET title = '$title', content_info = '$content_info' WHERE content_id = $content_id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the original page or a success page
        header("Location: 1y.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <!-- Add your CSS and other headers here -->
</head>
<body>
    <h2>Edit Content</h2>
    <form method="post">
        <label for="title">Title:</label>
        <input type="text" name="title" value="<?php echo $title; ?>">
        
        <label for="content_info">Content:</label>
        <textarea name="content_info"><?php echo $content_info; ?></textarea>
        
        <input type="submit" value="Save" >
    </form>
</body>
</html>
