<div class="col-xs-7">
	<table>
		<thead>
			<tr>
				<th scope="col" style="width:80px;">번호</th>
				<th scope="col" style="width:200px;">제목</th>
				<th scope="col" style="width:80px;">작성자</th>
				<th scope="col" style="width:120px;">작성일</th>
				<th scope="col">조회수</th>
			</tr>
		</thead>
		<tbody>
			<!--
				게시물 리스트를 불러운 개수만큼 자동으로 반복해서 뿌려준다.
			-->
			<?
			$id = $get_list_count;
			foreach($get_list as $lt){
				?>
				<tr>
					<th scope="row">
						<? echo $id;?>						
					</th>
					<td>
						<a href="/index.php/notice/class_notice?req_id=<? echo $lt->board_id?>"><? echo $lt->subject;?></a>
					</td>
					<td>
						<? echo $lt->user_name;?>
					</td>
					<td>
						<? echo substr(($lt->reg_date),0,10);?>
					</td>
					<td>
						<? echo $lt->hits;?>
					</td>
				</tr>
				<?
				$id--;
				}
			?>
			<tr>
				<td>
					<a href="/index.php/notice/class_notice/write_board">글쓰기</a>
				</td>
			</tr>
		</tbody>
	</table>
</div>
</div>
