<?php
    $statement = $conn->prepare('SELECT * FROM banhang.khachhang WHERE makhachhang=:id');
    $statement->bindParam(':id',$_SESSION['id']);
    $statement->execute();
    $result = $statement->fetch();
?>
<div class="container">
    <hr>
    <h2 class="text-dark">Tài Khoản</h2>
    <div class="row">
        <div class="col-12">
            <!-- Table Starts Here -->
            <table class="table">
                <form action="index.php?act=update_profile" method="post">
                    <thead>
                        <tr>
                            <th class="text-center" scope="row">chức năng:</th>
                            <td colspan="2">
                                <button class="Nutbam bg-primary col-6 text-white" type="submit" name="submit">save
                                    profile
                                </button>
                            </td>
                            <td colspan="2">
                                <a class="Nutbam nav-link bg-primary text-light text-center  p-2"
                                    href="index.php?act=profile">unsave profile</a>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center" scope="row">id:</th>
                            <?php
                                echo '<input type="hidden" name="codeid" value="' . htmlspecialchars($result['makhachhang']) . '">';
                                echo "<td colspan='3'>";
                                echo htmlspecialchars($result['makhachhang']);
                                echo "</td>";
                            ?>

                        </tr>
                        <tr>
                            <th class="text-center" scope="row">Tên khách hàng:</th>
                            <?php
                                echo "<td colspan='3'>";
                                echo "<textarea name='userchange' rows='1' cols='60'>";
                                echo htmlspecialchars($result['tenkhachhang']);
                                echo "</textarea>";
                                echo "</td>";
                            ?>

                        </tr>
                        <tr>
                            <th class="text-center" scope="row">Email:</th>
                            <?php
                                echo "<td colspan='3'>";
                                echo "<textarea name='emailchange' rows='2' cols='60'>";
                                echo htmlspecialchars($result['email']);
                                echo "</textarea>";
                                echo "</td>";
                            ?>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">Số điện thoại:</th>
                            <?php
                                echo "<td colspan='3'>";
                                echo "<textarea name='sdtchange' rows='2' cols='60'>";
                                echo htmlspecialchars($result['sodienthoai']);
                                echo "</textarea>";
                                echo "</td>";
                            ?>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">Địa chỉ:</th>
                            <?php
                                echo "<td colspan='3'>";
                                echo "<textarea name='diachichange' rows='2' cols='60'>";
                                echo htmlspecialchars($result['diachi']);
                                echo "</textarea>";
                                echo "</td>";
                            ?>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">Password:</th>
                            <?php
                                echo "<td colspan='3'>";
                                echo "<textarea name='passwordchange' rows='1' cols='60' placeholder='Nhập vào mật khẩu để thay đổi thông tin tài khoản'>";
                                // echo $result['pass'];
                                echo "</textarea>";
                                echo "</td>";
                            ?>
                        </tr>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>