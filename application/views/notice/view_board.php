<div class="col-xs-7">
	<div class = "row">
    <div class = "col-xs-2"><p class ="notice_detail_p">제목</p></div>
    <div class = "col-xs-10" ><p class ="notice_detail_p"><?=$list['subject'] ?></p></div>
</div>
<div class = "row" style="padding: 1% 0 ;">
    <div class = "col-xs-2"><p class ="notice_detail_p">등록일</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=substr(($list['reg_date']),0,10)?></p></div>

    <div class = "col-xs-2"><p class ="notice_detail_p">작성자</p></div>
    <div class = "col-xs-4"><p class ="notice_detail_p"><?=$list['user_name'] ?></p></div>
</div>
<div class = "row">
    <div class = "col-xs-2"><p class ="notice_detail_p">내용</p></div>
    <div class = "col-xs-10"><p class ="notice_detail_p" style="height:300px"><?=$list['contents'] ?></p></div>
</div>
<div>
	<?$id = $get_all_board_count;
			foreach($get_list as $lt){
				?>
				<tr>
					<td>
						<? echo $lt->user_name;?>
					</td>
					<td>
						<? echo substr(($lt->reg_date),0,10);?>
					</td>
					<td>
						<? echo $lt->reply_contents;?>
					</td>
				</tr>
				<?
				$id--;
				}
			?>
</div>
<!--if user_id == admin -->
<div class = "row">
    <div class = "col-xs-offset-2"></div><div class="col-xs-9" style="margin-top: 1%; ">
</div>
<a href="/index.php<?echo $view_name?>/update_board?req_id=<?echo $list['board_id']?>">수정하기</a>
<a href="/index.php<?echo $view_name?>/delete_board?req_id=<?echo $list['board_id']?>">삭제하기</a>
</div>
