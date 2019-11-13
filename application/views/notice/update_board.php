<div class="col-xs-7">
<form class="form-horizontal" method="post" action="/index.php<?echo $view_name?>/update_ok?req_id=<?=$list['board_id']?>" style = "font-size: 13px">
    <div class="form-group">
        <label for="text_title" class="col-xs-1 control-label">제목</label>
        
        <div class="col-xs-9">
            <input type="text" class="form-control" name="subject" placeholder="제목" value="<?=$list['subject']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="text_body" class="col-xs-1 control-label">내용</label>
        <div class="col-xs-9">
            <textarea id = "text_body" class="form-control" rows="10" placeholder="내용" name="contents"><?=$list['contents'] ?></textarea>
        </div>
    </div>
    <div class="form-actions" style="margin-top: 1%">
        <div class="col-xs-offset-1 col-xs-9">
        	<input type="hidden" name='req_id' value="<?=$list['board_id'] ?>" />
            <button type="submit" class="write_button">수정</button>
            <button class="modify_button" onclick="document.location.reload()">취소</button>
        </div>
    </div>
</form>
</div>
</div>