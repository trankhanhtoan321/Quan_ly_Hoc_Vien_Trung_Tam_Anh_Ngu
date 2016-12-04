<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" type="text/css" href="/public/bootstrap_css/css/bootstrap.min.css" />
		<script src="/public/jquery.min.js"></script>
		<script src="/public/bootstrap_css/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="/public/custom.css" />
		<script src="/public/ckeditor/ckeditor.js"></script>
		<title><?php echo $title; ?></title>
	</head>
	<body>
		<div class="container-fluid" style="background-color:#fcfcfc;">
			<div class="row text-center" style="background-color:#000;color:#fff">
				<h4><?php echo $title; ?></h4>
			</div>
			<br/>
			<div class="row">
				<div class="col-sm-2">
				<!--menu-->
					<div class="list-group">
						<a href="/" class="list-group-item <?php if($now_position=='' || $now_position=='main') echo "active"; ?>">
							<span class="glyphicon glyphicon-home"></span> Trang Chủ
						</a>
						<a href="/hocvien" class="list-group-item <?php if($now_position=='hocvien') echo "active"; ?>">
							<span class="glyphicon glyphicon-user"></span> Học Viên
						</a>
						<a href="/giaovien" class="list-group-item <?php if($now_position=='giaovien') echo "active"; ?>">
							<span class="glyphicon glyphicon-king"></span> Giáo Viên
						</a>
						<a href="/khoahoc" class="list-group-item <?php if($now_position=='khoahoc') echo "active"; ?>">
							<span class="glyphicon glyphicon-education"></span> Khóa Học
						</a>
						<a href="/lophoc" class="list-group-item <?php if($now_position=='lophoc') echo "active"; ?>">
							<span class="glyphicon glyphicon-list-alt"></span> Lớp Học
						</a>
						<a href="/hoctap" class="list-group-item <?php if($now_position=='hoctap') echo "active"; ?>">
							<span class="glyphicon glyphicon-check"></span> Đăng Ký Lớp Học
						</a>
						<a href="/hocphi" class="list-group-item <?php if($now_position=='hocphi') echo "active"; ?>">
							<span class="glyphicon glyphicon-check"></span> Đóng Học Phí
						</a>
						<a href="/thongke" class="list-group-item <?php if($now_position=='thongke') echo "active"; ?>">
							<span class="glyphicon glyphicon-education"></span> Thống Kê
						</a>
						<a href="/doimatkhau" class="list-group-item <?php if($now_position=='doimatkhau') echo "active"; ?>">
							<span class="glyphicon glyphicon-lock"></span> Đổi Mật Khẩu
						</a>
						<a href="/main/logout" class="list-group-item">
							<span class="glyphicon glyphicon-new-window"></span> Đăng Xuất
						</a>
					</div>
				<!--end menu-->
				</div>
				<div class="col-sm-10" >