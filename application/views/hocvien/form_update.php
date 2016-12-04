<br/>
<h1 style="text-align:center;">Cập Nhật Thông Tin Học Viên</h1>
<form class="form-horizontal" role="form" action="" method="post" name="form_them_moi_hoc_vien">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_MA">Mã Học Viên:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="HV_MA" value="<?php echo $hocvien['HV_MA']; ?>" id="HV_MA" readonly />
			<span class="glyphicon glyphicon-barcode form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_TEN">Họ Tên:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="HV_TEN" id="HV_TEN" value="<?php echo $hocvien['HV_TEN']; ?>" required/>
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_SDT">Số Điện Thoại:</label>
		<div class="col-xs-8"> 
			<input type="tel" class="form-control" id="HV_SDT" name="HV_SDT" value="<?php echo $hocvien['HV_SDT']; ?>" />
			<span class="glyphicon glyphicon-phone form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_EMAIL">Email:</label>
		<div class="col-xs-8">
			<input type="email" class="form-control" name="HV_EMAIL" id="HV_EMAIL"  value="<?php echo $hocvien['HV_EMAIL']; ?>"/>
			<span class="glyphicon glyphicon-send form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_DIACHI">Địa Chỉ:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="HV_DIACHI" id="HV_DIACHI" value="<?php echo $hocvien['HV_DIACHI']; ?>" />
			<span class="glyphicon glyphicon-globe form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="HV_NGAYSINH">Ngày Sinh:</label>
		<div class="col-xs-8">
			<input type="date" class="form-control" name="HV_NGAYSINH" id="HV_NGAYSINH" value="<?php echo $hocvien['HV_NGAYSINH']; ?>" required />
			<span class="glyphicon glyphicon-calendar form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-refresh"></span> Cập Nhật</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>