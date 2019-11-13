<div class="col-xs-7">
<!-- homepageguide detailpage join start -->
<div class='join_member' style="font-family: '굴림'; ">
	<div class='homepageguide_join_guide_style' style="font-size: 12px">
		<div style="border:1px solid #d0d0d0;margin-bottom: 6px;">
		</div>
	</div>
	<div>
		<form name="insert_form" method="post" >
			<fieldset>
			<div class='homepageguide_input_style'>
				<table>
						<fieldset>
					<tr>
						<td><span>아이디</span></td>
						<td><input type="text" name="user_id" id="user_id" value="<?php echo set_value("user_id"); ?>"/></td>
						<!--<td><input type="submit" value="중복 체크" onclick="submitForm1();"></td>-->
						<td><p class="help-block"><?php echo form_error("user_id");?></p></td>
					</tr>
					<tr>
						<td><span style=" color: red; font-size: 11px; ">*아이디는 5~12자 이내로</br>입력해주세요.</span></td>
					</tr>
					</fieldset>
					<tr>
						<td><span>비밀번호</span></td>
						<td><input type="password" name="user_pw" id="user_pw" value="<?php echo set_value("user_pw"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_pw");?></p></td>
					</tr>
					
					<tr>
						<td><span style=" color: red; font-size: 11px; ">*비밀번호는 6~17자 이내로 입력해주세요.</span></td>
					</tr>
					
					<tr>
						<td><span>비밀번호 확인</span></td>
						<td><input type="password" name="user_pw_check" id="user_pw_check" value="<?php echo set_value("user_pw_check"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_pw_check");?></p></td>
					</tr>
					<tr>
						<td><span>이름</span></td>
						<td><input type="text" name="user_name" id="user_name" value="<?php echo set_value("user_name"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_name");?></p></td>
					</tr>
					<tr>
						<td><span>학년</span></td>
						<td>
							<select name="user_year">
								<option>1학년
								<option>2학년
								<option>3학년
								<option>4학년
							</select>
						</td>
						<td><p class="help-block"><?php echo form_error("user_year");?></p></td>
					</tr>
					<tr>
						<td><span>학번</span></td>
						<td><input type="text" name="user_number" id="user_number" maxlength="10" value="<?php echo set_value("user_number"); ?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_number");?></p></td>
					</tr>
					<tr>
						<td><span>학과</span></td>
						<td><select name="user_department">
								<option>기계공학부
								<option>메카트로닉스공학부
								<option>전기전자통신공학부
								<option>컴퓨터공학부
								<option>디자인공학과
								<option>건축공학부
								<option>에너지신소재화학공학부
								<option>산업경영학부
							</select></td>
					</tr>
					<tr>
						<td><span>핸드폰 번호</span></td>
						<td>
							<select name="user_phonenumber1" id="user_phonenumber1">
								<option>010
								<option>011
								<option>016
								<option>018
								<option>019
							</select> - <input type="text" name="user_phonenumber2" id="user_phonenumber2" maxlength="4" size="4"> - <input type="text" name="user_phonenumber3" id="user_phonenumber3" maxlength="4" size="4"></td>
						<input type="hidden" id="user_phonenumber" name="user_phonenumber" value="">
						<td><p class="help-block"><?php echo form_error("user_phonenumber");?></p></td>
					</tr>
					<tr>
						<td><span>이메일</span></td>
						<td><input type="text" name="user_email1" id="user_email1" maxlength="9" size="9">@
					<input type="text" name="user_email2" id="user_email2" value="직접입력" onFocus = "this.value=''">
					<input type="hidden" name="nt_0004" value="직접입력">
					 <input type="hidden" name="nt_0001" value="naver.com"> <input type="hidden" name="nt_0002" value="daum.net"> <input type="hidden" name="nt_0003" value="google.com">
					 <select onchange="selectMatch(this);">
						<option value="nt_0004">선택</option>
						<option value="nt_0001">naver.com</option>
						<option value="nt_0002">daum.net</option>
						<option value="nt_0003">google.com</option>
					 </select>
					 <input type="hidden" id="user_email" name="user_email" value="">
					 </td>
						<td><p class="help-block"><?php echo form_error("user_email");?></p></td>
					</tr>
					<td><input type="button" value="회원가입" onclick="sign_form();"></td>
					<td><input type="button" value="뒤로가기" onclick="javascript:history.back();"></td>
				</table>
			</div>
			</fieldset>
		</form>
	</div>
</div>
<!-- homepageguide detailpage join end -->
</div>