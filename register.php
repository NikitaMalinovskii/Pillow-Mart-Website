<?php 
    session_start();
    if($_SESSION['user']){
        header('Location: ./index.php');
    }
    include './header.php';
?>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form action="./database/Register.php" method="post">
                            <div class="group-input">
                                <label for="username">Username *</label>
                                <input type="text" id="username" name="username" required>
                            </div>
                            <div class="group-input">
                                <label for="username">Email address *</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                            <div class="group-input">
                                <label for="pass">Password *</label>
                                <input type="password" id="password" name="password" required>
                            </div>
                            <div class="group-input">
                                <label for="con-password">Confirm Password *</label>
                                <input type="password" id="con-password" name="con-password" required>
                            </div>
                            <div class="group-input">
                                <label class="msg">
                                    <?php 
                                        if($_SESSION['msg']) echo $_SESSION['msg'];;
                                        unset($_SESSION['msg']); 
                                    ?>
                                </label>
                                
                            </div>
                            <button type="submit" class="site-btn register-btn">REGISTER</button>
                        </form>
                        <div class="switch-login">
                            <a href="./login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
<?php include './footer.php'; ?>