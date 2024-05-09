<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

</style>
</head>
<body>
    <center>
        <h3 style="font-size: 22px; margin-top: 10px;color: #ff7175;">DANH SÁCH GIỎ HÀNG</h3>
    </center>
    <?php 
         if(isset($_SESSION['cart'])){
            $i=0;
            $tongtien =0;
    ?>
    <table>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Số lượng</th>
            <th>Giá sản phẩm</th>
            <th>Thành tiền</th>
            <th></th>
        </tr>
        <?php 
            foreach($_SESSION['cart'] as $cart_item){
                $thanhtien =$cart_item['soluong'] * $cart_item['giasp'];
                $tongtien +=$thanhtien;
                $i++;
        ?>
        <tr>
            <td><?php echo $i ?></td>
            <td><?php echo $cart_item['tensanpham'] ?></td>
            <td><img style="width:100px;" src="admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>"/></td>
            <td><?php echo $cart_item['soluong'] ?></td>
            <td><?php echo number_format($cart_item['giasp'],0,',','.').'đ'?></td>
            <td><?php echo number_format($thanhtien,0,',','.').'đ'?></td>
            <td><a href="pages/main/themgiohang.php?id_sanphamxoa=<?php echo $cart_item['id']?>">Xóa</a></td>
        </tr>
       <?php 
            }
        ?>
        <tr>
            <td style="border:none;" colspan="3">
                <span style="color: #ff7175; font-weight:600;">Tổng tiền:</span> <?php echo number_format($tongtien,0,',','.').'đ'?>
            </td>
            <td style="border:none;" colspan="4">
                <a href="pages/main/thanhtoan.php?tongtien=<?php echo $tongtien ?>" class="btn-add" style="border:none;float: right;">THANH TOÁN</a>
            </td>
       </tr>
       </table>
        <?php
            }else{
        ?>
        <p>Hiện tại không có sản phẩm nào trong giỏ hàng</p>
       <?php 
        }
       ?>
</body>
</html>

