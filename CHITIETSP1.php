<?php
	include 'TOP.php';//
	include 'CONNETDB.php';//Hàm kết nối Dữ Liệu
	include 'FUNCTION1.php';
?>


<?php
	if (isset($_GET['ID'])) 
	{
		$a =$_GET['ID'];
		$RS = $Conn->prepare('SELECT SP.masp ,a.tenanh, tensp ,gia , soluong, TT.hinhthuc, TT.kichthuoc, TL.tentl,
									 TT.sotrang, TT.nxb, TT.tacgia, TT.trongluong
					                  FROM sanpham  SP 
					                  	JOIN danhgia DG 
					                    	ON SP.masp = DG.masp
					                    JOIN anh a 
					                    	ON SP.masp = a.masp
					                    JOIN thongtin TT
					                    	ON SP.masp = TT.masp
					                    JOIN theloai TL
					                    	ON SP.matl = TL.matl
								WHERE SP.masp = ?'); 
        $RS->setFetchMode(PDO::FETCH_ASSOC);
        $RS->bindParam(1, $a);
        $RS->execute();
        while ( $row = $RS->fetch() ) 
		{
	        $masp = $row['masp'];
			$TenAnh = $row['tenanh'];
			$TenSP = $row['tensp'];
			$Gia = $row['gia'];
			$SoLuong = $row['soluong'];
			if($SoLuong >0)
				$TrangThai  = "Còn Hàng ($SoLuong)";//
			else
				$TrangThai  = "Hết Hàng ($SoLuong)";
			$HinhThuc = $row['hinhthuc'];
			$kichThuoc = $row['kichthuoc'];
			$TheLoai = $row['tentl'];
			$SoTrang = $row['sotrang'];
			$NXB = $row['nxb'];
			$TacGia = $row['tacgia'];
			$TrongLuong = $row['trongluong'];

	    }
	}
	else
	{
		$masp = "N/A";
		$TenAnh = "N/A";
		$TenSP = "N/A";
		$Gia = "N/A";
		$SoLuong = 99;
		$TrangThai  = "Con Hang (99)";//
		$HinhThuc = "Sach";
		$kichThuoc = "12 X 30 cm";
		$TheLoai = "";
		$SoTrang = 120;
		$NXB = "Kim Dong";
		$TacGia = "Kim Chi";
		$TrongLuong = 152;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Chi tiet</title>
	<link rel="stylesheet" type="text/css" href="CSS/CHITIETSP.css">
	<script>
	    if ( window.history.replaceState ) 
	    {
	        window.history.replaceState( null, null, window.location.href );
	    }
	</script>
</head>
	<body>
		<div id="Sach1">

			<div id="ThongTin">

				<div class="Anh">
					<img src="ANHSP/<?= $TenAnh ?>" alt="Pineapple" >
				</div>
				<div id="Q">
					<h1 class="e">
						<bdi>
							<?= $TenSP ?>
						</bdi>

					</h1>
					<div class="Gia">
						<label id="GiaBan"><?= number_format( $Gia,0 ,'.' ,'.').' đ' ?></label><label></label>
					</div>
					<div id="TinhTrang">
						<label id="TinhTrang1">Trạng Thái  </label>
						<label id="TinhTrang2"><?= $TrangThai ?> </label>
					</div>
					<form  method="post">
						<label class="rt">Số Lượng</label>
						<input type="text" name="SoLuong" placeholder="1" width="50px" value="1"><br><br>
						<input type="submit" name="MuaHang" value="Mua Ngay" class="Nut">
						<input type="submit" name="ThemVaoGio" value="Thêm Vào Giỏ" class="Nut" 
								onclick="alert('Thêm Giỏ Hàng Thành Công')">
					</form>

					
				</div>
				  

			</div>




			<div id="BaoHanh">
				<div class="widget-box">
				    <h3>Chính sách đổi trả</h3>
				    <div class="content-widget">
				        <div class="returnpolicy icon-return">
				            <strong>Hoàn tiền 101%</strong>
				            Nếu phát hiện hàng giả
				        </div>
				        <div class="returnpolicy icon-return7">
				            <strong>Đổi trả trong vòng 7 ngày</strong>
				            Không chấp nhận<br> trường hợp thay đổi suy nghĩ
				        </div>
				        <div class="returnpolicy icon-waranty">
				            <strong>Bảo hành</strong>
				            Nếu phát hiện hàng giả
				        </div>
				    </div>
				</div>
				<div class="widget-box">
				    <ul class="menu-list">
				        <li><a href="#">Chính sách thành viên</a></li>
				        <li><a href="#">Chính sách khách sỉ</a></li>
				        <li><a href="#">Chính sách giao nhận</a></li>
				        <li><a href="#">Dailydeals</a></li>
    				</ul>
				</div>
			</div>
		</div
		</div>
		<div id="Sach2">
			<h1 id="ChiTiet1"><span>Thông tin</span> sản phẩm </h1>
			<div class="ChiTiet2">
				<span class="label1">Hình thức:</span>
				<div class="value"><?= $HinhThuc ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Kích Thước (cm):</span>
				<div class="value"><?= $kichThuoc ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Thể Loại:</span>
				<div class="value"><?= $TheLoai ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Số Trang:</span>
				<div class="value"><?= $SoTrang ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Nhà Xuất Bản:</span>
				<div class="value"><?= $NXB ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Tác Giả:</span>
				<div class="value"><?= $TacGia ?></div>
			</div>
			<div class="ChiTiet2">
				<span class="label1">Trọng Lượng (gr):</span>
				<div class="value"><?= $TrongLuong ?></div>
			</div>
		</div>
	</body>
</html>
<?php //Them vao gio hang
	if ( isset($_POST['ThemVaoGio']) ) 
	{

	//Them vao don hang moi
		$DH = LayMaHoaDon();//Them san pham vao gio hang nhung khong chuyen trang
		$SL = $_POST['SoLuong'];
		$RS = $Conn->prepare('INSERT INTO chitietdonhang VALUES (NULL, ?, ?, ?, ?)'); 
        $RS->bindParam(1, $DH);
        $RS->bindParam(2, $masp);
        $RS->bindParam(3, $SL);
        $RS->bindParam(4, $Gia);
        $RS->execute();
		DemSoLuongSanPham($DH,$masp,$Gia);
	
		//Dem so luonfg san pham vua them theo ma don hang va san pham


	}
	function DemSoLuongSanPham($MaDonHang,$Masp,$Gia)//đếm số lượng sản phẩm có trong 1 đơn hàng
	{
		//Tinh tong so luong san pham cung ma trong don hang
		GLOBAL $Conn;
		$RS =$Conn->prepare("SELECT SUM(soluong) AS 'SL' FROM chitietdonhang WHERE mahd = '$MaDonHang' AND masp = '$Masp'"); 
		$RS->execute() or die("adgsdgash"); 
		while ( $row = $RS->fetch() ) 
		{
			$MaDonHang1 =$row['SL'];
		}
		 //xoa ax sp
 		$RS =$Conn->prepare("DELETE FROM chitietdonhang WHERE mahd ='$MaDonHang' AND masp = '$Masp'"); 
		$RS->execute()or die("adgsdgash"); 
	    //them moi
	    $RS = $Conn->prepare("INSERT INTO chitietdonhang VALUES (NULL,'$MaDonHang','$Masp','$MaDonHang1','$Gia')"); 
       
        $RS->execute()or die("adgsdgash");
	}
	if (isset($_POST['MuaHang'])) 
	{//Them san pham vao gio hang
		$DH = LayMaHoaDon();//Them san pham vao gio hang nhung khong chuyen trang
		$SL = $_POST['SoLuong'];
		$RS = $Conn->prepare('INSERT INTO chitietdonhang VALUES (NULL, ?, ?, ?, ?)'); 
        $RS->bindParam(1, $DH);
        $RS->bindParam(2, $masp);
        $RS->bindParam(3, $SL);
        $RS->bindParam(4, $Gia);
        $RS->execute();
		DemSoLuongSanPham($DH,$masp,$Gia);
		header("Location: GIOHANG1.php");//Chuyen trang
	}
	
?>
<?php
	include 'END.php';
?>