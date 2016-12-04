<h1 style="text-align:center;">Đóng Học Phí</h1>
<form class="form-horizontal" role="form" action="" method="post">
	<div class="form-group">
		<label class="control-label col-xs-2" for="HV_MA">Học Viên:</label>
		<div class="col-xs-8">
			<select name="HV_MA" id="HV_MA" class="form-control">
				<?php foreach($hocviens as $hocvien){ ?>
					<option value="<?php echo $hocvien['HV_MA']; ?>"><?php echo $hocvien['HV_TEN'].' - '.$hocvien['HV_MA']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success">Tiếp Theo</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>