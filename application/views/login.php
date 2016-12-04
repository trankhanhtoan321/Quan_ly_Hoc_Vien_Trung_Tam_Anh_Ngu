<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="/public/bootstrap_css/css/bootstrap.min.css" />
		<script src="/public/jquery.min.js"></script>
		<script src="/public/bootstrap_css/js/bootstrap.min.js"></script>
		<title>Đăng Nhập</title>
	</head>
	<body>
		<div class="container-fluid" style="background-color:#fcfcfc;">
			<div class="row text-center" style="background-color:#000;color:#fff">
				<h4>Đăng Nhập</h4>
			</div>
			<br/>
			<form class="form-horizontal" role="form" action="" method="post">
				<div class="form-group has-feedback">
					<label class="control-label col-xs-2" for="TENDANGNHAP">Tên Đăng Nhập:</label>
					<div class="col-xs-8">
						<input required type="text" class="form-control" name="TENDANGNHAP" id="TENDANGNHAP" />
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="col-xs-2"></div>
				</div>
				<div class="form-group has-feedback">
					<label class="control-label col-xs-2" for="MATKHAU">Mật Khẩu:</label>
					<div class="col-xs-8"> 
						<input required type="password" class="form-control" id="MATKHAU" name="MATKHAU" />
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="col-xs-2"></div>
				</div>
				<div class="form-group"> 
					<div class="col-xs-offset-2 col-xs-8">
						<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-lock"></span> Đăng Nhập</button>
					</div>
					<div class="col-xs-2"></div>
				</div>
			</form>
		</div>
	</body>
</html>