<form name="grade_form" method="post" action="/index.php/tutor_tuti_application/tutor_insert">
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