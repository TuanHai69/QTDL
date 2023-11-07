<div class="container">
    <hr>
    <div class="row bodylog">
        <div class="form-box" style="height: 690px;">
            <div>
                <form action="index.php?act=register" method="post" >
                    <h2>Đăng ký</h2>
                    <div class="input-box">
                        <input type="text" id="username" name="username" required placeholder="Họ và tên">
                        <i class="fa-solid fa-user box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="email" id="email" name="email" required placeholder="Email:">
                        <i class="fa-solid fa-envelope box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" id="sdt" name="sdt" required placeholder="Số điện thoại">
                        <i class="fa-solid fa-envelope box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="text" id="diachi" name="diachi" required placeholder="Địa chỉ">
                        <i class="fa-solid fa-envelope box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="passwd" required name="password" placeholder="Mật khẩu:">
                        <i class="fa-solid fa-lock box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="passwd1" required name="password_confirm" placeholder="Nhập lại mật khẩu">
                        <i class="fa-solid fa-lock box-email-lock"></i>
                    </div>
                    <div class="Terms-Policies">
                        <label for=""> <input type="checkbox" required> <a href="#">Chính
                                sách</a> / <a href="#">Điều
                                khoản</a></label>
                    </div>
                    <button class="Nutbam" type="submit" name="submit">Đăng Ký</button>
                    <div class="register">
                        <p>Đã có tài khoản <a href="index.php?act=dangnhap">Đăng nhập</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>
