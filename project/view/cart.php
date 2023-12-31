<div class="container">
    <div class="contentbar">
        <!-- Start row -->
        <div class="row">
            <!-- Start col -->
            <div class="col-md-12 col-lg-12 col-xl-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Giỏ hàng</h5>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-lg-10 col-xl-8">
                                <div class="cart-container">
                                    <div class="cart-head">
                                        <div class="table-responsive">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>

                                                        <th scope="col">Sản phẩm</th>
                                                        <th scope="col">Mã SP</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Giá</th>
                                                        <th scope="col" class="text-right">Tổng</th>
                                                        <th scope="col">Cập nhật</th>
                                                        <th scope="col">Xóa</th>

                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach ($results as $result): ?>
                                                    <tr>
                                                        <th scope="row"><?=$i=$i+1;?></th>

                                                        <td><?= htmlspecialchars($result["tensanpham"]  )?></td>
                                                        <td><?= htmlspecialchars($result["masanpham"]  )?></td>
                                                    <form action="index.php?act=updateslsp" method="post">
                                                            <input type="hidden" name="ma"
                                                                value=<?=htmlspecialchars($result['masanpham'])?>>
                                                            <input type="hidden" name="magh"
                                                                value=<?= htmlspecialchars($result['magiohang'])?>>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                                <input type="number" class="form-control cart-qty"
                                                                    name="sl" id="cartQty1"
                                                                    value="<?= htmlspecialchars($result["soluong"]  )?>">
                                                            </div>
                                                        </td>

                                                        <td><?php echo number_format($result["giaca"])?></td>

                                                        <td class="text-right">
                                                            <?= $subtotal = $result["giaca"]*$result["soluong"]; $total+=$subtotal; ?>
                                                        </td>
                                                        <td>
                                                            <button name="submit" type="submit"><i class="fa fa-check"></i></button>
                                                        </td>
                                                        </form>
                                                        <td>
                                                            <form action="index.php?act=cart_remove" method="POST">
                                                                <input type="hidden" name="ma"
                                                                    value=<?=htmlspecialchars($result['masanpham'])?>>
                                                                <input type="hidden" name="magh"
                                                                    value=<?= htmlspecialchars($result['magiohang'])?>>
                                                                <button class="text-danger" name="submit"><i
                                                                        class="ri-delete-bin-3-line"></i></button>
                                                            </form>
                                                        </td>

                                                    </tr>
                                                    <?php endforeach ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="cart-body">
                                        <div class="row">
                                            <div class="col-md-12 order-2 order-lg-1 col-lg-5 col-xl-6">
                                                <div class="order-note">
                                                    <form>

                                                        <div class="form-group">
                                                            <label for="specialNotes">Ghi chú đơn hàng:</label>
                                                            <textarea class="form-control" name="specialNotes"
                                                                id="specialNotes" rows="3"
                                                                placeholder="Nhập lời nhắn của bạn"></textarea>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="col-md-12 order-1 order-lg-2 col-lg-7 col-xl-6">
                                                <div class="order-total table-responsive ">
                                                    <table class="table table-borderless text-right">
                                                        <tbody>
                                                            <tr>
                                                                <td>Tạm tính</td>
                                                                <td><?= $total ?></td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phí ship</td>
                                                                <td>30.000đ</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="f-w-7 font-18">
                                                                    <h4>Tổng cộng</h4>
                                                                </td>
                                                                <td class="f-w-7 font-18">
                                                                    <h4><?= $total +30000 ?></h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class='row justify-content-start'>
                            <a class="btn btn-info my-1 col-3 offset-3" href="index.php?act=homepage"> Sản phẩm
                                khác </a>
                            <a href="index.php?act=checkout" class="btn btn-info offset-1 col-3" role="button">Thêm vào giỏ
                                hàng</a>
                        </div>
                    </div>

                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
</div>