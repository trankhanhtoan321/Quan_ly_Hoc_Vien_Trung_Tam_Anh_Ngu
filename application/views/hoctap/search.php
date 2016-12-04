<h1 style="text-align:center;">Danh Sách Đã Đăng Ký Lớp Học</h1>
<form action="/hoctap/indẽ" method="post">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Đăng Ký</th>
			<th>Mã Hoc Viên</th>
			<th>Học Viên</th>
			<th>Lớp Học</th>
			<th>Ngày Bắt Đầu</th>
			<th>Hành Động</th>
		</tr>
		<?php
		for($i=0;$i<count($hoctaps);$i++)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" value="<?php echo $hoctaps[$i]['HT_MA']; ?>" name="xoanhieuluachon[]" />
				</td>
				<td><?php echo $hoctaps[$i]['HT_MA']; ?></td>
				<td><?php echo $hoctaps[$i]['HV_MA']; ?></td>
				<td><?php echo $hoctaps[$i]['HV_TEN']; ?></td>
				<td><?php echo $hoctaps[$i]['LH_TEN']; ?></td>
				<td><?php echo $hoctaps[$i]['HT_NGAYBATDAU']; ?></td>
				<td>
					<a href="/hoctap/sua/<?php echo $hoctaps[$i]['HT_MA']; ?>" class="btn btn-info">Cập Nhật</a>
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