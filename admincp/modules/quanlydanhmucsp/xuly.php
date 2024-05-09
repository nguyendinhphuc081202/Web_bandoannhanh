<?php 
    $tendanhmuc = $_POST["tendanhmuc"];
    $thutu = $_POST["thutu"];

    if(isset($_POST["themdanhmuc"])){
        $sql_them ="INSERT INTO tbl_danhmuc(tendanhmuc,thutu) VALUES('".$tendanhmuc."','".$thutu."')";
        mysqli_query($mysqli,$sql_them);
        //chuyển hướng người dùng tới trang khác sau khi thêm thành công
        header("Location:../../index.php?action=quanlydanhmucsanpham&query=them");
    } 
    elseif(isset($_POST["suadanhmuc"])){
        $sql_update ="UPDATE tbl_danhmuc SET tendanhmuc = '".$tendanhmuc."', thutu ='".$thutu."' WHERE id_danhmuc = '".$_GET['iddanhmuc']."'";
        mysqli_query($mysqli,$sql_update);
        header("Location:../../index.php?action=quanlydanhmucsanpham&query=lietke");
    }
    elseif(isset($_GET['query']) =='xoa'){
        $id =$_GET['iddanhmuc'];
        $sql_xoa = "DELETE FROM tbl_danhmuc WHERE id_danhmuc = '".$id."'";
        mysqli_query($mysqli,$sql_xoa);
        header("Location:../../index.php?action=quanlydanhmucsanpham&query=lietke");
    }
    
?>