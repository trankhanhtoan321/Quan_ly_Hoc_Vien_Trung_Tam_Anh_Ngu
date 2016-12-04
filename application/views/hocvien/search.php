<h1 style="text-align:center;">Danh Sách Học Viên Tìm Kiếm</h1>
<form action="/hocvien/index" method="post">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Học Viên</th>
			<th>Họ Tên</th>
			<th>Số Điện Thoại</th>
			<th>Email</th>
			<th>Ngày Sinh</th>
			<th>Địa Chỉ</th>
			<th>Hành Động</th>
		</tr>
		<?php
		for($i=0;$i<count($hocviens);$i++)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" value="<?php echo $hocviens[$i]['HV_MA']; ?>" name="xoanhieuluachon[]" />
				</td>
				<td><?php echo $hocviens[$i]['HV_MA']; ?></td>
				<td><?php echo $hocviens[$i]['HV_TEN']; ?></td>
				<td><?php echo $hocviens[$i]['HV_SDT']; ?></td>
				<td><?php echo $hocviens[$i]['HV_EMAIL']; ?></td>
				<td><?php echo $hocviens[$i]['HV_NGAYSINH']; ?></td>
				<td><?php echo $hocviens[$i]['HV_DIACHI']; ?></td>
				<td>
					<a href="/hocvien/sua/<?php echo $hocviens[$i]['HV_MA']; ?>" class="btn btn-info">Cập Nhật</a>
				</td>
			</tr>
			<?php
		}
		?>
	</table>
	<div class="row text-left">
		<div class="col-sm-12">
			<button class="btn btn-danger" type="submit" name="xoa_nhieu_lua_chon" onclick="return canhbao()">Xóa</button>
		</div>
	</div>
</form>
<script>
function canhbao()
{
	return confirm("Bạn Có Chắc Muốn Xóa?");
}
</script>