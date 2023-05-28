<!doctype html>
<head>
<meta charset="UTF-8">
<title>게시판</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="/BBS/css/style.css" />
</head>
<body>
<?php
include("./SQLconstants.php");
$conn = mysqli_connect($mySQL_host,$mySQL_id,$mySQL_password,$mySQL_database) or die ("Can't access DB");

$query = "select * from product, comment";
$result = mysqli_query( $conn, $query );
$row = mysqli_fetch_array( $result );
echo "<BR>ID : ".$row['id'];
echo "<BR>name : ".$row['name'];
echo "<BR>price : ".$row['price'];
echo "<BR><img src = '".$row['image']."' height='280' width='180'> <br>";
echo "<BR>type : ".$row['type'];


echo "<BR>comment : ".$row['comment_content'];
	
session_start();
$_SESSION['product_id'] = '1';
$_SESSION['id'] = 'name';
echo $_SESSION['product_id'];

date_default_timezone_set("Asia/Seoul");
$DateAndTime = date('m-d-Y h:i:s a', time());  
echo "The current date and time are $DateAndTime.";
$_SESSION['DateAndTime'] = $DateAndTime;

$sql = "SELECT * FROM product WHERE id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo mysqli_error($conn);

$sql2 = "SELECT sale_product.convenience, sale_product.event_type, product.name, product.price, product.image, product.type FROM product, sale_product WHERE product.id = sale_product.id";
$result2 = mysqli_query($conn, $sql2);
?>


<?php
if($isLogin === false){
?>
                <button class = "button_login" onClick = "location.href ='pyony_login.html'">로그아웃</button>
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



<HTML>
	<BODY>
		<!-- 화면구성 -->
		<br> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
		<b> - 댓글 등록 - </b>
		<br> 
		<form name = "formm" method = "post" action = "./write_ok.php">			
			<br> 댓 &nbsp; &nbsp; 글 &nbsp;:  <INPUT TYPE = "text" name = "comment_content" SIZE="60" >
		</form>  
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
		<INPUT TYPE="button" value="등록" onClick="javascript:document.formm.submit();"> &nbsp; 
	</BODY>
</HTML>
