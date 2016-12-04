<h1 style="text-align:center;">Danh Sách Đóng Học Phí</h1>
<h2 style="text-align:center;"><i>Từ Ngày <?php echo $tungay; ?> Đến Ngày <?php echo $denngay; ?></i></h2>
<table class="table table-striped table-bordered">
	<tr>
		<th>Mã Học Viên</th>
		<th>Học Viên</th>
		<th>Lớp Học</th>
		<th>Khóa Học</th>
		<th>Ngày Bắt Đầu</th>
		<th>Só Tiền Đã Đóng(VNĐ)</th>
	</tr>
	<?php
	for($i=0;$i<count($thongke);$i++)
	{
		?>
		<tr <?php if(!$thongke[$i]['HP_TIENDONG']) echo "class=\"danger\""; else if($thongke[$i]['KH_HOCPHI']==$thongke[$i]['HP_TIENDONG']); else echo "class=\"info\""; ?>>
			<td><?php echo $thongke[$i]['HV_MA']; ?></td>
			<td><?php echo $thongke[$i]['HV_TEN']; ?></td>
			<td><?php echo $thongke[$i]['LH_TEN']; ?></td>
			<td><?php echo $thongke[$i]['KH_TEN']; ?></td>
			<td><?php echo $thongke[$i]['HT_NGAYBATDAU']; ?></td>
			<td><b><?php echo number_format($thongke[$i]['HP_TIENDONG'],0,',','.'); ?></b></td>
		</tr>
		<?php
	}
	?>
	<tr>
		<td colspan="2"><b>Tổng Cộng:</b></td>
		<td colspan="4" style="color:red;" ><b>
		<?php
		$tong=0;
		for($i=0;$i<count($thongke);$i++)  $tong+=$thongke[$i]['HP_TIENDONG'];
		echo number_format($tong,0,',','.').' VNĐ';
		?>
		</b></td>
	</tr>
</table>
<a class="btn btn-warning" href="/thongke/report/<?php echo $tungay; ?>/<?php echo $denngay ?>">Xuất File Excel</a>