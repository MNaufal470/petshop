<?php
$session = session();
$fail = $session->getFlashdata('fail');
$success = $session->getFlashdata('success');
$username_error = $session->getFlashdata('username_error');
$password_error = $session->getFlashdata('password_error');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png"
        href="https://cdn.shopify.com/s/files/1/0641/5187/9935/files/fav-icon_16x16.png?v=1652338819" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <title>Petshopqu | Petshop 2022</title>
</head>

<body>
    <div class="login">
        <?php if($success) : ?>
        <div class="alert alert-success" role="alert">
            <?= $success ?>
        </div>
        <?php endif ?>
        <div class="loginPage text-center">
            <div class="divlogo"><img
                    src="//cdn.shopify.com/s/files/1/0641/5187/9935/files/footer_logo_x152@2x.png?v=1651638489" alt=""
                    class="mb-3">
                <div class="textLogo text-center">
                    <p class="text-light">Sign in and discover a our newest product.</p>
                    <p class="text-light">58 Mutiara Street, Jakarta Timur</p>
                </div>
                <div class="mt-1">
                    <ul class="ulLogin">
                        <li><i class="ri-instagram-fill iconSocial"></i></li>
                        <li><i class="ri-facebook-fill iconSocial"></i></li>
                        <li><i class="ri-twitter-fill iconSocial"></i></li>
                        <li><i class="ri-youtube-fill iconSocial"></i></li>
                    </ul>
                </div>
            </div>
            <form action="/Auth/Check" method="post" class="inputForm">
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <h1 class="titleLogin">Login</h1>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input type="text"
                            class="inputLogin <?= $fail || $username_error || $password_error ?  "is-invalid" : "" ?>"
                            id="staticEmail" placeholder="Enter Your Username" name="username" autocomplete="off">
                        <div class="invalid-feedback text-start">
                            <?= $username_error ? $username_error:"" ?>
                            <?= $fail ? $fail['username'] :""  ?>
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <div class="col-sm-10">
                        <input type="password"
                            class="inputLogin  <?= $fail || $username_error || $password_error ?  "is-invalid" : "" ?>"
                            id="staticEmail" placeholder="Enter Your Password" name="password">
                        <div class="invalid-feedback text-start">
                            <?= $password_error ? $password_error :"" ?>
                            <?= $fail ? $fail['password'] :""  ?>
                        </div>
                    </div>
                </div>
                <div class="mt-4 row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btnLogin">Sign In</button>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-10 text-start">
                        <p class="text-light">New here ? <a href="/Auth/Register" class="btnRegist">Create Account</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>