<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/regeter.css">
    <link rel="stylesheet" href="./assets/css/base.css">
</head>
<body>
    <div class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__body">

            <!-- ctrl+[], thụt lề -->
            <!-- Register form -->
            <form action="" method="post">
                <div class="auth__form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng ký</h3>
                            <a href="http://localhost:8090/websitedautay/login.php" class="auth-form__switch-btn">Đăng nhập</a>
                        </div>
        
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" name="tk" class="auth-form__input" placeholder="Họ và tên">
                            </div>
                            
                            <div class="auth-form__group">
                                <input type="text" name="dn" class="auth-form__input" placeholder="Tên đăng nhập">
                            </div>

                            <div class="auth-form__group">
                                <input type="text" name="email" class="auth-form__input" placeholder="Email">
                            </div>

                            <div class="auth-form__group">
                                <input type="text" name="phone" class="auth-form__input" placeholder="Số điện thoại">
                            </div>

                            <div class="auth-form__group">
                                <input type="text" name="dc" class="auth-form__input" placeholder="Địa chỉ">
                            </div>
        
                            <div class="auth-form__group">
                                <input type="password" name="mk" class="auth-form__input" placeholder="Mật khẩu">
                            </div>
        
                            <div class="auth-form__group">
                                <input type="password" name="lmk" class="auth-form__input" placeholder="Nhập lại mật khẩu">
                            </div>
                        </div>
        
                        <div class="auth-form__aside">
                            <p class="auth-form__policy-text">
                                Bằng việc đăng ký, bạn đã đồng ý với shop về
                                <a href="" class="auth-form__text-link">
                                    Điều khoản dịch vụ
                                </a> &
                                <a href="" class="auth-form__text-link">
                                    Chính sách bảo mật
                                </a>
                            </p>
                        </div>
        
                        <div class="auth-form__control">
                            <button class="btn btn--normal auth-form__control-back">Trở Lại</button>
                            <button class="btn btn--primary" type="submit">ĐĂNG KÝ</button>
                        </div>
                    </div>
                    <?php
                        if(isset($_POST['tk'])&&isset($_POST['dn'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['dc'])&&isset($_POST['mk'])&&isset($_POST['lmk'])) {
                            require_once('ketnoi.php');
                            $tk=$_POST['tk'];
                            $dn=$_POST['dn'];
                            $email=$_POST['email'];
                            $phone=$_POST['phone'];
                            $dc=$_POST['dc'];
                            $mk=$_POST['mk'];
                            $lmk=$_POST['lmk'];
                            if($tk==null||$dn==null||$email==null||$phone==null||$dc==null||$mk==null||$lmk==null){
                                echo "<script> alert('Vui lòng nhập đủ thông tin') </script>";
                            }
                            else {
                                if($mk==$lmk){
                                    $xuat="SELECT * FROM regeter WHERE tk='$tk'";
                                    $result= mysqli_query($conn,$xuat);
                                    $them="INSERT INTO regeter(tk,dn,email,phone,dc,mk,lmk) value('$tk','$dn','$email','$phone','$dc','$mk','$lmk')";
                                    if(mysqli_num_rows($result)>0) {
                                        echo "<script> alert('Tên Tài khoản đã tồn tại') </script>";
                                    }
                                    else {
                                        if(mysqli_query($conn,$them)) {
                                            echo "<script> alert('Đăng Kí Thành Công') </script>";
                                        }
                                        else {
                                            echo "<script> alert('Đăng Kí Thất Bại!') </script>";
                                        }
                                    }
                                }
                                else
                                    echo "<script> alert('Mật Khẩu Phải Trùng Khớp') </script>";
                            }
                        }
                    ?>

                    <div class="auth-form__socials">
                        <!-- <a href="" class="auth-form__socials--facebook btn btn--size-s btn--with-icon">
                            <i class="auth-form__socials-icon fab fa-facebook-square"></i>
                            <span class="auth-form__socials-title">
                                Kết nối với Facebook
                            </span>
                        </a>

                        <a href="" class="auth-form__socials--google btn btn--size-s btn--with-icon">
                            <i class="auth-form__socials-icon fab fa-google"></i>
                            <span class="auth-form__socials-title">
                                Kết nối với Google
                            </span>
                        </a> -->
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>