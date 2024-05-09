<?php 
    $sql_danhmuc ='SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC';
    $query_danhmuc =mysqli_query($mysqli,$sql_danhmuc);
?>

<div class="list">
                <div class="list-group" style="text-transform: uppercase !important;">
                    <a href="" class="list-group-item list-group-item-action active">
                      DANH MỤC SẢN PHẨM
                    </a>
                    <?php 
                        while($row_danhmuc = mysqli_fetch_array($query_danhmuc)){
                    ?>
                      <a href="#<?php echo $row_danhmuc['id_danhmuc'] ?>" class="list-group-item list-group-item-action"><?php echo $row_danhmuc['tendanhmuc'] ?></a>
                    <?php 
                        }
                    ?>
                  </div>
            </div>
      <div class="img-banner">
      </div>