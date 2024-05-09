<?php 
    session_start();
    include('../../admincp/config/config.php'); 
    $id_khachhang =$_SESSION['id_khachhang'];
    $thanhtien = $_GET['tongtien'];
    $mathanhtoan =rand(0,9999);
    $insert_cart ="INSERT INTO tbl_giohang(id_khachhang,ma_thanhtoan,tongtien) VALUES ('".$id_khachhang."','".$mathanhtoan."','".$thanhtien."')";
    $cart_query =mysqli_query($mysqli,$insert_cart);

    if($cart_query){
        //thêm vào giỏ hàng chi tiết
        foreach($_SESSION['cart'] as $key => $value ){
            $id_sanpham =$value['id'];
            $soluong = $value['soluong'];

            $query_cart_detail ="INSERT INTO tbl_chitiet_giohang(ma_thanhtoan,id_sanpham,soluongmua) VALUES('".$mathanhtoan."','".$id_sanpham."','".$soluong."')";
            $detail_cart_query = mysqli_query($mysqli,$query_cart_detail);
        }
        if($detail_cart_query){
            echo "<script>alert('Thanh toán thành công.Cảm ơn bạn đã mua hàng'); window.location='../../index.php'</script>";
            unset($_SESSION['cart']);
            exit();
        }
    }
?>