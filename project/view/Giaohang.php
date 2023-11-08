<?php
    if (isset($_SESSION['user'])){
        if ($_SESSION['capdo'] == 1){
            include '../xuly/xulygiaohang.php';
        }else{
            include '../xuly/giaohang.php';
        }
    }else{
        header('Location: index.php?act=homepage');
    }
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col-2">Mã Giao hàng</th>
                        <th scope="col">Mã đơn hàng</th>
                        <th scope="col">Địa chỉ giao</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                        <th scope="col">Tiến trình giao hàng</th>
                        <?php
                            if ($_SESSION['capdo'] == 1){
                                echo '<th scope="col">Xác nhận</th>';
                            }else{
                                echo '<th scope="col"></th>';
                            }
                        ?>
                        
                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach ( $results as $result ): ?>
                    <tr>
                        <th scope="row"><?= $i=$i+1 ?></th>
                        <td><?= htmlspecialchars($result['magiaohang'])?></td>
                        <td><?= htmlspecialchars($result['sodonhang'])?></td>
                        <td><?= htmlspecialchars($result['diachigiao'])?></td>
                        <td></td>
                        <td></td>
                            <?php
                                if($_SESSION['capdo'] == 1){
                                    echo '<form action="index.php?act=capnhattientrinh" method="post">';
                                    echo '<td>';
                                    echo '<input type="hidden" name="magh" value=';
                                    echo htmlspecialchars($result['magiaohang']);
                                    echo '>';
                                    echo '<select name="tientrinh">';
                                    if ($result['tientrinhgiao'] == 'đang vận chuyển'){
                                        echo '<option value="đang vận chuyển">đang vận chuyển</option>';
                                        echo '<option value="đã giao">đã giao</option>';
                                    }else{
                                        echo '<option value="đã giao">đã giao</option>';
                                        echo '<option value="đang vận chuyển">đang vận chuyển</option>';
                                    }
                                    echo '</select>';
                                    echo '</td>';
                                    echo '<td>';

                                    echo '<button type="submit" name="submit"><i class="fa fa-check"></i></button>';
                                    echo '</td>';
                                    echo '</form>';
                                }else{
                                    echo '<td>';
                                    echo htmlspecialchars($result['tientrinhgiao']);
                                    echo '</td>';
                                }
                                
                            ?>
                        </td>
                        <td></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

        </div>

    </div>

</div>