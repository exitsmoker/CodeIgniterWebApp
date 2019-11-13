<?
// Session grade따라 메뉴를 구성
$sidebar_content_array = array(	array(array('notice|공지사항','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('login_process|로그인 페이지','login|로그인','sign_up|회원가입','search_id_pwd|아이디,비밀번호 찾기')
									 ),
							  	array(array('notice|공지사항','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업','attendance_record_admin|출석부 관리','daily_journal_admin|근무일지 관리','enrichment_study_admin|보강신청 관리'),
									  array('administration|관리','tutee|튜티', 'tutor|튜터'),
									  array('suggestion|제안','view_suggestions|제안보기'),
									  array('question_and_answer|Q&A','questioning|질문하기', 'answering|답변하기'),
									  array('mypage|마이페이지','modify|회원수정','delete|회원탈퇴')
									  ),
								array(array('notice|공지사항','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업','attendance_record|출석부','daily_journal|근무일지','enrichment_study|보강신청'),
									  array('question_and_answer|Q&A','questioning|질문하기','answering|답변하기'),
									  array('suggestion|제안','suggest_to_admin|관리자에게 제안'),
									  array('mypage|마이페이지','modify|회원수정','delete|회원탈퇴')
							  		 ),
								array(array('notice|공지사항','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
									  array('lesson|수업','my_attendance|내 출결보기','my_question|내 질문보기'),
									  array('question_and_answer|Q&A','questioning|질문하기', 'answering|답변하기'),
									  array('suggestion|제안','suggest_to_tutor|튜터에게 제안', 'suggest_to_admin|관리자에게 제안'),
									  array('mypage|마이페이지','modify|회원수정','delete|회원탈퇴')
							  		 ),
								array(array('notice|공지사항','whole_notice|전체 공지사항','class_notice|수업 공지사항'),
							  		  array('mypage|마이페이지','modify|회원수정','delete|회원탈퇴')
									 )
							  );
/*
				 Session이 있으면 $i에다가 grade값
				 Session이 없으면 $i에 0값 
				*/
				if($this->session->userdata('login_data')!=NULL){
					$i=(int)$login_data['grade'];
				}else{
					$i=0;
				}
			?>
		<div class="row">	
			<div class="col-xs-3">
			<?
			for($j=0;$j<=count($sidebar_content_array[$i])-1;$j++){
				/*
				 	----대매뉴 지정----
				 grade에 맞는 Array를 찾아가 "|"을 기준으로 
				 Array를 따로 나눈다. 
				 ex) 만약 이름이 $explode_top_array이고 explode를 시키면
				 $explode_top_array[0] ,$explode_top_array[1]로 나뉜다.
				*/	
				$explode_top_array = explode('|', $sidebar_content_array[$i][$j][0]);
				
				if($menu_title == $explode_top_array[0])
				{
					for($k=1;$k<=count($sidebar_content_array[$i][$j])-1;$k++)
					{
						/*		
						 ----submenu 지정----
						 대메뉴 이름을 비교하여 같다면 그에 맞는 서브메뉴 지정 
						*/						
						$explode_category_top_array = explode('|', $sidebar_content_array[$i][$j][$k]);
						if($category_title == $explode_category_top_array[0])
						{
?>		
							<?echo $explode_top_array[1]?> > <?echo $explode_category_top_array[1]?>
<?						
						}
					}
					for($k=1;$k<=count($sidebar_content_array[$i][$j])-1;$k++)
					{
?>
		
			<ul class="list-group" style=" width: 200px; ">
<?
						$explode_category_top_array = explode('|', $sidebar_content_array[$i][$j][$k]);
?>
							<a href="/index.php/<?echo $explode_top_array[0]?>/<?if($explode_category_top_array[0]=="my_attendance"){echo $explode_category_top_array[0].'/'.date("Y/m");}else if($explode_category_top_array[0]=="attendance_record"){echo $explode_category_top_array[0].'/'.date("Y/m/d");?><?}else{echo $explode_category_top_array[0];}?>"><li class="list-group-item"><?echo $explode_category_top_array[1]?></li></a>						
<?
					}
				}
			}					
?>
			</ul>
			</div>
		
