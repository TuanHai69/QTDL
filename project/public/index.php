<?php
    include '../xuly/db_connect.php';
    include '../view/head.php';
    session_start();


    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'dangnhap':
                include '../view/header.php';
                include '../view/login.php';
                include '../view/footer.php';
                break;
            case 'login':
                include '../xuly/login.php';
                break;
            case 'profile':
                include '../view/header.php';
                include '../view/profile.php';
                include '../view/footer.php';
                break;
            case 'edit_profile':
                include '../view/header.php';
                include '../view/edit_profile.php';
                include '../view/footer.php';
                break;
            case 'update_profile':
                include '../xuly/update_profile.php';
                break;
            case 'view_account':
                include '../view/header.php';
                include '../view/view_account.php';
                include '../view/footer.php';
                break;
            //Với case act=product_detail thì hiển thị trang chi tiết sản phẩm
            case 'product_detail':
                include '../view/header.php';
                include '../view/product_detail.php';
                include '../view/footer.php';
                break;
            //Với case act=delete_product thì chuyển sang trang code xử lý xóa sản phẩm
            case 'delete_product':
                include '../xuly/delete_product.php';
                break;
            //Với case act=update_product thì hiển thị trang cập nhật sản phẩm
            case 'update_product':
                include '../view/header.php';
                include '../view/update_product.php';
                include '../view/footer.php';
                break;
            //Với case act=code_update_product thì chuyển sang trang code xử lý cập nhật sản phẩm
            case 'code_update_product';
                include '../xuly/code_update_product.php';
                break;
            //Với case act=add_cart thì chuyển sang trang code xử lý thêm vào giỏ hàng
            case 'add_cart';
                include '../xuly/add_cart.php';
                break;
            case 'update_level':
                include '../xuly/updatecapdo.php';
                break;
            case 'logout':
                unset($_SESSION['user']);
                $_SESSION['capdo']='0';
                include "../view/header.php";
                include '../xuly/xapxepdefault.php';
                include "../view/home.php";
                include '../view/footer.php';
                break;
            case 'dangky':
                include '../view/header.php';
                include '../view/register.php';
                include '../view/footer.php';
                break;
            case 'register':
                include '../xuly/register.php';
                break;
            case 'homepage':
                include '../view/header.php';
                include '../xuly/xapxepdefault.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;
            case 'search':
                include '../view/header.php';
                include '../xuly/search.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;            
            case 'TenAtoiZ':
                include '../view/header.php';
                include '../xuly/TenAtoiZ.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;
            case 'TenZveA':
                include '../view/header.php';
                include '../xuly/TenZveA.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;
            case 'GiaTang':
                include '../view/header.php';
                include '../xuly/GiaTang.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;
            case 'GiaGiam':
                include '../view/header.php';
                include '../xuly/GiaGiam.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;            
            case 'add_product':
                include '../view/header.php';
                include '../view/add_product.php';
                include '../view/footer.php';
                break;
            case 'add_SP':
                include '../xuly/add_product.php';
                break;
            case 'cart':
                include '../view/header.php';
                include '../view/cart.php';
                include '../view/footer.php';
                break;
            case 'checkout':
                include '../view/header.php';
                include '../view/checkout.php';
                include '../view/footer.php';
                break;  
            default:
                include '../view/header.php';
                include '../xuly/xapxepdefault.php';
                include '../view/home.php';
                include '../view/footer.php';
                break;
        }
    } else {
        $_SESSION['capdo']='0';
        include '../view/header.php';
        include '../xuly/xapxepdefault.php';
        include '../view/home.php';
        include '../view/footer.php';
    }

?>