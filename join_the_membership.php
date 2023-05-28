<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>국민은행 웹사이트 빠른 메뉴 만들어보기</title>
		<link rel="stylesheet" href="membershipstyle.css">
	</head>
	<body>
		<div class = "header">
			<h2 id = "small_title" onClick = "location.href='pyony.php'">편띵</h2>
			<div class = "pyony_gather">
				<h3 class = "header_element" id = "CU">CU</h3>
				<h3 class = "header_element" id = "GS25">GS25</h3>
				<h3 class = "header_element" id = "seven-ELEVEn">7-ELEVEn</h3>
				<h3 class = "header_element" id = "MINISTOP">MINISTOP</h3>
				<h3 class = "header_element" id = "emart24">emart24</h3>
			</div>
			<button class = "button_login" onClick = "location.href ='login_test.php'"s>로그인</button>
		</div>
		<div class = "membership">
			<form action = "signup_check.php" method = "post">
				<h2>회 원 가 입</h2>

				<strong>아이디</strong>
				<input type="text" name = "id"  class = "login_form", placeholder = "ID">


				<strong>비밀번호</strong>
				<input type="password" name ="password"  class ="login_form userpw" placeholder = "Password">


				<strong>비밀번호 재확인</strong>
				<input type="password" name = "re_password" class ="login_form userpw-confirm" placeholder = "Re_Password">


				<strong>전화번호</strong>
				<input type="tel" name = "phnum" class = "login_form" placeholder = "NUM" >



				<div class = "favorite">
					<div class = "favrite_pyony favorite_p" >
						<strong id = "favorite_p">선호 편의점</strong>
						<select  name = "favorite_p" style = "width : 200px; height : 40px;">
							<option value = "">--선호 편의점을 골라주세요--</option>
							<option value = "CU">CU</option>
							<option value = "GS25">GS25</option>
							<option value = "7-ELEVEn">7-ELEVEn</option>
							<option value = "MINISTOP">MINISTOP</option>
							<option value = "emart24">emart24</option>
						</select>
					</div>

					<div class = "favrite_pyony favorite_s" >
						<strong id = "favorite_s" name = "favorite_s" >선호 종류</strong>
						<select name = "favorite_s" style = "width : 200px; height : 40px;">
							<option value = "">--종류를 선택해주세요--</option>
							<option value = "과자">과자</option>
							<option value = "음료">음료</option>
							<option value = "식품">식품</option>
							<option value = "아이스크림">아이스크림</option>
						</select>
					</div>
				</div>
				<div class = "join_btn">
					<button type = "submit" name = "join button" style = "cursor : pointer; font-weight : 900; border : none; width : 50%; height : 40px; background-color:rgb(187, 202, 190);" value = "가입하기" id = " join_btn">회원가입
					</button>
				</div>
			</form>
		</div>

	</body>
</html>
