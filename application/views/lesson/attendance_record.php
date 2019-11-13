<div class="col-xs-7">
<?	
	$year = date("Y");
	$month = date("m");
	$day = date("d");
?>

<form style="float: left;">
<select onChange="change_year_value(this);">
	<?for($i = 2013; $i <= 2017; $i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i;?>" selected><?echo $i;?>년</option>
		<?}else{?>
			<option value="<?echo $i;?>"><?echo $i;?>년</option>
	<?
		}	
	}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
	<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
</select>
</form>

<form style="float: left;">
<select onChange="change_month_value(this);">
	<?for($i = 1; $i <= 12; $i++){
		$k = sprintf("%02d", $i);
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k;?>" selected><?echo $i;?>월</option>
		<?}else{?>
			<option value="<?echo $k;?>"><?echo $i;?>월</option>
	<?
		}	
	}?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
	<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>"/>
</select>
</form>

<form style="float: left">
<select onChange="change_day_value(this);">
	<!--
	   월(month)에 맞는 일(day) 구하기
	--> 
	<?
	  $year = $this -> uri -> segment(3);
	  $month = $this -> uri -> segment(4);
	  for($day_month=31;$day_month>=27;$day_month--){
	  	if(checkdate($month, $day_month, $year)){
	  		$day = $day_month;
			break;
	  	}
	  }
	  for($i = 1; $i <= $day; $i++){
	  	$k = sprintf("%02d", $i);
	?>
		<?if($i == $this -> uri -> segment(5)){?>
			<option value="<?echo $k;?>" selected><?echo $i;?>일</option>
		<?}else{?>
			<option value="<?echo $k;?>"><?echo $i;?>일</option>
	<?
		}	
	}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
</select>
</form>

	<form>
		<select name="user_subject" id="user_subject">
			<?foreach($get_list as $lt){?>
				<option value="<?echo $lt -> subject_id;?>"><?echo $lt -> subject;?></option>
			<?}?>
		</select>
		<select name="user_divide" id="user_divide" onchange="showtutee(this.value)">
			<?foreach($get_sub_list as $lt){?>
				<option class="<?echo $lt -> subject_id?>" value="<?echo $lt -> subject_level?>"><?echo $lt ->subject_level?>
			<?}?>					
		</select>
		<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>" />
		<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>" />
		<input type="hidden" id="day" value="<?echo $this -> uri -> segment(5);?>" />
	</form>
	
	<div id="txtHint"><b>위에 설정을 해주세요.</b></div>
