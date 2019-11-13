<div class="col-xs-7">
<div>
	
	<div class="row">
		<!--튜터 일지 table의 시작 -->
		<table cellpadding="0" cellspacing="0" width="100%" id="Test3">
			<!-- 튜터 일지 제목 line -->
			<tr>
				<td style="text-align: center; font-size:25px">
					2013년 11월 튜터 일지
				</td>
			</tr>
			<!-- 수업과목 -->
			<tr>
				<td>
					수업 과목 : 물리
				</td>
			</tr>
			<!-- 튜터 성명 -->
			<tr>
				<td>
					튜터 성명 : 이재호
				</td>
			</tr>
			<!-- 튜터 학번-->
			<tr>
				<td>
					튜터 학번 : 2010136100
				</td>
			</tr>
			<!-- 튜터 장소 -->
			<tr>
				<td>
					튜터 장소 : 담헌실학관 510호
				</td>
			</tr>
			<!-- 내부 Table Line-->
			<tr>
				<td>
					<!-- 내부 Table의 시작 -->
					<table cellpadding="0" cellspacing="0" width="100%" style="text-align:center">
						<!-- 제목  Line -->
						<tr class="border">
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								번호
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								날짜
							</td>
							<td colspan=2 class="border" style="text-align:center; background-color:#d3d3d3;">
								튜터링 시간
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								참여 인원
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								활동 내용
							</td>
							<td class="border" style="text-align:center; background-color:#d3d3d3;">
								비고
							</td>							
						</tr>
						<!-- 본문 내용 반복문 -->
						<?for($i=0; $i<15; $i++){?>
							<tr class="border">
								<td class="border">
									<?echo $i+1?>
								</td>
								<td class="border">
									7월 <?echo $i+1?>일
								</td>
								<td class="border">
									18:30 - 21:30
								</td>
								<td class="border">
									3시간 00분
								</td>
								<td class="border">
									2
								</td>
								<td class="border">
									
								</td>
								<td class="border">
							
								</td>
							</tr>
						<?}?>
						<tr class="border">
							<td colspan=3 class="border">
								총 업무시간
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
							<td class="border">
							</td>
						</tr>
					</table>
					<!-- 내부 Table 종료 -->
				</td>
			</tr>
			<!-- 내부 Table Line 종료 -->
			<!-- Table 아래쪽 Line-->
			<tr>
				<td style="text-align: center">
					위와 같이 2013년 11월 MSC교육센터 튜터일지를 제출합니다.
				</td>
			</tr>		
			<tr>
				<td style="text-align: center">
					2014년 7월 04일
				</td>
			</tr>		
			<tr>
				<td style="text-align: center">
					제출자 : 이재호 (인)
				</td>
			</tr>		
		</table>
		<!--외부  Table 종료 -->
	</div>
	
	<!-- 버튼 -->
	<div class="row">
		<div>
			엑셀 파일로 다운로드<input type='button' value="excel" id="write" onclick="tableToExcel('Test3')" > <!-- Excel 파일 test 버튼-->
		</div>
	</div>

</div>