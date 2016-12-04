<h1 style="text-align:center;">Danh Sách Học Viên Lớp <?php if(count($lophocs)>0) echo $lophocs[0]['LH_TEN']; ?></h1>
<table class="table table-striped table-bordered">
	<tr>
		<th>Mã Học Viên</th>
		<th>Họ Tên</th>
		<th>Số Điện Thoại</th>
		<th>Email</th>
		<th>Ngày Sinh</th>
		<th>Địa Chỉ</th>
	</tr>
	<?php
	for($i=0;$i<count($lophocs);$i++)
	{
		?>
		<tr>
			<td><?php echo $lophocs[$i]['HV_MA']; ?></td>
			<td><?php echo $lophocs[$i]['HV_TEN']; ?></td>
			<td><?php echo $lophocs[$i]['HV_SDT']; ?></td>
			<td><?php echo $lophocs[$i]['HV_EMAIL']; ?></td>
			<td><?php echo $lophocs[$i]['HV_NGAYSINH']; ?></td>
			<td><?php echo $lophocs[$i]['HV_DIACHI']; ?></td>
		</tr>
		<?php
	}
	?>
</table>
<a href="<?php if(count($lophocs)>0) echo '/lophoc/report/'.$lophocs[0]['LH_MA']; ?>" class="btn btn-warning">Xuất File Excel</a>