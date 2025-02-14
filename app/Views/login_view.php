<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>บริษัท ขนส่ง จำกัด</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/apple-touch-icon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <?= $this->include('template/cssview') ?>
    <!-- =======================================================
  * Template Name: eNno
  * Template URL: https://bootstrapmade.com/enno-free-simple-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">
    <main class="main">
        <!-- Hero Section -->
        <?= $this->include('template/header') ?>
        <!-- Featured Services Section -->
        <section id="" class="section">
            <div class="container">
                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class=" position-relative">
                            <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
                            <h2>Login</h2>
                            <form action="<?= base_url('/login') ?>" method="post">
                                <label for="username">Username:</label>
                                <input type="text" id="username" name="username" required><br><br>

                                <label for="password">Password:</label>
                                <input type="password" id="password" name="password" required><br><br>

                                <button type="submit">Login</button>
                            </form>
                        </div>
                    </div><!-- End Service Item -->
                </div>
            </div>
        </section><!-- /Featured Services Section -->
    </main>
    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <?= $this->include('template/jsview') ?>
    <?= $this->include('template/datatable_js') ?>

</body>

</html>