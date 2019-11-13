<div class="col-xs-7">
<!-- homepageguide login start -->
<div>
	<!-- login area -->
	<p style="font-size:12.7px;font-weight: bold;color: #666666;font-family: '굴림';"> 로그인</p>
	<div class='homepageguide_login_area'>
		<form action='/index.php/login_process/login_id_pw_check' method='post'>
			<div class='homepageguide_input_style_public'>
				<table>
					<tr>
						<td width="90px"><span>아이디</span></td>
						<td><input type='text' name='form_id' style="width: 150px;"/></td>
						
					</tr>
					<tr>
						<td><span>비밀번호</span></td>
						<td><input type='password' name='form_pw' style="width: 150px;"/></td>
					</tr>
					<tr>
						<td rowspan='2'><input type='submit' value="로그인" style="padding-left: 5px;"></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	
	<div class='homepageguide_search_area'>
		<table>
			<!-- search id pwd -->
			<tr>
				<td>
					<a href="/index.php/login_process/sign_up" style=" padding-right: 50px; ">회원가입</a>
				</td>
				<td>
					<a href="/index.php/login_process/search_id_pwd">아이디/비밀번호 찾기</a>
				</td>
			</tr>
		</table>
	</div>
</div>
<!-- homepageguide login end -->
</div>