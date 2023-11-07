<div class="container">
    <hr>
    <div class="row bodylog">
        <div class="form-box">
            <div>
                <form action="index.php?act=login" method="POST">
                    <h2 class="head-text">Đăng nhập</h2>
                    <div class="input-box">
                        <input type="text" id="email" name="email" placeholder="nhập vào email">
                        <i class="fa-solid fa-user box-email-lock"></i>
                    </div>
                    <div class="input-box">
                        <input type="password" id="passwd" name="password" placeholder="Mật khẩu">
                        <i class="fa-solid fa-lock box-email-lock"></i>
                    </div>
                    <div class="forget">
                        <label for=""><input type="checkbox">Remember Me /<a href="#">Quên mật khẩu</a></label>
                    </div>
                    <button class="Nutbam" type="submit" name="submit">Đăng Nhập</button>
                    <div class="register">
                        <p>Tôi chưa có tài khoản <a href="index.php?act=dangky">Đăng ký</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
</div>
