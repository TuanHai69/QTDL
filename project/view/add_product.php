<?php
    $random = strtoupper(substr(md5(mt_rand()), 0, 8));

?>
<hr>
<h2 class="text-dark">Chi tiết sản phẩm</h2>
<hr>
<div class="container">
    <div class="row">
        <hr>
        <div class="col-12">
            <form class="row" action="index.php?act=add_SP" method="post" >
                <div class="col-12">
                    <div id="All" class="tabcontent">
                        <table class="table">
                            <thead>
                                <input type="hidden" name="IDSP" value='<?= $random ?>'>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-center " scope="row" colspan="3">Tên sản phẩm:</th>
                                    <td colspan="4">
                                        <textarea class="mt-2" name="tenSP" cols="40" rows="1" required></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row" colspan="3">Mô tả: </th>
                                    <td colspan="4">
                                        <textarea required class="mt-2" name="mota" cols="40" rows="1"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row" colspan="3">số lượng: </th>
                                    <td colspan="4">
                                        <input required type="number" name="soluong" id="soluong" placeholder="nhập vào số lượng">
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row" colspan="3">size :</th>
                                    <td colspan="4">
                                        <select required name="size">
                                            <option value="NOO">Không có Giá trị cụ thể</option>
                                            <option value="SM">SM</option>
                                            <option value="M">M</option>
                                            <option value="L">L</option>
                                            <option value="XL">XL</option>
                                            <option value="XXL">XXL</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-center" scope="row" colspan="3">Giá :</th>
                                    <td colspan="4">
                                        <input required type="number" name="price" id="price" placeholder="Nhập vào số tiền">
                                    </td>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                    <th colspan="3">
                                        <a class="Nutbam nav-link bg-danger text-light text-center"
                                            href="index.php?act=homepage">Hủy</a>
                                    </th>
                                    <td colspan="4">
                                        <button class="Nutbam bg-primary  text-white" type="submit" name="submit">
                                            Xác nhận
                                        </button>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
<hr>