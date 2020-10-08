<?php
	include 'TOP.php';
  	include 'CONNETDB.php';//Hàm kết nối Dữ Liệu
  	include 'FUNCTION1.php';
?>

<?php

	function DemSoLuongSP()//đếm số lượng sản phẩm nằm trong đơn hàng
	{
		GLOBAL $Conn;
		$DonHang = LayMaHoaDon();
		$RS = $Conn->prepare("SELECT COUNT(masp) AS 'SLDH'
								FROM chitietdonhang
								WHERE mahd = '$DonHang'"); 
        $RS->setFetchMode(PDO::FETCH_ASSOC);
        $RS->execute(); 
        while ($row = $RS->fetch()) 
		{
	    	$SoLuongDH = $row['SLDH'];
		}
	    return $SoLuongDH;
	}
	function CapNhatHoaDon()//cập nhật tổng tiền vào hóa đơn
	{
		GLOBAL $Conn;
		$DonHang = LayMaHoaDon();
		//Them Tong Tien Vaoo Don Hang
		$RS = $Conn->prepare("UPDATE donhang
								SET tongtien =	( SELECT SUM(soluong * gia ) 
								                    FROM chitietdonhang
								                    WHERE mahd = '$DonHang' )
								     
								WHERE madh = '$DonHang'");    
        $RS->execute()or die("Cap Nhat That Bai");
		
	}
	function TinhTongTien()//tính tổng tiền tất cả sản phẩm nằm trong đơn hàng
	{
		GLOBAL $Conn;
		$DonHang = LayMaHoaDon();
		CapNhatHoaDon();
	    //Lay Tong Tien 
	    $RS = $Conn->prepare("SELECT tongtien
								FROM donhang
								WHERE madh = '$DonHang'"); 
        $RS->setFetchMode(PDO::FETCH_ASSOC);
        $RS->execute(); 
        while ($row = $RS->fetch()) 
		{
	    	$TongTien = $row['tongtien'];
		}
	    return $TongTien;
	    
	}
	function TaoMaHoaDon()//khi người dùng thanh toán thành công sẽ tạo đơn hàng mới 
	{
		GLOBAL $Conn;
		$RS = $Conn->prepare("SELECT COUNT(madh)+1 AS 'MaHD' FROM donhang"); 
        $RS->setFetchMode(PDO::FETCH_ASSOC);
        $RS->execute(); 
        while ($row = $RS->fetch()) 
	    {
	    	$MaHD = $row['MaHD'];
	    }
	    $MaHD = 'dh'.$MaHD;
	    return $MaHD;
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>GIO HANG</title>
	<link rel="stylesheet" type="text/css" href="CSS/GIOHANG.css">
	<script>
	    if ( window.history.replaceState ) 
	    {
	        window.history.replaceState( null, null, window.location.href );
	    }
	</script>
</head>
<body>
	<div id="TieuDe">
		<h2>GIỎ HÀNG  <span>(<?=DemSoLuongSP()?> sản phẩm)</span></h2>
	</div>
	<div id="NoiDung">
		<div id="NoiDung1">
			<ul>
				
				<?php 
					$MaDonHang = LayMaHoaDon();
					$RS = $Conn->prepare("SELECT sanpham.masp,id, tenanh, tensp, chitietdonhang.soluong, chitietdonhang.gia
											FROM chitietdonhang 
												JOIN sanpham 
													ON chitietdonhang.masp = sanpham.masp
												JOIN anh 
											    	ON anh.masp = chitietdonhang.masp
											WHERE chitietdonhang.mahd = '$MaDonHang'"); 
			        $RS->setFetchMode(PDO::FETCH_ASSOC);
			        $RS->execute(); 
				    while ($row = $RS->fetch()) 
				    {
				    	echo '<li class="ChiTiet1">
								<img src="ANHSP/'.$row['tenanh'].'">
								<label>'.$row['tensp'].'
								</label><br>
								<br>
								<form action="#" method="POST">
									<p><b>'.number_format($row['gia'] ,0 ,'.' ,'.').' đ'.'</b>
										<input type="text" name="SoLuong" value="'.$row['soluong'].'">
										<input type="hidden" name="MaSP" value="'.$row['masp'].'">
										<input type="hidden" name="ID" value="'.$row['id'].'">
									</p><br><br><br>
									<label> 
										<input class="Xoa" type="submit" name="Xoa" value="Xóa">
										<input class="Sua"type="submit" name="Sua" value="Sửa">
									</label>
								</form>
							</li>';
				    }
				?>

			</ul>
			
		</div>
		<div id="NoiDung2">
			<ul>
				<li id="TamTinh2">
					<label class="TenTam3">Tổng Tiền:</label>
					<label class="TenTam4"><?= number_format( TinhTongTien() ,0 ,'.' ,'.').' đ'; ?></label>
				</li>
				<li id="TamTinh1">
					<form action="#" method="POST">
						<input type="submit" name="Mua" value="Thanh Toán">
						<input type="submit" name="QuayLai" value="Tiếp Tục Mua Hàng">
					</form>
					
				</li>
			</ul>
			
		</div>
		
	</div>
	
</body>
</html>
<?php 
	if ( isset($_POST['Xoa']) )
	{
		//$thongbao = '<script type="text/javascript">confirm("Bạn có phải là fan của toidicode.com không?")</script>';
		//echo $thongbao;
		$ID = $_POST['ID'];
		$Conn->exec("DELETE FROM chitietdonhang WHERE id='$ID'");
		 header('location:GIOHANG1.php');

	}		  
	
	if ( isset($_POST['Sua']) )
	{
		$ID = $_POST['ID'];
		$SoLuong = $_POST['SoLuong'];
		$RS = $Conn->prepare("UPDATE chitietdonhang 		
									SET  soluong = $SoLuong
								WHERE id = '$ID'");    
        $RS->execute()or die("Cap Nhat That Bai");
	    header('location:GIOHANG1.php');
	}
	if ( isset($_POST['Mua']) )
	{
		//Thanh toan
		$MaDonHang = LayMaHoaDon();
		$RS = $Conn->prepare("UPDATE donhang 
									SET trangthai = '1' 
								WHERE madh = '$MaDonHang'");    
        $RS->execute()or die("Cap Nhat That Bai");
        //Tao hoa don moi
        $MaHD = TaoMaHoaDon();
        $RS = $Conn->prepare("INSERT INTO donhang VALUES ('$MaHD',0,0)");    
        $RS->execute()or die("Cap Nhat That Bai");
	    header('location:TRANGCHU1.php');
	    
	    
	}
	if ( isset($_POST['QuayLai']) )
	{
		 header('location:SANPHAM1.php');
	}

?>
<?php
	include 'END.php';
?>