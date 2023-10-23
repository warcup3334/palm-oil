<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    
 <header>

    <nav class="navigation" >
        <a href="home.php" >Home</a>
        <a href="rf.php" >Fertilizing</a>
    </nav>   

    <h2 class="logo"><a href="https://www.youtube.com/watch?v=C2c9QaH28js" target="_blank"> <img src="img/palmy-126.png" width="50" height="50"></a></h2>

    <nav class="navigation">
        <a href="dt.php">Disease</a>
    </nav>
    <button class="btnGoBack" ><a href="index.php">Go Back</a></button>
 </header>
 <section class="showcase">
    <div class="video-container">
        <video src="img/palm-vid.mp4" autoplay muted loop></video>
    </div>
</section> 
   
 <div class="wrapper">

    <div class="form-box admin">
        <h2>Admin</h2>
        <form action="admin.php" method="post">
            
            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" required>
                <label>Email</label>
      
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                <input type="password" name="password" required>
                <label>Password</label>
                
            </div>
            <button type="submit" class="btn" name="admin">Login</button>
        </form>
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

    
   
 

 
 
</body>
<script src="script.js"></script>   
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- <a href="https://www.flaticon.com/free-icons/tree" title="tree icons">Tree icons created by Freepik - Flaticon</a> -->
<!-- Image by <a href="https://www.freepik.com/free-vector/realistic-autumn-landscape_20828167.htm#query=red%20landscape%20tree&position=2&from_view=search&track=ais">Freepik</a> -->
</html>