<br/>
<h1 style="text-align:center;">Cập Nhật Thông Tin Giáo Viên</h1>
<form class="form-horizontal" role="form" action="" method="post" name="form_them_moi_giao_vien">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="GV_MA">Mã giáo viên:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="GV_MA" value="<?php echo $giaovien['GV_MA']; ?>" id="GV_MA" readonly />
			<span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="GV_TEN">Họ Tên:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="GV_TEN" id="GV_TEN" value="<?php echo $giaovien['GV_TEN']; ?>" required />
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2" for="GV_THONGTIN">Thông Tin:</label>
		<div class="col-xs-8">
			<textarea class="ckeditor" name="GV_THONGTIN" id="GV_THONGTIN"><?php echo $giaovien['GV_THONGTIN']; ?></textarea>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span>Cập Nhật</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>