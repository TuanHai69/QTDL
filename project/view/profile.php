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
                <thead>
                    <tr>
                        <th class="text-center" scope="row">chức năng:</th>
                        <td colspan="3"><a href="index.php?act=edit_profile">edit profile</a></td>
                    </tr>
                </thead>
                <tbody>
                    
                    <tr>
                        <th class="text-center" scope="row">Username:</th>
                        <?php
                            echo "<td colspan='3'>";
                            echo htmlspecialchars($result['tenkhachhang']);
                            echo "</td>";
                        ?>
                        
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">Email:</th>
                        <?php
                            echo "<td colspan='3'>";
                            echo htmlspecialchars($result['email']);
                            echo "</td>";
                        ?>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">Địa chỉ</th>
                        <?php
                            echo "<td colspan='3'>";
                            echo htmlspecialchars($result['diachi']);
                            echo "</td>";
                        ?>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">Số điện thoại:</th>
                        <?php
                            echo "<td colspan='3'>";
                            echo htmlspecialchars($result['sodienthoai']);
                            echo "</td>";
                        ?>
                    </tr>
                    <tr>
                        <th class="text-center" scope="row">Password:</th>
                        <?php
                            echo "<td colspan='3'>";
                            echo htmlspecialchars($result['matkhau']);
                            echo "</td>";
                        ?>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>