<h1 style="text-align:center;">Thêm Mới Lớp Học</h1>
<form class="form-horizontal" role="form" action="" method="post">
	<div class="form-group has-feedback">
		<label class="control-label col-xs-2" for="LH_TEN">Tên Lớp Học:</label>
		<div class="col-xs-8">
			<input type="text" class="form-control" name="LH_TEN" id="LH_TEN" required />
			<span class="glyphicon glyphicon-user form-control-feedback"></span>
		</div>
		<div class="col-xs-2"></div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2" for="GV_MA">Giáo Viên Phụ Trách:</label>
		<div class="col-xs-8">
		<select name='GV_MA' id='GV_MA' class="form-control">
			<?php foreach($giaoviens as $giaovien){ ?>
				<option value="<?php echo $giaovien['GV_MA']; ?>"><?php echo $giaovien['GV_TEN'].' - '.$giaovien['GV_MA']; ?></option>
			<?php } ?>
		</select>
		</div>
		<div class="col-xs-2"><a class="btn btn-warning" href="/giaovien/themmoi"><span class="glyphicon glyphicon-plus-sign"></span> Thêm Giáo Viên</a></div>
	</div>
	<div class="form-group">
		<label class="control-label col-xs-2" for="KH_MA">Khóa Học:</label>
		<div class="col-xs-8">
		<select name='KH_MA' id='KH_MA' class="form-control">
			<?php foreach($khoahocs as $khoahoc){ ?>
				<option value="<?php echo $khoahoc['KH_MA']; ?>"><?php echo $khoahoc['KH_TEN'].' - '.$khoahoc['KH_MA']; ?></option>
			<?php } ?>
		</select>
		</div>
		<div class="col-xs-2"><a class="btn btn-warning" href="/khoahoc/themmoi"><span class="glyphicon glyphicon-plus-sign"></span> Thêm Khóa Học</a></div>
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