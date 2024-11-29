<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login</title>


    <?php include("./css.php") ?>
</head>

<body class="bg-info-subtle">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-4 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-4 d-none bg-login-image"></div>
                            <div class="col">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="text-gray-900 mb-4">Dive In</h1>
                                    </div>
                                    <form class="user">
                                        <div class="form-group">
                                            <input type="account" class="form-control form-control-user"
                                                id="exampleInputAccount" aria-describedby="accountHelp"
                                                placeholder="帳號(Account)">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="密碼(Password)">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">記住我</label>
                                            </div>
                                        </div>
                                        <a href="index.php" class="btn btn-primary btn-user btn-block">
                                            登入
                                        </a>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">忘記密碼?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.html">註冊帳號</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php include("./js.php") ?>
</body>

</html>