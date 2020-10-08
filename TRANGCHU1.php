<?php
	include 'TOP.php';
  include 'CONNETDB.php';//Hàm kết nối Dữ Liệu
?>
<!DOCTYPE html>
<html>

<head>
<title>Trang chu</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
  <link rel="stylesheet" href="CSS/w3.css">
  <link rel="stylesheet" type="text/css" href="CSS/TRANGCHU1.css">
  <style>
    .mySlides {display:none;}
  </style>

</head>
<body>
  <div class="w3-content w3-section">
     <img class="mySlides" src="ANHTRANGCHU/banner.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/1.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/2.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/4.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/banner.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/5.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/6.jpg" >
     <img class="mySlides" src="ANHTRANGCHU/7.jpg" >

  </div>
  <div id="Q">
  		<h2>
  			<bdi>SẢN PHẨM MỚI</bdi>
  		</h2>
        <h1 class="e">
            <bdi>SẢN PHẨM NỔI BẬT</bdi>
        </h1>

<div class="danhsach">
        <ul>
        <?php

          $RS = $Conn->prepare('SELECT SP.masp ,a.tenanh, tensp , danhgia ,gia 
                                  FROM sanpham  SP 
                                    JOIN danhgia DG 
                                      ON SP.masp = DG.masp
                                    JOIN anh a 
                                      ON SP.masp = a.masp
                                    ORDER BY DG.danhgia DESC
                                    LIMIT 8'); 
          $RS->setFetchMode(PDO::FETCH_ASSOC);
          $RS->execute(); 
          while ($row = $RS->fetch()) 
          {
                      
            echo '<a href="CHITIETSP1.php?ID='.$row['masp'].'"><li>
                    <img src="ANHSP/'.$row['tenanh'].'">
                    '.$row['tensp'].'<br>
                    <span>Đánh giá: '.$row['danhgia'].'</span>
                    <p>'.number_format($row['gia'] ,0 ,'.' ,'.').' đ'.'</p>
                  </li></a>';

          }
        ?>
           

        </ul>
</div>

  <script>
    var myIndex = 0;
    carousel();

    function carousel()//chạy slide
    {
      var i;
      var x = document.getElementsByClassName("mySlides");
      for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
      }
      myIndex++;
      if (myIndex > x.length) {myIndex = 1}    
      x[myIndex-1].style.display = "block";  
      setTimeout(carousel, 2000); 
    }
  </script>
</body>
</html>
<?php
  include 'END.php';
?>