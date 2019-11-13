<img src="/static/img/main_page.jpg" style="width: 1100px; height: 300px; margin-bottom: 20px;margin-top: 20px;"/>
<!--
	<img src="/static/img/login.png" style=" margin-right: 45px;"/>
-->
<div style=" width: 350px; float: left; ">
	<div>공지사항</div>
	<?foreach($notice_list5 as $lt){?>
		<?echo $lt -> board_id;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://tutor.thecakehouse.co.kr/index.php/notice/whole_notice?req_id=<?echo $lt -> board_id;?>"><?echo $lt -> subject;?></a>
	</br>
	<?}?>
</div>
<div style=" width: 400px; float: left; ">
<input type="image" src="/static/img/tutee.png" <?if($this->session->userdata('login_data')==null){?> onclick="tutee();" <?}else{?> onclick="tutee_login('<?echo $login_data['user_application']?>','<?echo $login_data['user_application_subject']?>');"<?}?> style=" margin-top: -100px;margin-right: 30px; "/>
<input type="image" src="/static/img/tutor.png" <?if($this->session->userdata('login_data')==null){?> onclick="tutor();" <?}else{?> onclick="tutor_login('<?echo $login_data['user_application']?>','<?echo $login_data['user_application_subject']?>');"<?}?> style="margin-left: -20px; margin-top: -100px; margin-right: 30px;"/>
<img src="/static/img/will_be.png" style=" margin-top: 110px; margin-left: -398px; height: 90px; width: 363px;"/>
</div>

<!-- 로그인 Div -->
<?if($this->session->userdata('login_data')==NULL){?>
		<div style="display:inline; height:200px; width:320px; float:right; margin-right:45px;">
			<!-- Login Table -->
			<table width="80%" height="100%" cellpadding="0" cellspacing="0" align="center">
				<form action="/index.php/login_process/login_id_pw_check" method="post">
					<tr>
						<td colspan=2 style="font-size:20px; vertical-align: bottom;">회원 로그인</td>
					</tr>
					<tr>
						<td>
							<input type="text" name="form_id">
							<br>
							<input type="password" name="form_pw"/>		
						</td>
						<td>
							<input type="submit" value="로그인" style="height:75%">
						</td>
					</tr> 
					<tr>
						<td colspan=2 style="vertical-align:top;">
							<a href="/index.php/login_process/sign_up">회원가입</a>
							<a href="/index.php/login_process/search_id_pwd">아이디/비밀번호 찾기</a>
						</td>
					</tr>
				</form>
			</table>
		</div>
<?}else{?>
	<div style="display:inline; height:200px; width:320px; float:right; margin-right:45px;">
		<!-- after_login data-->	
		<table width="80%" height="100%" cellpadding="0" cellspacing="0" align="center">
			<tr>
				<td style="font-size:20px; vertical-align: bottom;">환영합니다!!</td>
			</tr>
			<tr>
				<td>
					<?echo $login_data['user_id']?>님 방문을 환영합니다.
				</td> 
			</tr>
			<tr>
				<td style="vertical-align:top;">
					<a href="/index.php/mypage/modify">마이페이지</a>
					<a href="/index.php/login_process/logout">로그아웃</a>
				</td>
			</tr>
		</table>
	</div>
<?}?>