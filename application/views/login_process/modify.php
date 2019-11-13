<div class="col-xs-7">
<!-- homepageguide detailpage join start -->
<div style="font-family: '굴림'; ">
	<div style="font-size: 12px">
		<div style="border:1px solid #d0d0d0;margin-bottom: 6px;">
		</div>
	</div>
	<div>
		<form name="update_form" method="post" action="/index.php/login_process/update">
			<fieldset>
			<div>
				<table>
						<fieldset>
					<tr>
						<td><span>이름</span></td>
						<td><input type="text" name="user_name" id="user_name" value="<?php echo $login_data['user_name']?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_name");?></p></td>
					</tr>
					<tr>
						<td><span>비밀번호</span></td>
						<td><input type="password" name="user_pw" id="user_pw" value="<?echo $login_data['user_pw']?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_pw");?></p></td>
					</tr>
					<tr>
						<td><span>학년</span></td>
						<td>
							<select name="user_year" value="<?echo $login_data['user_year']?>">
								<option <?if($login_data['user_year']=="1학년"){echo 'selected = "selected"';}?>>1학년
								<option <?if($login_data['user_year']=="2학년"){echo 'selected = "selected"';}?>>2학년
								<option <?if($login_data['user_year']=="3학년"){echo 'selected = "selected"';}?>>3학년
								<option <?if($login_data['user_year']=="4학년"){echo 'selected = "selected"';}?>>4학년
							</select>
						</td>
						<td><p class="help-block"><?php echo form_error("user_year");?></p></td>
					</tr>
					<tr>
						<td><span>학번</span></td>
						<td><input type="text" name="user_number" id="user_number" value="<?echo $login_data['user_number']?>"/></td>
						<td><p class="help-block"><?php echo form_error("user_number");?></p></td>
					</tr>
					<tr>
						<td><span>학과</span></td>
						<td><select name="user_department" id="user_department">
								<option <?if($login_data['user_department']=="기계공학부"){echo 'selected = "selected"';}?>>기계공학부
								<option <?if($login_data['user_department']=="메카트로닉스공학부"){echo 'selected = "selected"';}?>>메카트로닉스공학부
								<option <?if($login_data['user_department']=="전기전자통신공학부"){echo 'selected = "selected"';}?>>전기전자통신공학부
								<option <?if($login_data['user_department']=="컴퓨터공학부"){echo 'selected = "selected"';}?>>컴퓨터공학부
								<option <?if($login_data['user_department']=="디자인공학과"){echo 'selected = "selected"';}?>>디자인공학과
								<option <?if($login_data['user_department']=="건축공학부"){echo 'selected = "selected"';}?>>건축공학부
								<option <?if($login_data['user_department']=="에너지신소재화학공학부"){echo 'selected = "selected"';}?>>에너지신소재화학공학부
								<option <?if($login_data['user_department']=="산업경영학부"){echo 'selected = "selected"';}?>>산업경영학부
							</select></td>
						<td><p class="help-block"><?php echo form_error("user_number");?></p></td>
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
							</select> - <input type="text" name="user_phonenumber2" id="user_phonenumber2" size="4" value="<?echo substr(($login_data['user_phonenumber']),6,4)?>"> 
							- <input type="text" name="user_phonenumber3" id="user_phonenumber3" size="4" value="<?echo substr(($login_data['user_phonenumber']),13,16)?>"></td>
						<td><p class="help-block"><?php echo form_error("user_number");?></p></td>
						<input type="hidden" id="user_phonenumber" name="user_phonenumber" value="">
					</tr>
					<tr>
						<?list($user_email1, $user_email2)=preg_split('/[@]/', ($login_data['user_email']));?>
						<td><span>이메일</span></td>
						<td><input type="text" name="user_email1" id="user_email1" size="9" value="<?echo $user_email1?>">@
					<input type="text" name="user_email2" id="user_email2" value="<?echo $user_email2?>" onFocus = "this.value=''">
					<input type="hidden" name="nt_0004" value="직접입력">
					 <input type="hidden" name="nt_0001" value="naver.com"> <input type="hidden" name="nt_0002" value="daum.net"> <input type="hidden" name="nt_0003" value="google.com">
					 <select onchange="selectMatch(this);">
						<option value="nt_0004">선택</option>
						<option value="nt_0001">naver.com</option>
						<option value="nt_0002">daum.net</option>
						<option value="nt_0003">google.com</option>
					 </select>
					 <input type="hidden" id="user_id" name="user_id" value="<?echo $login_data['user_id']?>">
					 </td>
						<td><p class="help-block"><?php echo form_error("user_email");?></p></td>
					</tr>
					<input type="hidden" id="user_email" name="user_email" value="">
					<td><input type="button" value="수정완료" onclick="modify();"></td>
					<td><input type="button" value="뒤로가기" onclick="javascript:history.back();"></td>
				</table>
			</div>
			</fieldset>
		</form>
	</div>
</div>
<!-- homepageguide detailpage join end -->
</div>