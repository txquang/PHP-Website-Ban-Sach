<?php
	include 'CONNETDB.php';//Hàm kết nối Dữ Liệu
?>
<?php
	function LayMaHoaDon()
	{
		GLOBAL $Conn;
		$RS = $Conn->prepare('SELECT madh FROM donhang
								WHERE trangthai =0
								ORDER BY madh DESC
								LIMIT 1'); 
        $RS->setFetchMode(PDO::FETCH_ASSOC);
        $RS->execute(); 
        while ($row = $RS->fetch()) 
		{
	    	$MaDonHang = $row['madh'];
		}
	    return $MaDonHang;
	}
?>