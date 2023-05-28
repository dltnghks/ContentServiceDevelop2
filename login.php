<?php 
session_start(); 
include("./SQLconstants.php"); 
$conn = mysqli_connect($mySQL_host,$mySQL_id,$mySQL_password,$mySQL_database) or die ("Can't access DB");


if (isset($_POST['id']) && isset($_POST['password'])) {
	
	// 입력한 id pw 저장
	$uname = $_POST['id'];
	$pass = $_POST['password'];

	$sql = "SELECT * FROM member WHERE id ='$uname' AND password='$pass'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);

	echo mysqli_error($conn);
	
	if ($row['id'] === $uname && $row['password'] === $pass) {
		$_SESSION['id'] = $row['id'];
		$_SESSION['password'] = $row['password'];
		echo "<script>alert('로그인');</script>"; 
                echo "<script>location.replace('pyony.php')</script>";
		exit();

	}else{
		echo "<script>alert('로그인 실패');</script>";
		echo "<script>location.replace('login_test.php')</script>";
		exit();
	}
	 
}
?>
<?php
$prevPage = $_SERVER['HTTP_REFERER'];
header('location:'.$prevPage);
?>
