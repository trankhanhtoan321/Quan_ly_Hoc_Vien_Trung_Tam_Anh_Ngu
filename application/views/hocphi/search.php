<h1 style="text-align:center;">Danh Sách Đóng Học Phí</h1>
<table class="table table-striped table-bordered">
	<tr>
		<th>Mã Học Viên</th>
		<th>Học Viên</th>
		<th>Lớp Học</th>
		<th>Khóa Học</th>
		<th>Ngày Bắt Đầu</th>
		<th>Học Phí (VNĐ)</th>
		<th>Só Tiền Đã Đóng(VNĐ)</th>
		<th>Còn Nợ (VNĐ)</th>
	</tr>
	<?php
	for($i=0;$i<count($hocphis);$i++)
	{
		?>
		<tr <?php if(!$hocphis[$i]['HP_TIENDONG']) echo "class=\"danger\""; else if($hocphis[$i]['KH_HOCPHI']==$hocphis[$i]['HP_TIENDONG']) echo "class=\"success\""; else echo "class=\"info\""; ?>>
			<td><?php echo $hocphis[$i]['HV_MA']; ?></td>
			<td><?php echo $hocphis[$i]['HV_TEN']; ?></td>
			<td><?php echo $hocphis[$i]['LH_TEN']; ?></td>
			<td><?php echo $hocphis[$i]['KH_TEN']; ?></td>
			<td><?php echo $hocphis[$i]['HT_NGAYBATDAU']; ?></td>
			<td><b><?php echo number_format($hocphis[$i]['KH_HOCPHI'],0,',','.'); ?></b></td>
			<td><b><?php echo number_format($hocphis[$i]['HP_TIENDONG'],0,',','.'); ?></b></td>
			<td><b style="color:red;"><i><?php echo number_format($hocphis[$i]['KH_HOCPHI']-$hocphis[$i]['HP_TIENDONG'],0,',','.'); ?></i></b></td>
		</tr>
		<?php
	}
	?>
</table>
<script>
function canhbao()
{
	return confirm("Bạn Có Chắc Muốn Xóa?");
}
</script>