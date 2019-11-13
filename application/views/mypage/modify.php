<div class="col-xs-7">
<!-- homepageguide detailpage join start -->
<div style="font-family: '굴림'; ">
	<div style="font-size: 12px">
		<div style="border:1px solid #d0d0d0;margin-bottom: 6px;">
		</div>
	</div>
	<div>
		<form name="update_form" method="post" action="/index.php/login_process/update">
			<div>
				<table>
					<tr>
						<td><span>이름</span></td>
						<td><input type="text" name="user_name" id="user_name" value="<?php echo $login_data['user_name']?>"/></td>
					</tr>
					<tr>
						<td><span>비밀번호</span></td>
						<td><input type="password" name="user_pw" id="user_pw" value="<?echo $login_data['user_pw']?>"/></td>
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
					</tr>
					<tr>
						<td><span>학번</span></td>
						<td><input type="text" name="user_number" id="user_number" value="<?echo $login_data['user_number']?>"/></td>
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
					</tr>
					<input type="hidden" id="user_email" name="user_email" value="">
					<td><input type="button" value="수정완료" onclick="modify();"></td>
					<td><input type="button" value="뒤로가기" onclick="javascript:history.back();"></td>
				</table>
			</div>
		</form>
	</div>
</div>

<div style="display: none">
<?if($login_data['user_application_subject']=="tuti"){?>
<form name="form" method="post" action="/index.php/tutor_tuti_application/tuti_update">
<div class="col-xs-12">
	<div align="center" class = "row" >
		<div class="col-xs-12" style="font-size:25px">2014학년도 1학기 튜티지원서</div>
			<div class="col-xs-12">지원과목기제
				<select name="user_subject" id="user_subject">
					<?foreach($get_list as $lt){?>
					<option value="<?echo $lt->subject_id;?>"><? echo $lt->subject;?>
					<?}?>
				</select>
			</div>
	</div>
	<div align="center" class = "row" id="tblMain">
		<table width="50%" cellpadding="0" cellspacing="0" style="text-align:center;">
			<tr class="border">
				<td width="20%" class="border">학번</td>
				<td width="25%" class="border"><?echo $login_data['user_number']?></td>
				<td width="8%" class="border">학과</td>
				<td width="25%" class="border"><?echo $login_data['user_department']?></td>
				<td width="9%" class="border">이름</td>
				<td width="25%" class="border"><?echo $login_data['user_name']?></td>
			</tr>
			<tr class="border">
				<td class="border">학년</td>
				<td class="border"><?echo $login_data['user_year']?></td>
				<td class="border">연락처</td>
				<td class="border"><?echo $login_data['user_phonenumber']?></td>
				<td class="border">이메일</td>
				<td><?echo $login_data['user_email']?></td>
			</tr> 
			<tr class="border">
				<td class="border">지원과목</br>수강분반</td>
				<td colspan=2 class="border">
					<select name="user_divide" id="user_divide">
						<?foreach($get_sub_list as $lt){?>
						<option class="<?echo $lt->subject_id?>" value="<?echo $lt->subject_level?>"><?echo $lt->subject_level?>
						<?}?>					
					</select>
				</td>
				<td class="border">희망 난이도</td>
				<td colspan=2 class="border">
					<select name="user_level">
						<option>선택하세요
						<option>상
						<option>중
						<option>하
					</select>
				</td>
			</tr>
			<tr class="border">
				<td class="border">고등학교</br>구분</td>
				<td colspan=2 class="border">
					<select name="user_hs_division" id="user_hs_division">
						<option>선택하세요
						<option>인문계
						<option>전문계
						<option>기타
					</select>
				</td>
				<td class="border">고등학교 계열</td>
				<td colspan=2 class="border">
					<select name="user_hs_application" id="user_hs_application">
						<option>선택하세요
						<option>이과
						<option>문과
						<option>기타
					</select>
				</td>
			</tr>
			<tr class="border">
				<td class="border">튜티 가능</br>요일 및 시간</td>
				<td colspan=5 class="border">
					<select name="user_time" id="user_time">
						<option>선택하세요
						<option>월수(18:30~20:00)
						<option>월수(20:00-21:30)
						<option>화목(18:30-20:00)
						<option>화목(20:00-21:30)
					</select>
				</td>
			</tr>
			<tr class="border">
				<td height="250px" class="border">지원동기</br>및 목표</td>
				<td colspan=5 class="border"><input style="height:250px; width:100%;" type="text" name="user_content_application" id="user_content_application"></td>
			</tr>
		</table>
	</div>

	<div class="row" align="center">
			<input type="submit" value="작성완료">
			<input type="button" value="뒤로가기" onclick="javascript:history.back();">
	</div>
	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
	<input type="hidden" name="user_department" value="<?=$login_data['user_department']?>" />
	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
	<input type="hidden" name="user_year" value="<?=$login_data['user_year']?>" />
	<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
	<input type="hidden" name="user_phonenumber" value="<?=$login_data['user_phonenumber']?>" />
	<input type="hidden" name="user_email" value="<?=$login_data['user_email']?>" />
	<input type="hidden" name="user_application_subject" value="tuti" />
</div>
</form>	
<?}else if($login_data['user_application_subject']=="tutor"){?>
<form name="grade_form" method="post" action="/index.php/tutor_tuti_application/tutor_update">
<div class="col-xs-12">
	<div align="center" class = "row" >
		<div class="col-xs-12" style="font-size:25px;">2014학년도 1학기 튜터지원서</div>
			<div class="col-xs-12">지원과목기제
				<select name="user_subject" id="user_subject">
					<?foreach($get_list as $lt){?>
					<option><? echo $lt->subject;?>
					<?}?>
				</select>
			</div>
	</div>
	<div class = "row" align="center" style="margin-bottom:20px"> 
		<table width="50%" cellpadding="0" cellspacing="0" style="text-align:center">
			<tr class="border">
				<td width="8%" class="border">학번</td>
				<td width="25%" class="border"><?echo $login_data['user_number']?></td>
				<td width="8%" class="border">학과</td>
				<td width="25%" class="border"><?echo $login_data['user_department']?></td>
				<td width="9%" class="border">이름</td>
				<td width="25%" class="border"><?echo $login_data['user_name']?></td>
			</tr>
			<tr class="border">
				<td class="border">학년</td>
				<td class="border"><?echo $login_data['user_year']?></td>
				<td class="border">연락처</td>
				<td class="border"><?echo $login_data['user_phonenumber']?></td>
				<td class="border">이메일</td>
				<td class="border"><?echo $login_data['user_email']?></td>
			</tr>
			<tr>
				<tr class="border">
					<td height="100px" colspan=2 rowspan=6 class="border">지원분야 성적</td>
						<?for($i=1;$i<=5;$i++){?>
							<tr>
							<td colspan=2 class="border">
								<select name="user_subject<?echo $i;?>" id="user_subject<?echo $i;?>">
									<?foreach($get_list as $lt){?>
									<option><? echo $lt->subject;?>
									<?}?>
								</select>
							</td>
							<td colspan=2 class="border">
								<select name="user_grade_choose<?echo $i;?>" id="user_grade_choose<?echo $i;?>">
									<option>선택하세요
									<option>A+
									<option>Ao
									<option>B+
									<option>Bo
									<option>C+
									<option>Co
									<option>D+
									<option>Do
									<option>F
								</select>
							</td>
							</tr>
						<input type="hidden" id="user_grade<?echo $i;?>" name="user_grade<?echo $i;?>" value=" "/>
						<?}?> 
				</tr>
			</tr>
			<tr class="border">
				<td  height="50px" width="20%" class="border">튜터 가능시간</td>
				<td colspan=5 class="border">
					<select name="user_time" id="user_time">
						<option>선택하세요
						<option>월수(18:30~20:00)
						<option>월수(20:00-21:30)
						<option>화목(18:30-20:00)
						<option>화목(20:00-21:30)
					</select>
				</td>
			</tr>
		</table>
	</div>

	<div class = "row" align="center">
		<table width="50%" cellpadding="0" cellspacing="0" style="text-align:center">	
			<tr class="border">
				<td class="border">경 력 사 항</td>
			</tr>
			<tr class="border">
				<td height="100px" class="border"><input style="height:106%; width:100%" type="text" name="user_career" id="user_career"/></td>
			</tr>
			<tr class="border">
				<td class="border">지 원 동 기</td>
			</tr>
			<tr class="border">
				<td height="200px" class="border"><input style="height:103%; width:100%" type="text" name="user_content_application" id="user_content_application"/></td>
			</tr>
		</table>
		<input type="button" value="지원하기" onclick="rating();">
		<input type="button" value="뒤로가기" onclick="javascript:history.back();">
	</div>
		<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
		<input type="hidden" name="user_department" value="<?=$login_data['user_department']?>" />
		<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
		<input type="hidden" name="user_year" value="<?=$login_data['user_year']?>" />
		<input type="hidden" name="user_number" value="<?=$login_data['user_number']?>" />
		<input type="hidden" name="user_phonenumber" value="<?=$login_data['user_phonenumber']?>" />
		<input type="hidden" name="user_email" value="<?=$login_data['user_email']?>" />
		<input type="hidden" name="user_application_subject" value="tutor" />
	</div>
</form>	
<?}else?>
</div>
<!-- homepageguide detailpage join end -->
</div>