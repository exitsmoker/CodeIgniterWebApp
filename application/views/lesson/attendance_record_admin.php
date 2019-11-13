<div class="col-xs-7">
<div>
	<div class="row">
		<!-- 년도 드롭다운 -->
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
				<?
					echo date("Y년");															//현재 년도 반환
				?>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<?
					$year = array("2015", "2016", "2017", "2018");								//년도 저장
					for($i=0; $i<count($year); $i++)											//드롭다운 리스트 출력 반복문
						{
							echo '<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#">';
							echo $year[$i];														//과목 내용 출력
							echo '	</a>
								  </li>';
						}										
				?>
			</ul>
		</div>
		 
		<!-- 월 드롭다운 -->
		<div class="dropdown">
			<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
				<?
					echo date("m월");			//현재 달 반환
				?>
				<span class="caret"></span>
			</button>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
				<?	
					$month = array("1", "2", "3", "4", "5", "6", "7", "8");						//년도 저장
					for($i=0; $i<count($month); $i++)											//드롭다운 리스트 출력 반복문
						{
							echo '<li role="presentation">
									<a role="menuitem" tabindex="-1" href="#">';
							echo $month[$i];													//과목 내용 출력
							echo '	</a>
								  </li>';
						}										
				?>			
			</ul>
		</div>
		
		<!-- 년도와 월을 받아서 출력 -->
		<div class="col-xs-3 col-xs-offset-1">
			<span class="recieve-year">
				<?
					echo date("Y년");															//현재 년도 반환
				?>
			</span>
			<span class="recieve-month">
				<?
					echo date("m월");															//현재 년도 반환
				?>
			</span>
		</div>
		
	</div>
	
	<!-- 본문작성 테이블 -->
	<div class="row">
		<div>
			<table width="100%" align="center" style="height:30" cellspacing="0">

			<!-- Table 제일 위쪽 Tr -->
				<tr>
					<td class="input-td">
						<!-- 과목 버튼 -->
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
								과목명
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">	
								<?
									$subject = array("수학", "과학", "영어", "국사");						//과목 저장
									for($i=0; $i<count($subject); $i++)								//드롭다운 리스트 출력 반복문
										{
											echo '<li role="presentation">
													<a role="menuitem" tabindex="-1" href="#">';
											echo $subject[$i];										//과목 내용 출력
											echo '	</a>
												  </li>';
										}										
								?>
							</ul>
						</div>
						<!-- 분반 버튼 -->
						<div class="dropdown">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown">
								분반
								<span class="caret"></span>
							</button>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">	
								<?
									$subject = array("1분반", "2분반", "2분반", "2분반");					//과목 저장
									for($i=0; $i<count($subject); $i++)								//드롭다운 리스트 출력 반복문
										{
											echo '<li role="presentation">
													<a role="menuitem" tabindex="-1" href="#">';
											echo $subject[$i];										//과목 내용 출력
											echo '	</a>
												  </li>';
										}										
								?>
							</ul>
						</div>
						<!-- 확인 버튼 -->
						<div class="dropdown">
							<button id="confirm" type='button'>
								확인
							</button>
						</div>
					</td>
				</tr>
				
				<!-- 본문 td 반복문 -->
				<?
					$tr_length = 5;
					for ($i = 0; $i < $tr_length; $i++)
						echo '<tr><td class="input-td"><a href="/index.php/lesson/attendance_record_admin_status">test</a></td></tr>';
				?>
			</table>

		</div>
	</div>

</div>

