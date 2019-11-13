<div class="col-xs-7">
<form style=" float: left; ">
<select onChange="getmonth(this);">
	<?for($i=2013;$i<=2017;$i++){?>
		<?if($i == $this -> uri -> segment(3)){?>
			<option value="<?echo $i;?>" selected><?echo $i;?></option>
		<?}else{?>
			<option value="<?echo $i;?>"><?echo $i;?></option>
	<?
		}	
	}?>
	<input type="hidden" id="month" value="<?echo $this -> uri -> segment(4);?>"/>
</select>
</form>
<form>
<select onChange="getyear(this);">
	<?for($i=1;$i<=12;$i++){
		$k = sprintf("%02d", $i);	
	?>
		<?if($i == $this -> uri -> segment(4)){?>
			<option value="<?echo $k;?>" selected><?echo $i;?>월</option>
		<?}else{?>
			<option value="<?echo $k;?>"><?echo $i;?>월</option>
	<?
		}	
	}?>
	<input type="hidden" id="year" value="<?echo $this -> uri -> segment(3);?>"/>
</select>
</form>
<?echo $calendar;?>
