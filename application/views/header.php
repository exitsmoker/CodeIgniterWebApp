<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<!-- Optional theme -->
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">
		<!-- Latest compiled and minified JavaScript -->
		<link rel="stylesheet" href="/static/css/view.css">
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="/static/js/scripts.js"></script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="/static/css/bootstrap.css">

		<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<?if($this->session->userdata('login_data')!=NULL){?>
					<div class="header_Topmenu_div">
						<?echo $login_data['user_id']?>님 환영합니다!
						<a href="/index.php/mypage/modify"><input type="button" value="MY PAGE"></a>							
						<a href="/index.php/login_process/logout"><input type="button" value="LOGOUT"/></a>						
					</div>
				<?}else{ ?>
					<div class="header_Topmenu_div">
						
						<form method="post" action="/index.php/login_process/login_id_pw_check">
							ID <input type="text" name="form_id" style=" width: 114px; ">
							PW <input type="password" name="form_pw" style=" width: 114px; ">
							<input type="submit" value="LOGIN"/>
						<a href="/index.php/login_process/search_id_pwd">ID/PW 찾기</a></span>							
						<a href="/index.php/login_process/sign_up">회원가입</a>
						</form>
						
					</div>
				<?} ?>
			</div>
			<div class="row">
				<div class="col-xs-3 col-xs-offset-1"><a href="http://tutor.thecakehouse.co.kr/index.php"><img src="/static/img/logo.png" class="header_logo"/></a></div>
				<div class="col-xs-7">
					<ul class="nav navbar-nav navbar-left">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">NOTICE<br/>공지사항</a>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/notice/whole_notice">전체공지사항</a>
								</li>
								<li>
									<a href="/index.php/notice/class_notice">수업공지사항</a>
								</li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="/index.php/tutor_tuti_application/attendance.php" class="dropdown-toggle" data-toggle="dropdown">CLASS<br/>수업</a>
							<?if($this->session->userdata('login_data')!=NULL){?>
							<?if($login_data['grade']=='3'){
							?>
							<ul class="dropdown-menu"> 
								<li>
									<a href="/index.php/lesson/my_attendance/<?echo date("Y/m");?>">내 출결보기</a>
								</li>
								<li>
									<a href="/index.php/lesson/my_question">내 질문보기</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='2'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/lesson/attendance_record/<?echo date("Y/m/d");?>">출석부</a>
								</li>
								<li>
									<a href="/index.php/lesson/daily_journal/<?echo date("Y/m");?>">근무일지</a>
								</li>
								<li>
									<a href="/index.php/lesson/enrichment_study">보강신청</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='1'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/lesson/attendance_record_admin">출석부 관리</a>
								</li>
								<li>
									<a href="/index.php/lesson/daily_journal_admin">근무일지 관리</a>
								</li>
								<li>
									<a href="/index.php/lesson/enrichment_study_admin">보강신청 관리</a>
								</li>
							</ul>
							<?}else{} ?>
							<?}else{} ?>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Q&A<br/>질의응답</a>
							<?if($this->session->userdata('login_data')!=NULL){?>
							<?if($login_data['grade']=='3'){
							?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/question_and_answer/questioning">질문하기</a>
								</li>
								<li>
									<a href="/index.php/question_and_answer/answering">답변하기</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='2'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/question_and_answer/questioning">질문하기</a>
								</li>
								<li>
									<a href="/index.php/question_and_answer/answering">답변하기</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='1'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/question_and_answer/questioning">질문하기</a>
								</li>
								<li>
									<a href="/index.php/question_and_answer/answering">답변하기</a>
								</li>
							</ul>
							<?}else{} ?>
							<?}else{} ?>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">SUGGESTION<br/>제안</a>
							<?if($this->session->userdata('login_data')!=NULL){
							?>
							<?if($login_data['grade']=='3'){
							?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/suggestion/suggest_to_tutor">튜터에게 제안</a>
								</li>
								<li>
									<a href="/index.php/suggestion/suggest_to_admin">관리자에게 제안</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='2'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/suggestion/suggest_to_admin">관리자에게 제안</a>
								</li>
							</ul>
							<?}else if($login_data['grade']=='1'){ ?>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/suggestion/view_suggestions">제안보기</a>
								</li>
							</ul>
							<?}else{} ?>
							<?}else{} ?>
						</li>
						<?if($this->session->userdata('login_data')!=NULL){?>
						<?if($login_data['grade']=='1'){?>
						<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">관리</a>
							<ul class="dropdown-menu">
								<li>
									<a href="/index.php/administration/tuti">튜티</a>
								</li>
								<li>
									<a href="/index.php/administration/tutor">튜터</a>
								</li>
							</ul>
						</li>
						<?}else{} ?>
						<?}else{} ?>
					</ul>
				</div>
				<div class="col-xs-1"></div>
			</div>
			