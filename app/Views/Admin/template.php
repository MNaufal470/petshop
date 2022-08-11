<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard | Pertshopqu</title>
    <link rel="shortcut icon" type="image/png"
        href="https://cdn.shopify.com/s/files/1/0641/5187/9935/files/fav-icon_16x16.png?v=1652338819" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>


<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-yellow">
            <div class="container justifyBetween">
                <div>
                    <a class="navbar-brand" href="#"><img
                            src="//cdn.shopify.com/s/files/1/0641/5187/9935/files/logo.png?v=1651472821" alt=""></a>
                </div>
                <div class="" id="navbarNav">
                    <ul class="navbar-nav ">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/Admin">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/Admin/Pelanggan">Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="/Admin/Purchase">Pembelian</a>
                        </li>
                    </ul>
                </div>
                <div class="logoutIcon">
                    <a href="/Auth/Logout" class="logoutIcon"><i class="ri-logout-circle-r-line text-2xl"></i>
                        Logout
                    </a>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>

    <body>
        <?= $this->renderSection('content'); ?>
    </body>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>