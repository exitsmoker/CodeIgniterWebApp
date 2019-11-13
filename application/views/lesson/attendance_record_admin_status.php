<div class="col-xs-7">
<div>
	
	<div class="row">
		<!-- Table Start -->
		<table cellpadding="0" cellspacing="0" width="100%" id="Test2">
			<!-- 출석부 제목 -->
			<tr>
				<td style="text-align: center; font-size:25px;">
					2013 출석부
				</td>			
			</tr>
			<!-- 과목 및 담당 튜터 -->
			<tr>
				<td>
					과목 : 기초수학 
					&nbsp;&nbsp;&nbsp;&nbsp;
					담당튜터: 박경림			
				</td>
			</tr>
			<!-- 주차 표시, 표기방법 -->
			<tr>
				<td>
					3월 1주차 
					<div style="float:right">표기방법:출석 / 결석/ 지각</div>			
				</td>
			</tr>
			<!--table 내부  주차 별 출석부 table의 반복문 시작 -->
			<?for($k=0; $k<2; $k++){?>
				<tr>
					<td>
						<table cellpadding="0" cellspacing="0" width="100%" style="font-size:11px;">
							<!-- Table subject line -->
							<tr class="attendance_border" style="background-color: #d3d3d3;">
								<td rowspan=3 class="attendance_border">
								</td>
								<td rowspan=3 class="attendance_border">
									학번
								</td>
								<td rowspan=3 class="attendance_border">
									이름
								</td>
								<td rowspan=3 class="attendance_border">
									학과
								</td>
								<td rowspan=3 class="attendance_border">
									연락처
								</td>
								<td rowspan=3 class="attendance_border">
									분반
								</td>
								<!-- 날짜별 출석현황 td 반복문 -->						
								<?for($i=0; $i<5; $i++){?>
										<td colspan=3 class="attendance_border">
											<? echo $i+1?>일				<!-- 학번 옆 숫자 -->
										</td>
								<?}?>
							</tr>
							<tr class="attendance_border" style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>			<!-- 시간 출력 반복문 -->
									<td class="attendance_border" width="5%">
										18:00
									</td>
									<td class="attendance_border">
										~
									</td>
									<td class="attendance_border" width="5%">
										21:30
									</td>
								<?}?>
							</tr>
							<tr class="attendance_border" style="background-color: #d3d3d3;">
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>
									<td class="attendance_border">
										출석
									</td>
									<td colspan=2 class="attendance_border">
										비고
									</td>
								<?}?>
							</tr>
							<!-- Table subject line end-->
							<!-- Table 본문 start-->
							<!-- Table 본문  tr 반복문 -->
							<?for($j=0; $j<10; $j++){?> 
								<tr class="attendance_border">
									<td class="attendance_border">
										<? echo $j+1?>
									</td>
									<td class="attendance_border">
										2010136100
									</td>
									<td class="attendance_border">
										이재호
									</td>
									<td class="attendance_border">
										컴공
									</td>
									<td class="attendance_border">
										010 7708 6449
									</td>
									<td class="attendance_border">
										A분반
									</td>
									<!-- 날짜별 출석현황 td 반복문 -->
									<?for($i=0; $i<5; $i++){?>
										<td class="attendance_border">
											O
										</td>
										<td colspan=2 class="attendance_border">
	
										</td>
									<?}?>
								</tr>
							<?}?>
							<!-- 마지막 tr Line -->
							<tr class="attendance_border">
								<td colspan=6 class="attendance_border">
									참 여 인 원
								</td>
								<!-- 날짜별 출석현황 td 반복문 -->
								<?for($i=0; $i<5; $i++){?>
									<td colspan=3 class="attendance_border">
										10
									</td>
								<?}?>
							</tr>
						</table>
					</td>				
				</tr>
				<!-- 내부 테이블 포함한 <tr>태그 종료 -->
				<!-- 테이블간 간격 유지용 tr -->
				<tr height="20px">
					<td>
					</td>
				</tr>
			<?}?>		
		</table>
		<!-- Table end -->	
	</div>
	
	<!-- 버튼 -->
	<div class="row">
		<div class="col-xs-5">
			엑셀 파일로 다운로드<input type='button' value="excel" id="write" onclick="tableToExcel('Test2')" > <!-- Excel 파일 test 버튼-->
		</div>
	</div>
	
</div>