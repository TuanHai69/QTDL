<?php
    $statement1 = $conn->prepare("SELECT * FROM banhang.khachhang WHERE makhachhang not like :user OR makhachhang not like 'KH000001'");
    $statement1->bindParam(':user', $_SESSION['id']);
    $statement1->execute();
    $result1 = $statement1->fetchAll();
    $statement2 = $conn->prepare("SELECT * FROM banhang.khachhang WHERE capdo='1' and makhachhang not like :user AND makhachhang not like 'KH000001' ");
    $statement2->bindParam(':user', $_SESSION['user']);
    $statement2->execute();
    $result2 = $statement2->fetchAll();
    $statement3 = $conn->prepare('SELECT * FROM banhang.khachhang WHERE capdo="0" and makhachhang not like :user');
    $statement3->bindParam(':user', $_SESSION['user']);
    $statement3->execute();
    $result3 = $statement3->fetchAll();
?>
<div class="container">
    <hr>
    <h2 class="text-dark">
        Quản lý tài khoản
    </h2>
    <hr>
    <button class="tablink" onclick="openPage('Home', this, 'gray')" id="defaultOpen">All acounts</button>
    <button class="tablink" onclick="openPage('News', this, 'gray')">Admin accounts</button>
    <button class="tablink" onclick="openPage('Contact', this, 'gray')">client acounts</button>
    <!-- <button class="tablink" onclick="openPage('About', this, 'gray')">About</button> -->

    <div id="Home" class="tabcontent">
        <h3>All acounts</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Têm khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Level account</th>
                    <th>Quyền admin</th>
                    <th>Cập nhật quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result1 as $row): ?>
                <tr>
                    <td><?=htmlspecialchars($row['tenkhachhang'])?></td>
                    <td><?=htmlspecialchars($row['email'])?></td>
                    <td><?=htmlspecialchars($row['sodienthoai'])?></td>
                    <td><?=htmlspecialchars($row['diachi'])?></td>
                    <td><?=htmlspecialchars($row['capdo'])?></td>
                    <form action="index.php?act=update_level" method="post">
                        <?php
                            echo '<input type="hidden" name="userid" value="' . htmlspecialchars($row['makhachhang']) . '">';
                            echo '<input type="hidden" name="password" value="' . htmlspecialchars($row['matkhau']) . '">';
                            echo '<input type="hidden"  value="' . htmlspecialchars($row['capdo']) . '">';                           
                        ?>
                        <td>
                            <select name="level">
                                <?php            
                                    if ($row['capdo'] == '1') {
                                        echo '<option value="1">admin</option>';
                                        echo '<option value="0">client</option>';
                                    }else{
                                        echo '<option value="0">client</option>';
                                        echo '<option value="1">admin</option>';
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="submit">cập nhật </button>
                        </td>
                    </form>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="News" class="tabcontent">
        <h3>Admin accounts</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Têm khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Level account</th>
                    <th>Quyền admin</th>
                    <th>Cập nhật quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result2 as $row): ?>
                <tr>
                    <td><?=htmlspecialchars($row['tenkhachhang'])?></td>
                    <td><?=htmlspecialchars($row['email'])?></td>
                    <td><?=htmlspecialchars($row['sodienthoai'])?></td>
                    <td><?=htmlspecialchars($row['diachi'])?></td>
                    <td><?=htmlspecialchars($row['capdo'])?></td>
                    <form action="index.php?act=update_level" method="post">
                        <?php
                            echo '<input type="hidden" name="userid" value="' . htmlspecialchars($row['makhachhang']) . '">';
                            echo '<input type="hidden" name="password" value="' . htmlspecialchars($row['matkhau']) . '">';
                            echo '<input type="hidden" name="level" value="' . htmlspecialchars($row['capdo']) . '">';                           
                        ?>
                        <td>
                            <select name="level">
                                <?php            
                                    if ($row['capdo'] == '1') {
                                        echo '<option value="1">admin</option>';
                                        echo '<option value="0">client</option>';
                                    }else{
                                        echo '<option value="0">client</option>';
                                        echo '<option value="1">admin</option>';
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="submit">cập nhật </button>
                        </td>
                    </form>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>

    <div id="Contact" class="tabcontent">
        <h3>client acounts</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Têm khách hàng</th>
                    <th>Email</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Level account</th>
                    <th>Quyền admin</th>
                    <th>Cập nhật quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($result3 as $row): ?>
                <tr>
                    <td><?=htmlspecialchars($row['tenkhachhang'])?></td>
                    <td><?=htmlspecialchars($row['email'])?></td>
                    <td><?=htmlspecialchars($row['sodienthoai'])?></td>
                    <td><?=htmlspecialchars($row['diachi'])?></td>
                    <td><?=htmlspecialchars($row['capdo'])?></td>
                    <form action="index.php?act=update_level" method="post">
                        <?php
                            echo '<input type="hidden" name="userid" value="' . htmlspecialchars($row['makhachhang']) . '">';
                            echo '<input type="hidden" name="password" value="' . htmlspecialchars($row['matkhau']) . '">';
                            echo '<input type="hidden" name="level" value="' . htmlspecialchars($row['capdo']) . '">';                           
                        ?>
                        <td>
                            <select name="level">
                                <?php            
                                    if ($row['capdo'] == '1') {
                                        echo '<option value="1">admin</option>';
                                        echo '<option value="0">client</option>';
                                    }else{
                                        echo '<option value="0">client</option>';
                                        echo '<option value="1">admin</option>';
                                    }
                                ?>
                            </select>
                        </td>
                        <td>
                            <button type="submit" name="submit">cập nhật </button>
                        </td>
                    </form>

                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <script src="../js/nav.js"></script>
    <hr>
</div>