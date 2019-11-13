<div class="col-xs-12">
	<!-- 테이블 내부의 시작 -->
	<div class="row">
		<div>
			<table width="100%" align="center" style="height:30" cellspacing="0">
				<!-- Table 제일 위쪽 Tr -->
				<tr>
					<td class="input-td">
						<input type="checkbox" id="total">
						전체 선택 
					</td>
				</tr>
				<?foreach($divide as $lt){?>
					<tr>
						<td class="input-td">
							<input type="checkbox" value="<?echo $lt -> user_name;?>" id="test[]"><?echo $lt -> user_name;?> 
						</td>
					</tr>
				<?}?>
			</table>
		</div>
	</div>

	<!--버튼-->
	<div class="row">
		<div class="col-xs-5">
			<form name="register" method="post" action="/index.php/lesson/register" >
				<input type="button" id="attend" value="출석" onclick="register_form(this.value);"/>
				<input type="button" id="absence" value="결근" onclick="register_form(this.value);"/>
				<input type="button" id="absence-illness" value="병결" onclick="register_form(this.value);"/>
				<input type="button" id="late" value="지각" onclick="register_form(this.value);"/>
			</form>  
		</div>
	</div>
</div>