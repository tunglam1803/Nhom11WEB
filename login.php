<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/login.css">
    <link rel="stylesheet" href="./assets/css/base.css">
</head>
<body>
    <div class="modal">
        <div class="modal__overlay"></div>
        <div class="modal__body">
            <!-- Login form -->
            <form action="" method="post">
                <div class="auth__form">
                    <div class="auth-form__container">
                        <div class="auth-form__header">
                            <h3 class="auth-form__heading">Đăng nhập</h3>
                            <a href="http://localhost:8090/websitedautay/rigiter.php" class="auth-form__switch-btn">Đăng ký</a>
                        </div>
        
                        <div class="auth-form__form">
                            <div class="auth-form__group">
                                <input type="text" name="username" class="auth-form__input" placeholder="Tên đăng nhập" value="<?php
                                    if(isset($_POST['username']))
                                        echo $_POST['username']
                                    ?>">
                            </div>
        
                            <div class="auth-form__group">
                                <input type="password" name="password" class="auth-form__input" placeholder="Mật khẩu">
                            </div>
                        </div>
        
                        <div class="auth-form__aside">
                            <div class="auth-form__help">
                                <a href="" class="auth-form__help-link auth-form__help-forgot">Quên mật khẩu</a>
                                <span class="auth-form__help-sep"></span>
                                <a href="" class="auth-form__help-link">Cần trợ giúp?</a>
                            </div>
                        </div>
        
                        <div class="auth-form__control">
                            <button class="btn btn--normal auth-form__control-back">TRỞ LẠI</button>
                            <button type="submit" class="btn btn--primary">ĐĂNG NHẬP</button>
                        </div>
                    </div>

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
    <?php
        if(isset($_POST['username'])&&isset($_POST['password'])) {
            require_once('ketnoi.php');
            $name=$_POST['username'];
            $pass=$_POST['password'];
            $sql= "SELECT * FROM regeter WHERE tk='$name'&&mk='$pass'";
            $result=mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0) {
                header("Location:website.html");
            }
            else if($name==null||$pass==null) {
                echo"vui lòng nhập đủ thông tin";
            }
            else
                echo " sai mật khẩu hoặc tài khoản";   
        }
    ?>
</body>
</html>