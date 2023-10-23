<?php
include 'conn.php';

if (isset($_GET['content_id'])) {
    $content_id = $_GET['content_id'];

    // Perform the deletion of the content
    $sql = "DELETE FROM content WHERE content_id = $content_id";

    if (mysqli_query($conn, $sql)) {
        // Redirect to the original page or a success page
        header("Location: rf.php");
        exit();
    }
}
?>
