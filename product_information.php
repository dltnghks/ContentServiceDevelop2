<?php

session_start();
error_reporting( E_ALL );
ini_set( "display_errors", 1 );
include("./SQLconstants.php");
$conn = mysqli_connect($mySQL_host, $mySQL_id, $mySQL_password, $mySQL_database) or die ("Cant't access DB");

$isLogin = false;
$name = "";
$password = "";
if($_SESSION['id'] === NULL && $_SESSION['password'] === NULL){	
	$isLogin = false;
}
else{
	$isLogin = true;
	$name = $_SESSION['id'];
	$password = $_SESSION['password'];
}


if($isLogin){
	//시간 정보 저장
	date_default_timezone_set("Asia/Seoul");
	$DateAndTime = date('m-d-Y h:i:s a', time());
	$_SESSION['DateAndTime'] = $DateAndTime;

	$_SESSION['product_id'] = $_GET['id'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>편 띵</title>
    <link rel="stylesheet" href="p_informationstyle.css">
</head>
<body>
    <?php
$id = $_GET['id']; // 주소에서 id 값을 가져옴

$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo mysqli_error($conn);

$sql2 = "SELECT sale_product.convenience, sale_product.event_type, product.name, product.price, product.image, product.type FROM product, sale_product WHERE product.id = '$id' AND sale_product.id = '$id'";
$result2 = mysqli_query($conn, $sql2);
$row = mysqli_fetch_assoc($result2);
?>
<div class = "header">
    <h2 id = "small_title" onClick = "location.href='pyony.php'">편띵</h2>
    <div class = "pyony_gather">
     <h3 class = "header_element" onClick = "location.href='CU_search.php'" id = "CU"onmouseover="this.style.cursor='pointer'">CU</h3>
     <h3 class = "header_element" onClick = "location.href='GS_search.php'" id = "GS25" onmouseover="this.style.cursor='pointer'">GS25</h3>
     <h3 class = "header_element" onClick = "location.href='Seven_search.php'" id = "seven-ELEVEn"onmouseover="this.style.cursor='pointer'" >7-ELEVEn</h3>
     <h3 class = "header_element" onClick = "location.href='Ministop_search.php'" id = "MINISTOP" onmouseover="this.style.cursor='pointer'">MINISTOP</h3>
     <h3 class = "header_element" onClick = "location.href='Emart24_search.php'" id = "emart24"onmouseover="this.style.cursor='pointer'" >emart24</h3>
 </div>
 <?php

 if($isLogin === false){
    ?>
    <button class = "button_login" onClick = "location.href ='login_test.php'">로그인</button>
    <?php
}else{
  $isLogin = false;
  ?>	
  <form action = "logout.php" method="post">
    <button class = "button_login">로그아웃</button>
</form>
<?php
}

?>

</div>

<div class = "p_comment">
    <div class = "CU_product">
        <h2>할인 상품</h2>
        <div class = "CU_gather">
            <div class = "menu_cu">

              <?php


              $name = $row['convenience'];
              $pnname = "";

              if($name === 'CU'){
                 $pnname = 'cu_pn_name';
             }else if($name === 'GS25'){
                $pnname = 'gs_pn_name';

            }else if($name === '7-ELEVEn'){
                $pnname = 'seleven_pn_name';

            }else if($name === 'MINISTOP'){
                $pnname = 'ministop_pn_name';

            }else if($name === 'emart24'){
                $pnname = 'emart24_pn_name';
            }
            ?>

            <div class = "menu_cu">
                <small class = <?php echo $pnname; ?>> <?php echo $row['convenience'] ?>
                <span class = "Product_name"><?php echo $row['type'] ?> </span>
            </small>

                <div class = "menu_cu2">
                    <div class ="pn_img"><img src="<?php echo $row['image']; ?>" height='290' width='295'>
                        <?php   echo "<BR>이름 : ".$row['name']."<br>";
                        echo "<BR>가격 : ".$row['price']."<br>";
                        echo "<BR>행사정보 : ".$row['event_type']."<br><br>"; ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
<div class = "comment_write">
    <form action = "write_ok.php", method = "post">
        <input type = "text" name = "comment_content"  class ="write" placeholder = "댓글을 입력해주세요." SIZE = "100">
        <button id = "submit">작성</button><br>
    </form>
</div>

<?php 
$comment = "select comment.member_id, comment.comment_content, comment.date from comment where comment.product_id like ".$id.";";
$commentResult = mysqli_query($conn, $comment);
?>

<div class = "comment">
    <h2>댓글</h2>
    <div class = "User_comment_gather">
        <?php
        while($commentRow = mysqli_fetch_array($commentResult))
        {
            ?>
            <div class = "user_comment">
                <div class = "user">
                    <small class="comment_pn_name"><?php echo $row["convenience"]?>
                    <span class = "name_date">
                        <?php 
                        echo $commentRow["member_id"];
                        echo "/";
                        echo $commentRow["date"];?>
                    </span>
                </small>
            </div>
            <div class = "comment_detail"><?php echo $commentRow["comment_content"]?></div>
        </div>
    <?php }?>
</div>
</div>
</body>
</html>
