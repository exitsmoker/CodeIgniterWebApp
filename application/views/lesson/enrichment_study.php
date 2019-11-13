<div class="col-xs-7">
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
	</div>
	
	<!-- 테이블 내부의 시작 -->
	<div class="row">
		<div>
			<table width="100%" align="center" style="height:30" cellspacing="0">

				<?
					$tr_length = 5;
					for ($i = 0; $i < $tr_length; $i++)
						echo '<tr><td class="input-td"><a href="#">2014-07-04 보강신청</a></td></tr>';
				?>
			</table>
		</div>
	</div>

	<!--버튼-->
	<div class="row">
		<div class="col-xs-2 col-xs-offset-10">
			<button id="write" type='button'>
				<a href="#">글쓰기</a>
			</button>
		</div>
	</div>

</div>