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
    <title>Home</title>
    <link rel="stylesheet" href="home.css">
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
            <button class="account-button"><?php echo $firstname?></button>
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
    <h2>ปาล์มน้ำมัน</h2>
    <br><br><br>
    <img src="img/palm1.jpg" alt="palm1">
    <div class="text-box">
        <p>  ปาล์มน้ำมัน เป็นพืชตระกูลปาล์มลักษณะลำต้นเดี่ยว ขนาดลำต้นประมาณ 12 -20 นิ้ว เมื่ออายุประมาณ 1-3 ปี ลำต้นจะถูกหุ้มด้วยโคนกาบใบ แต่เมื่ออายุมากขึ้นโคนกาบใบจะหลุดร่วงเห็นลำต้นชัดเจน ผิวของลำต้นคล้ายๆ ต้นตาล ลักษณะใบเป็นรูปก้างปลา โคนกาบใบจะมีลักษณะเป็นซี่ คล้ายหนามแต่ไม่คมมาก
            เมื่อไปถึงกลางใบหนามดังกล่าวจะพัฒนาเป็นใบ การออกดอกเป็นพืชที่แยกเพศ คือต้นที่เป็นเพศผู้ก็จะให้เกสรตัวผู้อย่างเดียว ต้นที่ให้เกสรตัวเมียจึงจะติดผล ลักษณะผลเป็นทะลายผลจะเกาะติดกันแน่นจนไม่สามารถสอดนิ้วมือเข้าไปที่ก้านผลได้ เวลาเก็บผลปาล์มจึงต้องใช้มีดงอ(มีดขอ)เกี่ยวที่โคนทะลายแล้วดึงให้ขาด ก่อนที่จะตัดทะลายปาล์มต้องตัดทางปาล์มก่อนเพราะผลปาล์มจะตั้งอยู่บนทางปาล์ม กระบวนการตัดทาง(ใบ)ปาล์มและตัดเอาทะลายปาล์มลง เรียกรวมๆว่า แทงปาล์ม ปาล์มน้ำมันจัดเป็น พืชเศรษฐกิจ มีถิ่นกำเนิดอยู่ในทวีปแอฟริกา เป็นพืชที่ให้ผลผลิต น้ำมันต่อหน่วยพื้นที่สูงกว่าพืชน้ำมันทุกชนิด
        </p>
    </div>
    <br><br>
    <div class="text-box">
        <img class="img-left" src="img/palm2.jpg" alt="palm2">
        <p>สามารถนำมาแปรรูปทำเป็นทั้งในรูปแบบของน้ำมันพืชที่ใช้ในการประกอบอาหาร และใช้เป็นวัตถุดิบในอุตสาหกรรมอาหารต่างๆ เช่น ขนมขบเคี้ยว บะหมี่กึ่งสำเร็จรูป นมข้นหวาน ครีมและเนยเทียม เป็นวัตถุดิบในการผลิตพลังงานทดแทน ไบโอดีเซลรวมถึงเป็นส่วนผสมในเพื่อช่วยลดการใช้น้ำมันดีเซล เพิ่มความมั่นคงทางด้านพลังงานให้กับประเทศ อีกทั้งยังจะช่วยลดปัญหาผลกระทบทางด้านสิ่งแวดล้อมอีกด้วย และยังสามารถแปรรูปเป็น สบู่ ผงซักฟอก เครื่องสำอาง ผลิตภัณฑ์เคมีภัณฑ์ต่างๆ และอาหารสัตว์ ด้วย ใบมาบดเป็นอาหารสัตว์ กะลาปาล์มเป็นวัตถุดิบเชื้อเพลิง ทะลายปาล์มใช้เพาะเห็ด และกระทั่งการปลูกลงดินไปแล้วก็ช่วยในการดูดซับก๊าซคาร์บอนไดออกไซด์ ในการช่วยลดภาวะโลกร้อนได้อีก [1]
            ในประเทศไทยมีการปลูกทั้งทางภาคใต้และภาคตะวันออก พันธุ์ปาล์มน้ำมันที่ส่งเสริมให้เกษตรกรปลูก เป็นปาล์มน้ำมันลูกผสมเทเนอรา โดยเฉพาะที่สามจังหวัดชายแดนภาคใต้ ช่วงปี 2547 - 2550 มีการส่งเสริมการปลูกปาล์มน้ำมันในพื้นที่นาร้าง โดยกรมพัฒนาที่ดิน มีการขุดร่องให้ฟรี ให้พันธุ์และปุ๋ย โดยให้เหตุผลในการส่งเสริมการปลูกเนื่องจากเป็นปาล์มที่ให้นำ้มันใช้ได้ทั้งการบริโภคและใช้เป็นไบโอดีเซลได้โดยประเทศที่ปลูกปาล์มนำ้มันได้แก่ อินโดนีเซีย 50ล้านไร่ มาเลเซีย 35ล้านไร่ ส่วนไทย 5.5ล้านไร่ปัจจุบันภาครัฐของไทยมีเป้าหมายจะปลูกปาล์มให้ได้ทั้งสิ้น 10ล้านไร่ภายในปี 2572 จากพื้นที่มีศักยภาพ ทั้งสิ้น 20ล้านไร่
            ปัจจุบัน ประเทศที่ผลิตและส่งออกน้ำมันปาล์มรายใหญ่ที่สุดในโลกคือประเทศมาเลเซีย ผลิตเป็นสัดส่วนมากถึงร้อยละ 47 ของการผลิดของโลก
        </p>
    </div>
    <br>
    <div class="text-box">
        <img class="img-right" src="img/palm3.jpg" alt="palm3">
        <p>ปาล์มน้ำมันเป็นพืชผสมข้ามที่มีช่อดอกตัวผู้และตัวเมียแยกออกจากกันอย่างชัดเจน ช่อดอกตัวเมียจะพัฒนาไปเป็นทะลาย ส่วนช่อดอกผู้จะมีลักษณะเป็นริ้วๆ คล้ายนิ้วมือ และเมื่อดอกตัวผู้บานแล้วจะแห้งไปเอง


            ในปาล์มหนึ่งต้นจะมีดอกตัวผู้และตัวเมียออกสลับกันไปทั้งปี โดยเฉลี่ยเดือนละ 1-2 ช่อดอกต่อต้น ซึ่งอาจจะเป็นตัวผู้หรือตัวเมียก็ได้ หากช่วงไหนที่สภาพอากาศไม่เหมาะสม เช่น ฝนไม่ตก แล้ง ขาดน้ำ ต้นปาล์มจะมีช่อผู้เป็นส่วนใหญ่ แต่หากมีฝนเพียงพอ ใส่ปุ๋ยมากเพียงพอ จะมีช่อเมียหรือทะลายมากขึ้น ปาล์มน้ำมันแต่ละต้นจะกำหนดปริมาณการให้ช่อดอกตัวผู้ และช่อดอกตัวเมีย ล่วงหน้า 3 เดือน โดยขึ้น กับปริมาณน้ำ ที่ต้นปาล์มน้ำมันนั้น ๆ ได้รับ เช่น หากต้นปาล์มได้รับน้ำ 
            ในปริมาณที่เหมาะสมในวันนี้ต้นปาล์มก็จะกำหนดให้ลำต้นออกช่อดอกตัวเมียมากกว่าช่อดอกตัวผู้ ในทางกลับกัน หากต้นปาล์มนั้น ๆได้รับน้ำ ในปริมาณที่ไม่เพียงพอในวันนี้ต้นปาล์มก็
            จะกำหนดให้ลำต้นออกช่อดอกตัวผู้มากกว่าช่อดอกตัวเมีย ซึ่งช่อดอกทั้ง ตัวผู้และตัวเมียที่ถูกกำหนดล่วงหน้านี้จะไปผลิออกเป็นช่อดอกในอีก 3 เดือนข้างหน้า ดังนั้น ปาล์มที่ปลูก
            โดยอาศัยน้ำ ฝนจากธรรมชาติเพียงอย่างเดียว จะให้ผลผลิตตามปริมาณน้ำ ฝนที่ได้รับ ยิ่งถ้าพื้นที่ที่ปลูกปาล์มน้ำมันมีช่วงฝนแล้ง หรือขาดน้ำ หลายเดือน ปาล์มนั้น ๆ ก็จะให้ช่อ
            ดอกตัวผู้ในปริมาณมาก หรือแทบไม่ให้ช่อดอกตัวเมียเลย ต้นปาล์มจะมีลักษณะสูงเร็ว เพราะไม่ต้องสูญเสียธาตุอาหารในการออกลูกออกผลปาล์มน้ำมันที่ขาดน้ำ 
            เป็นระยะเวลาหลายเดือน จะให้แต่ช่อดอกตัวผู้ หรือแทบจะไม่ให้ช่อดอกตัวเมียเลย แม้ว่าเราจะให้น้ำ ให้ปุ๋ยอย่างเต็มที่กับต้นปาล์มในเวลาต่อมา ก็ไม่สามารถแก้ไขให้ต้นปาล์ม
            ออกช่อดอกตัวเมียมากขึ้น ได้ เพราะปริมาณการออกช่อดอกตัวเมียได้ถูกกำหนดไว้แล้วเมื่อ 3 เดือนที่แล้วตามปริมาณน้ำ ที่ต้นปาล์มน้ำมันต้นดังกล่าวได้รับ แต่การให้น้ำ 
            ให้ปุ๋ยอย่างเต็มที่กับต้นปาล์มในเวลาต่อมา จะไปมีผลให้ต้นปาล์มออกช่อดอกตัวเมียมากขึ้น ในอีก 3 เดือนข้างหน้าอย่างไรก็ตามหากช่อดอกตัวเมียที่ออกมา 
            กระทบกับช่วงฤดูแล้ง หรือภาวะต้นปาล์มขาดน้ำ ช่อดอกตัวเมียดังกล่าวก็อาจจะฝ่อไม่ให้ผล เพื่อลดการสูญเสียน้ำ 
        </p>
    </div>
    <br>
    <div class="text-box">
        <img class="img-right" src="img/palm4.jpg" alt="palm4">
        <p>อายุปลูกลงดิน 1 ½ - 3 ½ ปี: ต้นปาล์มจะเริ่มออกดอก ให้ผลผลิต มีผลปาล์มออกดกรอบต้น ฅ
            เนื่องจากต้นปาล์มได้น้ำ จากแปลงเพาะต้นกล้า ในช่วงอายุปลูกประมาณ 2 ½ ขึ้นไป 
            การกำหนดปริมาณช่อดอกตัวผู้-ตัวเมีย จะขึ้น อยู่กับปริมาณน้ำ ที่ต้นปาล์มได้รับบนแปลงปลูกนั้น ๆ(น้ำ จากฝน และการรดน้ำ )
        </p>
        <p>อายุปลูกลงดินประมาณ 3 ½ ปี เป็นช่วงปาล์มขาดคอ ต้นปาล์มจะให้ช่อดอกตัวผู้ในปริมาณมากเป็นระยะเวลาประมาณ 3-6 เดือน 
            ขึ้นอยู่กับสภาพภูมิอากาศและการได้รับน้ำ ในแปลงปลูกนั้น ๆ
        </p>
        <p>อายุปลูกลงดิน 4 – 7 ปี ปาล์มน้ำมันพันธุ์ดีจะเริ่มให้ผลผลิตมากขึ้น ๆเรื่อย ถ้าเกษตรกรมีการให้ทั้ง
            ปุ๋ยเคมีและปุ๋ยคอกอย่างถูกต้อง รวมทั้ง ถ้ามีการให้น้ำ ได้ตลอดทั้ง ปี 
            ปริมาณน้ำหนักทะลายปาล์มเป็นตันต่อไร่ต่อปีที่รับประกันเอาไว้โดยผู้ผลิตแต่ละแหล่ง สามารถที่ จะรับประกันได้ที่อายุต้นปาล์ม 8 ปี อายุปลูก8 ปีขึ้นไป
             ปาล์มน้ำมันจะให้ผลผลิตสม่ำเสมอ ถ้าเกษตรกรมีการให้ทั้ง ปุ๋ยเคมี และปุ๋ยคอกอย่างถูกต้อง และถ้ามีการให้น้ำ ได้ตลอดทั้ง ปี ปริมาณน้ำ หนักทะลายปาล์มเป็นตันต่อไร่ต่อปี 
             ต้องได้ตามปริมาณที่แต่ละแหล่งผลิตรับประกันด้วย อย่างไรก็ตามเนื่องจากวิธีการเก็บเกี่ยวผลปาล์มที่ต้นสูงมาก 
             ไม่สามารถใช้เสียมแทงปาล์มได้ต้องใช้เคียวตัดทางใบล่างออกก่อนแล้วจึงจะสามารถใช้เคียวตัดทะลายปาล์มลงมาได้ด้วยวิธีดังกล่าว
              จะทำให้ต้นปาล์มมีทางใบน้อยลง เสมือนมีขนาดโรงครัวปรุงอาหารเล็กลง ทำให้ปาล์มน้ำมันให้ผลผลิตน้อยลงตามไปด้วย
        </p>
    <br>
    </div>
    <div class="text-box">
        <img class="img-left" src="img/palm-tree.jpg" alt="palm5">
        <p>จากการศึกษาทางวิชาการ เสนอไว้ว่า ปาล์มน้ำมันแต่ละต้นต้องการน้ำ วันละ200 ลิตรซึ่งเป็นเรื่องยากสำหรับเกษตรกรที่จะต้องจัดหาน้ำ ปริมาณดังกล่าว
            เพื่อใช้รดให้กับต้นปาล์มน้ำมันอูติพันธุ์พืชเสนอให้ใช้วิธีสังเกตยอดต้นปาล์มที่มียอดแหลม ไม่คลี่ออก คล้ายหอก หากปรากฏว่าปาล์มน้ำมันต้นใดมียอดแหลม ไม่คลี่ 
            คล้ายหอกสูงในระดับใกล้เคียงกัน มากกว่า 2 ยอดหอกแสดงว่าปาล์มน้ำมันต้นดังกล่าวขาดน้ำ แล้ว ต้องให้น้ำ แก่ต้นปาล์มนั้น ๆมากขึ้นลักษณะการให้น้ำ 
            ด้วยท่อพีอีพันรอบลำต้นปาล์มและใส่หัวฉีดขนาดเล็กจำนวน 3 หัว พ่นน้ำ หันออกจากลำต้นทำให้ไม่เกะกะและเสียหายจากการเก็บเกี่ยวผลปาล์มน้ำมันลักษณะของยอดปาล์มที่แหลม 
            ไม่คลี่ใบออก คล้ายหอกหากมียอดหอกดังกล่าว ที่มีความสูงระดับใกล้เคียงกันมากกว่า 2 ยอด แสดงว่าปาล์มอยู่ในภาวะขาดน้ำ หรือได้รับน้ำ ไม่เพียงพอ ต้องเพิ่มการให้น้ำ</p>
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