<form class="form-horizontal" role="form" action="" method="post">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="MATKHAU">Mật Khẩu Cũ:</label>
		<div class="col-xs-8">
			<input type="password" class="form-control" name="MATKHAU" id="MATKHAU" required />
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="MATKHAUMOI">Mật Khẩu Mới:</label>
		<div class="col-xs-8">
			<input type="password" class="form-control" name="MATKHAUMOI" id="MATKHAUMOI" required />
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group"> 
		<div class="col-xs-offset-2 col-xs-8">
			<button type="submit" class="btn btn-success">
			<span class="glyphicon glyphicon-refresh"></span>
			Update</button>
		</div>
		<div class="col-xs-2"></div>
	</div>
</form>