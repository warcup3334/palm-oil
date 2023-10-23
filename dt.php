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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Disease&Treatment</title>
    <link rel="stylesheet" href="dt.css">
</head>

<body>
 <header>  
    <nav class="navigation">
        <a href="home.php" >Home</a>
        <a href="rf.php" >Fertilizing</a>
        
    </nav>   

    <h2 class="logo"><a href="https://www.youtube.com/watch?v=C2c9QaH28js" target="_blank"> <img src="img/palmy-126.png" width="60" height="60"></a></h2>

    <nav class="navigation">
        <a href="dt.php" >Disease</a>
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
 </header>
 
<div class="wrapper">
    <h2>โรคที่พบเจอและการรักษา</h2>
    <br><br><br>
    <div class="text-box">
        <img src="img/Disease&Treatment1.jpg" alt="Disease&Treatment1" width="500px"><br>
        <h3>1. โรคใบไหม้ ปาล์มใบไหม้</h3>
        <p>
            โรคใบไหม้ (Curvularia Seeding Blight) เป็นโรคสำคัญ พบมากในช่วงระยะต้นกล้าปาล์ม และพบในระยะที่ลงแปลงปลูกในช่วง 1 ปีแรก<br>
            <strong>อาการของโรค :</strong>
            มักพบอาการบนใบอ่อน ซึ่งส่วนมากจะเป็นช่วงที่ใบเริ่มคลี่ โดยระยะแรกจะเกิดเป็นจุดเล็กๆ ลักษณะโปร่งใส ระยะต่อมาเมื่อแผลขยายเต็มที่จะมีสีน้ำตาลแดงขอบสีน้ำเงินเข้มมีวงแหวนสีเหลืองล้อมรอบ แผลจะมีรูปร่างทรงกลมรี มีความยาวของแผลประมาณ 7-8 มิลลิเมตร ไม่เหมาะกับการนำไปปลูก เพราะต้นกล้าเจริญเติบโตช้ากว่าปกติ หากอาการรุนแรงอาจจะทำให้ใบใหม่และต้นกล้าตายได้
        </p>    
            <br>
            <strong>การป้องกันและกำจัด โรคใบไหม้ ในปาล์ม ปาล์มน้ำมัน</strong><br>
            <ol>
                <li>แยกต้นที่มีอาการออกมาเผาทำลาย</li>
                <li>พ่นด้วยสารป้องกันกำจัดโรคพืชที่ไม่มีสารทองแดงเป็นองค์ประกอบ เช่น ไทแรม 75% WP ในอัตรา 50 กรัม/น้ำ 20 ลิตร</li>
                <li>ฉีดพ่นทุก 5-7 วัน โดยเฉพาะช่วงที่มีการระบาด</li>
            </ol>     
    </div>
    <br><br>
    <div class="text-box">
        <img src="img/Disease&Treatment2.jpg" alt="Disease&Treatment2"><br>
        <h3>2. ปาล์มใบจุด โรคใบจุดปาล์มน้ำมัน</h3>
        <p>
            โรคใบจุด (Halminthosporium leaf spot) มักพบกับต้นกล้าปาล์มน้ำมันอายุตั้งแต่ 5 เดือนขึ้นไป ในช่วงที่มีสภาพอากาศแล้งจัดหรือมีความชื้นน้อย<br>
            <strong>อาการของโรค :</strong>
            พบบนใบอ่อนได้เช่นเดียวกัน แต่ลักษณะแผลจะเป็นจุดสีเหลืองกลมเล็กๆ มีขอบวงแหวนสีเหลือง ความหนาแน่นของจุดจะมีปริมาณมากกว่าโรคใบไหม้ โดยมากมักเกิดเป็นกลุ่มๆ และมักเกิดบริเวณปลายใบเข้ามา
            เมื่อมีอายุเยอะขึ้นจุดแผลสีเหลืองจะกลายเป็นจุดสีน้ำตาล เมื่ออาการรุนแรงจุดสีเหลืองจะขยายตัวรวมกัน ทำให้ใบเหลืองทั้งใบ บนปลายใบเริ่มแห้งเป็นสีน้ำตาล
            สาเหตุ เชื้อรา Drechslera sp.
            การแพร่ระบาด สปอร์ของเชื้อรา ปลิวไปตามลม และน้ำ
        </p>
            <br>
            <strong>การป้องกันและกำจัดโรค โรคปาล์มใบจุด</strong><br>
            <ol>
                <li>แยกต้นที่มีอาการออกมาเผาทำลาย</li>
                <li>ฉีดพ่นด้วยสารป้องกำจัดโรคพืชที่เกิดจากเชื้อรา เช่น ไทแรม หรือ แคปเทน ให้ทั่วทั้งต้นและใต้ใบ</li>
            </ol>              
    </div>
    <br><br>
    <div class="text-box">
        <img class="" src="img/Disease&Treatment3.jpg" alt="Disease&Treatment3"><br>
        <h3>3. โรครากเน่าของต้นกล้า</h3>
        <p>โรครากเน่าของต้นกล้า (Nursery Root Rot) โรคนี้พบมากในสภาวะที่มีฝนตกมากหลังจากแล้งติดต่อกันยาวนาน<br>
            <strong>อาการของโรค :</strong> อาการจะคล้ายกับ โรคบลาส แต่บริเวณรากจะเน่าเป็นสีน้ำตาล ภายในรากจะกลวง เมื่อพบอาการใบเหลืองซีด และใบยอดมีอาการแห้ง แสดงว่ารากแก้วได้ถูกทำลายลงหมดแล้ว<br>
            <br><strong>อาการผิดปกติที่เกิดในระยะต้นกล้า</strong><br>
        </p>
        <ol>
        <li><strong>Collante</strong><br>
            เป็นอาการของต้นปาล์มน้ำมันที่ได้รับน้ำไม่เพียงพอ พบมากในช่วงฤดูแล้ง ฤดูที่มีอากาศร้อนจัด<br>
            <strong>ลักษณะอาการ :</strong>
            บริเวณใบยอดจะติดกันเป็นหลอดกลม อาจจะติดกับยอด หรืออาจจะติดเฉพาะโคน หรือปลายยอด ทำให้ต้นกล้าปาล์มน้ำมันไม่สามารถแทงยอดใหม่ได้ ต้นกล้าปาล์มจะไม่มีการเจริญเติบโตต่อไป
            <br>
            <strong>สาเหตุ :</strong>
            การขาดน้ำ</li>
        <li><strong>Nursery Transplanting Chock</strong><br>
            <strong>ลักษณะอาการ</strong>
            ใบยอดจะแสดงอาการเขียวจัดกว่าปกติ และจะเริ่มเหี่ยวจนเป็นสีเขียวน้ำตาล โดยเริ่มจากโคนใบ จนกระทั่งยอดใบแห้ง และใบถัดมาเริ่มแสดงอาการแห้งให้เห็นจนสามารถดึงต้นหลุดออกจากเมล็ดได้ นอกจากนี้รากจะเน่าแห้งเป็นสีน้ำตาลภายในกลวง
            <br>
            <strong>สาเหตุ :</strong>
            ขาดความระมัดระวังในการย้ายต้นกล้า หรือทำการถอนย้ายต้นกล้าในขณะที่อากาศร้อนจัดจนเกินไป หรือถอนกล้าทิ้งเอาไว้นานเกินไป หรือไม่ใช้วิธีการปลูกที่ถูกต้อง</li>
        <li><strong>ใบไหม้เนื่องจากปุ๋ย (Fertilizer burn)</strong><br>
            ใบไหม้เนื่องจากปุ๋ย, โรคปาล์ม, โรคปาล์มน้ำมัน,ลักษณะอาการ: ใบไหม้เนื่องจากปุ๋ย
            <br>
            <strong>ลักษณะอาการ :</strong>
            จะแสดงอาการบริเวณยอดใบอ่อน โดยจะเริ่มซีดและแห้งลงอย่างรวดเร็ว ส่วนที่จะแสดงอาการนั้นจะฉีกขาดง่าย ขอบของแผลจะไม่เห็นชัดเท่าอการของโรคต่างๆ
            <br>
            <strong>สาเหตุ :</strong>
            ให้ปุ๋ยในขณะอากาศร้อนจัด หรือมีอากาศแห้งแล้งจัด หรือให้ปุ๋ยในอัตราที่สูงเกินไป</li>
    </ol>              
    <br>
    </div>
    <div class="text-box">
        <img src="img/Disease&Treatment4.png" alt="Disease&Treatment4"><br>
        <h3>4. พิษจากยาฆ่าหญ้า (Herbicides toxicity)</h3>
        <p>
            พิษจากยาฆ่าหญ้า, ใบไหม้จากยาฆ่าหญ้า, โรคปาล์ม, โรคปาล์มน้ำมัน,ลักษณะอาการ: พิษจากยาฆ่าหญ้า (Herbicides toxicity)
            <br>
            <strong>ลักษณะอาการ :</strong>
            เกิดจุดแผลยุบตื้นๆมีลักษณะด้าน(ไม่มัน) มีขนาดไม่แน่นอน ขอบของแผลสีเข้มจัดชัดเจน ขอบแผลมีวงสีเหลืองล้อมรอบ
            <br>
            <strong>สาเหตุ :</strong>
            พิษจากยาฆ่าหญ้า
            ไอเอส ยารักษาโรคปาล์ม ที่มีสาเหตุจากเชื้อราต่างๆ เช่น โรคปาล์มใบไหม้ โรคใบจุดปาล์ม โรคแอนแทรคโนส โรคบลาส เป็นต้น               
        </p>
    </div>
    <div class="text-box" style="margin-top: 50px;">    
    <h3>Reference</h3>
    <ul>
        <li>https://www.fkx.asia/</li>
        <li>https://yvpgroup.com/palm-oil-fertilizer/</li>
        <li>https://th.wikipedia.org/wiki/</li>
        <li>https://puimongkut.com/en/site/farmerguide/detail/</li>
    </ul>
 
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


    <script src="search.js"></script>
    <script src="script.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
<!-- <a href="https://www.flaticon.com/free-icons/tree" title="tree icons">Tree icons created by Freepik - Flaticon</a> -->
<!-- Image by <a href="https://www.freepik.com/free-vector/realistic-autumn-landscape_20828167.htm#query=red%20landscape%20tree&position=2&from_view=search&track=ais">Freepik</a> -->
</html>