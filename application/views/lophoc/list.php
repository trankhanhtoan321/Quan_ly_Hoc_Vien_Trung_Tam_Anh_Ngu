<h1 style="text-align:center;">Danh Sách Lớp Học</h1>

<form action="" method="post">
	<div class="row text-right">
		<div class="col-sm-12">
			<?php echo $pagination; ?>
		</div>
	</div>
	<table class="table table-striped table-bordered">
		<tr>
			<th>Đánh Dấu</th>
			<th>Mã Lớp Học</th>
			<th>Tên Lớp Học</th>
			<th>Sĩ Số</th>
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
				<td><?php echo $lophocs[$i]['LH_SISO']; ?></td>
				<td><?php echo $lophocs[$i]['GV_TEN']; ?></td>
				<td><?php echo $lophocs[$i]['KH_TEN']; ?></td>
				<td>
					<a href="/lophoc/sua/<?php echo $lophocs[$i]['LH_MA']; ?>" class="btn btn-info"><span class="glyphicon glyphicon-refresh"></span> Cập Nhật</a>
					<a href="/lophoc/danhsach/<?php echo $lophocs[$i]['LH_MA']; ?>" class="btn btn-warning"><span class="glyphicon glyphicon-upload"></span> Danh Sách Học Viên</a>
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