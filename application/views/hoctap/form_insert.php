<h1 style="text-align:center;">Đăng Ký Lớp Học</h1>
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
		<div class="col-xs-2">
			<a href="/hocvien/themmoi" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span> Thêm Học Viên</a>
		</div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2" for="LH_MA">Lớp Học:</label>
		<div class="col-xs-8">
			<select name="LH_MA" id="LH_MA" class="form-control">
				<?php foreach($lophocs as $lophoc){ ?>
					<option value="<?php echo $lophoc['LH_MA']; ?>"><?php echo $lophoc['LH_TEN'].' - '.$lophoc['LH_MA']; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="col-xs-2">
			<a href="/lophoc/themmoi" class="btn btn-warning"><span class="glyphicon glyphicon-plus-sign"></span> Thêm Lớp Học</a>
		</div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HT_NGAYBATDAU">Ngày Bắt Đầu:</label>
		<div class="col-xs-8">
			<input type="date" class="form-control" name="HT_NGAYBATDAU" id="HT_NGAYBATDAU" />
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
			<small>(Bỏ trống nếu lấy ngày hệ thống)</small>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-plus-sign"></span>
			Thêm</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>