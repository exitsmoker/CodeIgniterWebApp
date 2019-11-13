<div class="col-xs-7">
<div>
<span>핸드폰 번호</span>
	<select name="user_phonenumber1" id="user_phonenumber1">
		<option>010
		<option>011
		<option>016
		<option>018
		<option>019
	</select> - <input type="text" id="user_phonenumber2" name="user_phonenumber2" size="4"> - <input type="text" id="user_phonenumber3" name="user_phonenumber3" size="4">
	<p class="help-block"><?php echo form_error("user_number"); ?></p>
	<input type="hidden" id="user_phonenumber" value="">
	<input type="button" value="확인하기" onclick="sign_form();"/>
</div>

<div>
	<!-- test table create -->
	<table cellpadding="0" cellspacing="0" id="test1" class="border" style="background-color: #dfdfdf;">
		<!-- Subject Line -->
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				연번
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				지원과목
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				학번
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				학과
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				이름
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				학년
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				전화
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				이메일
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				분반
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				담당교수
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				고등학교 구분
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				고등학교 계열
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				난이도
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				튜티가능 요일
			</td>
		</tr>
		<tr>
			<td class="border" style="text-align:center; background-color:#dcdcdc;">
				지원동기 및 목표
			</td>
		</tr>
		<!-- 본문 내용 반복문 -->
		<?for($j=0; $j<12; $j++){?>
				<tr class="border">
					<td class="border">
						<?echo $j+1?>
					</td>
					<td class="border">
						기초수학
					</td>
					<td class="border">
						2010136100
					</td>
					<td class="border">
						컴공
					</td>
					<td class="border">
						이재호
					</td>
					<td class="border">
						1
					</td>
					<td class="border">
						010-7708-6449
					</td>
					<td class="border">
						ukpoeny@gmail.com
					</td>
					<td class="border">
						2
					</td>
					<td class="border">
						정구철
					</td>
					<td class="border">
						test
					</td>
					<td class="border">
						인문계
					</td>
					<td class="border">
						하
					</td>
					<td class="border">
						월 수
					</td>
					<td class="border">
						test
					</td>
				</tr>
		<?}?>
	</table>
	<input type='button' value="excel" id="write" onclick="tableToExcel('test1')" > <!-- Excel 파일 test 버튼-->
</div>
