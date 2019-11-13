<form name="form" method="post" action="/index.php/tutor_tuti_application/tuti_insert">
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

	<!--버튼-->
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