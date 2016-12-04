<h1 style="text-align:center;">Danh Sách Lớp Học</h1>

<form action="/lophoc/index" method="post">
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Lớp Học</th>
			<th>Tên Lớp Học</th>
			<th>Giáo Viên Phụ Trách</th>
			<th>Khóa Học</th>
			<th>Hành Động</th>
		</tr>
		<?php
		for($i=0;$i<count($lophocs);$i++)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" value="<?php echo $lophocs[$i]['LH_MA']; ?>" name="xoanhieuluachon[]" />
				</td>
				<td><?php echo $lophocs[$i]['LH_MA']; ?></td>
				<td><?php echo $lophocs[$i]['LH_TEN']; ?></td>
				<td><?php echo $lophocs[$i]['GV_TEN']; ?></td>
				<td><?php echo $lophocs[$i]['KH_TEN']; ?></td>
				<td>
					<a href="/lophoc/sua/<?php echo $lophocs[$i]['LH_MA']; ?>" class="btn btn-info">Cập Nhật</a>
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