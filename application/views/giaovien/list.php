<h1 style="text-align:center;">Danh Sách Giáo Viên</h1>
<form action="" method="post">
	<div class="row text-right">
		<div class="col-sm-12">
			<?php echo $pagination; ?>
		</div>
	</div>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Giáo Viên</th>
			<th>Họ Tên</th>
			<th>Hành Động</th>
		</tr>
		<?php
		for($i=0;$i<count($giaoviens);$i++)
		{
			?>
			<tr>
				<td>
					<input type="checkbox" value="<?php echo $giaoviens[$i]['GV_MA']; ?>" name="xoanhieuluachon[]" />
				</td>
				<td><?php echo $giaoviens[$i]['GV_MA']; ?></td>
				<td><?php echo $giaoviens[$i]['GV_TEN']; ?></td>
				<td>
					<a href="/giaovien/sua/<?php echo $giaoviens[$i]['GV_MA']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Cập Nhật</a>
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