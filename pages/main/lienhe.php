<?php 
  if(isset($_POST['gui_ttlienhe'])){
      $hoten=$_POST['hoten'];
      $email=$_POST['email'];
      $sodt =$_POST['sodt'];
      $noidung =$_POST['noidung'];
      $sql_lienhe="INSERT INTO tbl_lienhe(ten_khachhang,email,sodt,noidung) VALUES('".$hoten."','".$email."','".$sodt."','".$noidung."')";
      $query_lienhe=mysqli_query($mysqli,$sql_lienhe);
      if($query_lienhe){
        echo "<script>alert('Cảm ơn bạn đã gửi góp ý cho chúng tôi.Chúng tôi sẽ gửi phản hồi cho bạn trong thời gian sớm nhất');</script>";
      }
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form liên hệ</title>
  </head>
  <link rel="stylesheet" href="./css/lienhe.css" />

  <body>
    <?php 
         if(isset($_SESSION['id_khachhang'])){
            $id_khachhang= $_SESSION['id_khachhang'];
            $sql = "SELECT * FROM tbl_dangky WHERE id_khachhang ='".$id_khachhang."'";
            $query = mysqli_query($mysqli, $sql);
            $row= mysqli_fetch_array($query);
            if(isset($row)){
    ?>
    <center>
        <h3><b style="color:#ff7175;">THÔNG TIN LIÊN HỆ</b></h3>
        <p style="font-size:16px;">Nếu bạn cần giúp, hãy liên hệ với chúng tôi.</p>
    </center>
    <form class="form_lienhe" action="" method="POST">
      <div class="khung50">
        <input
          type="text"
          name="hoten"
          id="hoten"
          value="<?php echo $row['hoten'] ?>"
          placeholder="họ tên của bạn"
        />
        <input type="text" name="email" value="<?php echo $row['email'] ?>" placeholder="email" />
        <input type="text" name="sodt" value="<?php echo $row['sodt'] ?>" placeholder="điện thoại" />
      </div>
      <div class="khung50">
        <textarea
          name="noidung"
          cols="30"
          rows="10"
          placeholder="nội dung"
        ></textarea>
      </div>
      <div>
        <button type="submit" name="gui_ttlienhe">Gửi</button>
      </div>
    </form>
  </body>
  <?php 
            }
         }
  ?>
</html>
