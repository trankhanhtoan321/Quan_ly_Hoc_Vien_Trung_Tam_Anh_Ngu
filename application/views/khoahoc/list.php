<h1 style="text-align:center;">Danh Sách Khóa Học</h1>
<form action="" method="post">
	<div class="row text-right">
		<div class="col-sm-12">
			<?php echo $pagination; ?>
		</div>
	</div>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Khóa Học</th>
			<th>Tên Khóa Học</th>
			<th>Học Phí (VNĐ)</th>
			<th>Thời Lượng (Tuần)</th>
			<th>Hành Động</th>
		</tr>
		<?php
		for($i=0;$i<count($khoahocs);$i++)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" value="<?php echo $khoahocs[$i]['KH_MA']; ?>" name="xoanhieuluachon[]" />
				</td>
				<td><?php echo $khoahocs[$i]['KH_MA']; ?></td>
				<td><?php echo $khoahocs[$i]['KH_TEN']; ?></td>
				<td><?php echo number_format($khoahocs[$i]['KH_HOCPHI'],0,',','.'); ?></td>
				<td><?php echo $khoahocs[$i]['KH_THOILUONG']; ?></td>
				<td>
					<a href="/khoahoc/sua/<?php echo $khoahocs[$i]['KH_MA']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Cập Nhật</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
	<div class="row text-left">
		<div class="col-sm-12">
			<button class="btn btn-danger" type="submit" name="xoa_nhieu_lua_chon" onclick="return canhbao()"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
		</div>
	</div>
</form>
<script>
function canhbao()
{
	return confirm("Bạn Có Chắc Muốn Xóa?");
}
</script>