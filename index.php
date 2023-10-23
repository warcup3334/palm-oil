
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="popup" class="popup"></div>

 <header>

    <nav class="navigation" >
        <a href="home.php" >Home</a>
        <a href="rf.php" >Fertilizing</a>
    </nav>   

    <h2 class="logo"><a href="https://www.youtube.com/watch?v=C2c9QaH28js" target="_blank"> <img src="img/palmy-126.png" width="50" height="50"></a></h2>

    <nav class="navigation">
        <a href="dt.php">Disease</a>
    </nav>
    <button class="btnLogin-popup">Login</button>
 </header>
 <section class="showcase">
    <div class="video-container">
        <video src="img/palm-vid.mp4" autoplay muted loop></video>
    </div>
</section> 
   
 <div class="wrapper">

    <span class="icon-close"><ion-icon name="close-outline"></ion-icon></span>
    <div class="form-box login">
        <h2>Login</h2>
        <form action="login.php" method="post">
            
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
            <div class="remember-forgot">
                <a href="admin-login.php" class="admin-link"> -ADMIN- </a>
            <a href="forgot.php" class="forgot">Forgot Password?</a>
            </div>
            <button type="submit" class="btn" name="login">Login</button>
            <div class="login-register">
                <p>Don't have account? <a href="#" class="register-link">register</a></p>
            </div>
        </form>
    </div>

    <div class="form-box register">
        <h2>Registration</h2>
        <form action="register.php" method="post">
            
            <div class="input-box-container">
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="firstname" required>
                    <label>First name</label>
                </div>
                <div class="input-box">
                    <span class="icon"><ion-icon name="person"></ion-icon></span>
                    <input type="text" name="lastname" required>
                    <label>Last name</label>
                </div>
            </div>

            <div class="input-box">
                <span class="icon"><ion-icon name="mail"></ion-icon></span>
                <input type="email" name="email" required>
                <label>Email</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name=""></ion-icon></span>
                <select name="knowledge" required>
                    <option value="" disabled selected style="display: none;"></option>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
                <label>Do you know about palm oil?</label>
            </div>
            <div class="input-box">
                <span class="icon"><ion-icon name=""></ion-icon></span>
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <!-- <div class="agree-term">
                <label><input type="checkbox">agree of term & conditions</label>
            </div> -->
            <button type="submit" class="btn" name="register">Register</button>
            <div class="login-register">
                <p>Already have an account? <a href="#" class="login-link">Login</a></p>
            </div>
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

    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<!-- <a href="https://www.flaticon.com/free-icons/tree" title="tree icons">Tree icons created by Freepik - Flaticon</a> -->
<!-- Image by <a href="https://www.freepik.com/free-vector/realistic-autumn-landscape_20828167.htm#query=red%20landscape%20tree&position=2&from_view=search&track=ais">Freepik</a> -->
</html>