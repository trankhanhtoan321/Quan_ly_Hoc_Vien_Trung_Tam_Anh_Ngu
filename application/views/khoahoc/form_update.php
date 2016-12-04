<br/>
<h1 style="text-align:center;">Cập Nhật Thông Tin Khóa Học</h1>
<form class="form-horizontal" role="form" action="" method="post" name="form_them_moi_khoa_hoc">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="KH_MA">Mã Khóa Học:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="KH_MA" value="<?php echo $khoahoc['KH_MA']; ?>" id="KH_MA" readonly />
			<span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="KH_TEN">Tên Khóa Học:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="KH_TEN" id="KH_TEN" value="<?php echo $khoahoc['KH_TEN']; ?>" required/>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="KH_HOCPHI">Học Phí (VNĐ):</label>
		<div class="col-xs-8"> 
			<input type="number" class="form-control" id="KH_HOCPHI" name="KH_HOCPHI" value="<?php echo $khoahoc['KH_HOCPHI']; ?>" />
			<span class="glyphicon glyphicon-usd form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="KH_THOILUONG">Thời Lượng (tuần):</label>
		<div class="col-xs-8">
			<input type="number" class="form-control" name="KH_THOILUONG" id="KH_THOILUONG"  value="<?php echo $khoahoc['KH_THOILUONG']; ?>"/>
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2" for="KH_NOIDUNG">Nội Dung:</label>
		<div class="col-xs-8">
			<textarea name="KH_NOIDUNG" id="KH_NOIDUNG" class="ckeditor"><?php echo $khoahoc['KH_NOIDUNG']; ?></textarea>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success">
				<span class="glyphicon glyphicon-refresh"></span>
				Cập Nhật
			</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>