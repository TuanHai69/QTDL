<?php
    $statemet = $conn->prepare("SELECT * FROM banhang.giaohang join banhang.donhang on giaohang.sodonhang = donhang.sodonhang WHERE donhang.makhachhang =:ma ");
    $statemet->bindParam(':ma',$_SESSION['id']);
    $statemet->execute();
    $result = $statemet->fetchALL();
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col-2">Tên sản phẩm</th>
                        <th></th>
                        <th scope="col">Giá</th>
                        <th scope="col"></th>
                        <th scope="col">
                            <?php
                        if ($_SESSION['capdo']==1){
                            echo '<a href="index.php?act=add_product">Thêm sản phẩm</a>';
                        }
                    ?>

                        </th>
                        <th scope="col">
                            <?php
                        // if ($_SESSION['capdo']==1){
                        //     echo '<a href="index.php?act=add_product">Xóa sản phẩm</a>';
                        // }                        
                    ?>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ( $results as $result ): ?>
                    <tr>
                        <th scope="row"><?= $i=$i+1 ?></th>
                        <td><?= htmlspecialchars($result['tensanpham'])?></td>
                        <td></td>
                        <td><?= htmlspecialchars($result['giaca'])?></td>
                        <td></td>
                        <form action="index.php?act=checkout" method="post">
                            <input type="hidden" name="masanpham" value=<?= htmlspecialchars($result['masanpham'])?>>
                            <td><button class="btn btn-info" type="submit" name="thanhtoan">Mua ngay</button></td>
                        </form>
                        <form action="index.php?act=add_cart" method="post">
                            <input type="hidden" name="makhachhang" value="<?=$_SESSION['id']?>">
                            <input type="hidden" name="masanpham" value="<?=htmlspecialchars($result["masanpham"])?>">
                            <input type="hidden" name="tensanpham" value="<?=htmlspecialchars($result["tensanpham"])?>">
                            <input type="hidden" name="giaca" value="<?=htmlspecialchars($result["giaca"])?>">
                            <td><button type="submit" name="add_cart" class="btn btn-info">Thêm vào giỏ hàng</button>
                            </td>
                        </form>

                        <form action="index.php?act=product_detail" method="post">
                            <input type="hidden" name="masanpham" value=<?= htmlspecialchars($result['masanpham'])?>>
                            <td><button class="btn btn-info" name="product_detail" type="submit">Xem chi tiết</button>
                            </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>

</div>