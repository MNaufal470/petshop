<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petshopqu | 2022</title>
    <link rel="shortcut icon" type="image/png"
        href="https://cdn.shopify.com/s/files/1/0641/5187/9935/files/fav-icon_16x16.png?v=1652338819" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-transparent fixed-top" id="nav">
            <div class="container justifyBetween">
                <div>
                    <a class="navbar-brand" href="/Home"><img
                            src="//cdn.shopify.com/s/files/1/0641/5187/9935/files/logo.png?v=1651472821" alt=""></a>
                </div>
                <div class="listNavbar">
                    <a href="/Home/MyOrder" class="logoutIcon">My Order<i
                            class="ri-notification-3-fill text-2xl"></i></a>
                    <a href="/Home/Checkout" class="logoutIcon">Cart<i class="ri-shopping-cart-fill text-2xl"></i></a>
                    <div class="dropdown">
                        <a class=" dropdown-toggle logoutIcon text-capitalize" href="#" role="button"
                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            Hi, <?=session('loggedUser') ?>
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item mb-1 d-flex align-items-center gap-x-2"
                                    href="/Home/MyProfile/<?=session('loggedUser') ?>"><i
                                        class="ri-account-circle-line"></i>
                                    My Profile
                                </a></li>
                            <hr class="p-0 m-0">
                            <li><a class="dropdown-item d-flex align-items-center gap-x-2 mt-1" href="/Auth/Logout"><i
                                        class="ri-logout-circle-r-line  "></i>
                                    Logout</a></li>
                        </ul>
                    </div>
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <?= $this->renderSection('content'); ?>
    <footer>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,96L48,128C96,160,192,224,288,218.7C384,213,480,139,576,90.7C672,43,768,21,864,64C960,107,1056,213,1152,218.7C1248,224,1344,128,1392,80L1440,32L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
            </path>
        </svg>
        <div class="container">
            <div class="footerContent">
                <div class="footerItem-l">
                    <img src="//cdn.shopify.com/s/files/1/0641/5187/9935/files/footer_logo_x152@2x.png?v=1651638489"
                        alt="">
                    <div class="footerDesc">
                        <span>No: 58 A, East Madison Street,<br>
                            Baltimore, MD, USA 4508</span>
                        <span class="mt-5">+021 1234566</span>
                        <span>petshopqu@gmail.com</span>
                        <ul class="ul-social mt-3 ">
                            <li><i class="ri-instagram-fill iconSocial"></i></li>
                            <li><i class="ri-facebook-fill iconSocial"></i></li>
                            <li><i class="ri-twitter-fill iconSocial"></i></li>
                            <li><i class="ri-youtube-fill iconSocial"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="footerItem-r">
                    <div class="subscribeForm">
                        <input type="text" class="subscribe" placeholder="Your Email Here">
                        <button>Subscribe</button>
                    </div>
                    <label>Join our list and get 15% off your first purchase</label>

                    <div class="useContainer  mt-5">
                        <div class="useItem">
                            <span>Help</span>
                            <ul class="ulUse">
                                <li>Search</li>
                                <li>Help</li>
                                <li>information</li>
                                <li>Privacy Policy</li>
                                <li>Shipping Details</li>
                            </ul>
                        </div>
                        <div class="useItem">
                            <span>Support</span>
                            <ul class="ulUse">
                                <li>Cancellation</li>
                                <li>Payment</li>
                                <li>Careers</li>
                                <li>Refunds & Returns</li>
                                <li>Deliveries</li>
                            </ul>
                        </div>
                        <div class="useItem">
                            <span>Information</span>
                            <ul class="ulUse">
                                <li>Gallery</li>
                                <li>Advanced Search</li>
                                <li>Portfolio</li>
                                <li>Store Location</li>
                                <li>Orders & Returns</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="copyright">
            <span>© 2022 Petshopqu</span>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script>
    function scrollChange() {
        const change = document.getElementById("nav");
        // When the scroll is greater than 50 viewport height, add the scroll-header class to the header tag
        if (this.scrollY >= 50) change.classList.add("scroll-header");
        else change.classList.remove("scroll-header");
    }
    window.addEventListener("scroll", scrollChange);
    </script>
</body>

</html>