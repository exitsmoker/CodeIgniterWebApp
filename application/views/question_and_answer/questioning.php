<form class="form-horizontal" method="post" action="/index.php/<?echo $view_name?>" style = "font-size: 13px">
    <div class="form-group">
        <label for="text_title" class="col-xs-1 control-label">제목</label>
        <div class="col-xs-7">
            <input type="text" class="form-control" id="text_title" name="subject" placeholder="제목">
        </div>
        <label for="text_body" class="col-xs-1 control-label">내용</label>
        <div class="col-xs-7">
            <textarea id = "text_body" class="form-control" rows="10" placeholder="내용" name="contents"></textarea>
        </div>
    </div>
    <div class="form-actions" style="margin-top: 1%">
        <div class="col-xs-offset-10 col-xs-2">
        	<input type="hidden" name="user_id" value="<?=$login_data['user_id']?>" />
        	<input type="hidden" name="user_name" value="<?=$login_data['user_name']?>" />
            <button type="submit" class="write_button">작성</button>
            <button class="modify_button" onclick="history.back()" type='button'>취소</button>
        </div>
    </div>
</form>
</div>