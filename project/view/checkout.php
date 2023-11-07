<?php 
    require_once __DIR__ .'/../partials/db_connect.php';
    if ($_SERVER['REQUEST_METHOD']== 'POST' && isset($_GET['madonhang'])){
        $query = 'select * from donhang join sanpham on donhang.masanpham = sanpham.masanpham
        join khachhang on donhang.makhachhang = khachhang.makhachhang where madonhang=?' ;
        try {
            $statement = $pdo->prepare($query);
            $statement->execute([$_GET['madonhang']]);
        } catch (PDOException $e) {
            $error_message='không thể lấy dữ liệu';
            $pdo_error = $e->getMessage();
        }}
     
        ?>  
    
     <div class="container mt-4">
      <form class="needs-validation" name="frmthanhtoan" method="post"
          action="#">
          <input type="hidden" name="" value="">

          <div class="py-5 text-center">
              <h2>Thanh toán</h2>
              <p class="lead">Vui lòng kiểm tra thông tin Khách hàng, thông tin Giỏ hàng trước khi Đặt hàng.</p>
          </div>

          <div class="row">
              <div class="col-md-4 order-md-2 mb-4">
                  <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-muted">Giỏ hàng</span>
                  </h4>
                  <ul class="list-group mb-3">

                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                          <div>
                              <h6 class="my-0">Tên SP</h6>
                              <small class="text-muted">Giá x SL</small>
                              <button>x</button>
                          </div>
                          <span class="text-muted">GIá</span>
                      </li>
                     
                
                          
                      <li class="list-group-item d-flex justify-content-between">
                          <span>Tổng thành tiền</span>
                          <strong>xxx</strong>
                      </li>
                  </ul>


                

              </div>
              <div class="col-md-8 order-md-1">
                  <h4 class="mb-3">Thông tin khách hàng</h4>

                  <div class="row">
                      <div class="col-md-12">
                          <label for="kh_ten">Họ tên</label>
                          <input type="text" class="form-control" name="kh_ten" id="kh_ten"
                              value="<?=htmlspecialchars($query->tenkhachhang)?>" >
                      </div>
                      <div class="col-md-12">
                          <label for="kh_diachi">Địa chỉ</label>
                          <input type="text" class="form-control" name="kh_diachi" id="kh_diachi"
                              value="<?=htmlspecialchars($query->diachi)?>" >
                      </div>
                      <div class="col-md-12">
                          <label for="kh_dienthoai">Điện thoại</label>
                          <input type="text" class="form-control" name="kh_dienthoai" id="kh_dienthoai"
                              value="<?=htmlspecialchars($query->sodienthoai)?>" >
                      </div>
                      <div class="col-md-12">
                          <label for="kh_email">Email</label>
                          <input type="text" class="form-control" name="kh_email" id="kh_email"
                              value="<?=htmlspecialchars($query->Email)?>" >
                      </div>
                  </div>

                  
                  <hr class="mb-4">
                  <button class="btn btn-primary btn-lg btn-block" type="submit" name="btnDatHang">Đặt
                      hàng</button>
              </div>
          </div>
      </form>

  </div>