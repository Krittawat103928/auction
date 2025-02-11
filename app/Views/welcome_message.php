<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Index - eNno Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
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
                <div class="row">
                    <div class="col">
                        <h5>เลือกวันที่</h5>
                        <input type="text" id="datepicker">
                    </div>
                    <div class="col">
                        <h5>Select a Date (Thai Year)</h5>
                        <select class="form-select" id="exampleSelect" data-placeholder="Choose one thing">
                            <option></option>
                            <option>Reactive</option>
                            <option>Solution</option>
                            <option>Conglomeration</option>
                            <option>Algoritm</option>
                            <option>Holistic</option>
                        </select>
                    </div>

                </div>
            </div>

            <div class="container">

                <div class="row ">
                    <div class="col-lg-12 ">
                        <div class=" position-relative">
                            <!-- <div class="icon"><i class="bi bi-activity icon"></i></div> -->
                            <table id="example" class="table table-striped" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Age</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>System Architect</td>
                                        <td>Edinburgh</td>
                                        <td>61</td>
                                        <th>Age</th>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Position</th>
                                        <th>Office</th>
                                        <th>Age</th>
                                        <th>Age</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div><!-- End Service Item -->



                </div>

            </div>

        </section><!-- /Featured Services Section -->

        <!-- About Section -->


    </main>
    <?= $this->include('template/footer') ?>


    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <?= $this->include('template/jsview') ?>
    <?= $this->include('template/datatable_js') ?>

</body>

</html>