<div class="col-xs-7">
	<?$i=1;?>
<div>
	<!-- test table create -->
	<form method="post" action="/index.php/">
	<table cellpadding="0" cellspacing="0" id="test1" class="border" width="100%" style="font-size:12px">
		<!-- Subject Line -->
		<tr>
			<td class="tuti_table">
				연번
			</td>
			<td class="tuti_table">
				지원과목
			</td>
			<td class="tuti_table">
				학번
			</td>
			<td class="tuti_table">
				학과
			</td>
			<td class="tuti_table">
				이름
			</td>
			<td class="tuti_table">
				학년
			</td>
			<td class="tuti_table">
				전화번호
			</td>
			<td class="tuti_table">
				이메일
			</td>
			<td class="tuti_table">
				튜티가능 요일
			</td>
			<td class="tuti_table">
				경력사항
			</td>
			<td class="tuti_table">
				지원동기 및 목표
			</td>
			<td class="tuti_table">
				튜티지정하기
			</td>
		</tr>
		<!-- 본문 내용 반복문 -->
		<?foreach($get_list as $lt){?>
				<tr class="border">
					<td class="border">
						<?echo $i?>
					</td>
					<td class="border">
						<?echo $lt->user_subject?>
					</td>
					<td class="border">
						<?echo $lt->user_number?>
					</td>
					<td class="border">
						<?echo $lt->user_department?>
					</td>
					<td class="border">
						<?echo $lt->user_name?>
					</td>
					<td class="border">
						<?echo $lt->user_year?>
					</td>
					<td class="border">
						<?echo $lt->user_phonenumber?>
					</td>
					<td class="border">
						<?echo $lt->user_email?>
					</td>
					<td class="border">
						<?echo $lt->user_time?>
					</td>
					<td class="border">
						<?echo $lt->user_career?>
					</td>
					<td class="border">
						<?echo $lt->user_content_application?>
					</td>
					<td class="border">
						<input type="button" value="등급올리기">
					</td>
				</tr>
		<?
		$i++;
		}?>
	</table>
	</form>
	<input type='button' value="excel" id="write" onclick="tableToExcel('test1')" > <!-- Excel 파일 test 버튼-->
</div>