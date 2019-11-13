<div class="col-xs-7">
<!-- homepoldguide Search start -->
<div>
	<!-- IDSearch area -->
	<p style="font-size:12.7px;font-weight: bold;color: #666666;font-family: '굴림';"> 아이디/비밀번호 찾기</p>
	<div class='homepoldguide_idsearch_area'>
		<form action='/index.php/login_process/id_search' method='post'>
			<div class='homepoldguide_input_style_public'>
				<table>
					<tr>
						<td width="120px"><span>이름</span></td>
						<td><input type='text' name='form_name' style="width: 150px;"/></td>
					</tr>
					<tr>
						<td><span>학번</span></td>
						<td><input type='text' name='form_number' style="width: 150px;"/></td>
					</tr>
					<tr>
						<td><span>이메일</span></td>
						<td><input type='text' name='form_email1' style="width: 90px;"/>@<input type='text' name='form_email2' style="width: 90px;"/></td>
						<td rowspan='2'><input type='submit' value="아이디 찾기" style="padding-left: 5px;"></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	<hr></hr>
	
	<!-- PWSearch area -->
	<div class='homepoldguide_pwsearch_area'>
		<form action='/index.php/login_process/pw_search' method='post'>
			<div class='homepoldguide_input_style_public'>
				<table>
					<tr>
						<td width="120px"><span>아이디</span></td>
						<td><input type='text' name='form_id' style="width: 150px;"/></td>
					</tr>
					<tr>
						<td><span>이름</span></td>
						<td><input type='text' name='form_name' style="width: 150px;"/></td>
					</tr>
					<tr>
						<td><span>이메일</span></td>
						<td><input type='text' name='form_email1' style="width: 90px;"/>@<input type='text' name='form_email2' style="width: 90px;"/></td>
						<td rowspan='2'><input type='submit' value="비밀번호 찾기" style="padding-left: 5px;"></td>
					</tr>
				</table>
			</div>
		</form>
	</div>
</div>
<!-- homepoldguide Search end -->
<input type="button" value="뒤로가기" onclick="javascript:history.back();">