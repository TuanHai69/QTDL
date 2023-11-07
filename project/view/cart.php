<?php
    $statement = $conn->prepare("SELECT * FROM banhang.giohang");
    $statement->execute();
    $i = 0;
?>
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
                                                        <th scope="col">Mã sản phẩm</th>
                                                        <th scope="col">Số lượng</th>
                                                        <th scope="col">Giá</th>
                                                        <th scope="col" class="text-right">Tổng giá</th>
                                                        <th scope="col">Xóa</th>   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php while($results = $statement->fetch(PDO::FETCH_ASSOC)) {?>
                                                    <tr>
                                                        <th scope="row"><?=$i=$i+1;?></th>
                                                        
                                                        <td><?php echo $results["tensanpham"]?></td>
                                                        <td><?php echo $results["masanpham"]?></td>
                                                        <td>
                                                            <div class="form-group mb-0">
                                                                <input type="number" class="form-control cart-qty" name="cartQty1" id="cartQty1" value="<?php echo $results["soluong"]?>">
                                                            </div>
                                                        </td>
                                                        <td><?php echo number_format($results["giaca"])?></td>
                                                        <td class="text-right">$500</td>
                                                        <td><a href="#" class="text-danger"><i class="ri-delete-bin-3-line"></i></a></td>
                                                    </tr>
                                                    <?php }?>
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
                                                            <textarea class="form-control" name="specialNotes" id="specialNotes" rows="3" placeholder="Nhập lời nhắn của bạn"></textarea>
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
                                                                <td>200.000đ</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Phí ship</td>
                                                                <td>$0.00</td>
                                                            </tr>
                                                           
                                                            <tr>
                                                                <td class="f-w-7 font-18"><h4>Tổng cộng</h4></td>
                                                                <td class="f-w-7 font-18"><h4>200.000đ</h4></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-footer text-right">
                                        <button type="button" class="btn btn-info my-1"><i class="ri-save-line mr-2"></i>Sản phẩm khác</button>
                                        <a href="page-checkout.html" class="btn btn-success my-1">Thanh toán<i class="ri-arrow-right-line ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End col -->
        </div>
        <!-- End row -->
    </div>
    </div>