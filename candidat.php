<?php
session_start();
if (empty($_SESSION['MatriAgent'])) {
    header('location: candidatPublic.php');
} else {
    ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="utf-8">
                    <meta content="width=device-width, initial-scale=1.0" name="viewport">

                    <title>Candidature</title>
                    <meta content="" name="description">
                    <meta content="" name="keywords">

                    <!-- Favicons -->
                    <link href="assets/img/favicon.png" rel="icon">
                    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
                    <!--     <link rel="stylesheet" href="https://cdn.jsdelivr.net/sweetalert2/6.5.6/sweetalert2.min.css">
 --> <!-- Google Fonts -->
                    <link href="https://fonts.gstatic.com" rel="preconnect">
                    <link
                        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
                        rel="stylesheet">

                    <!-- Vendor CSS Files -->
                    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
                    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
                    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
                    <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
                    <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
                    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
                    <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css"></script>
                    <!-- Template Main CSS File -->
                    <link href="assets/css/style.css" rel="stylesheet">


                </head>

                <body>
                    <!-- ======= Header ======= -->
                    <header id="header" class="header fixed-top d-flex align-items-center">

                        <div class="d-flex align-items-center justify-content-between">
                            <a href="inscription.php" class="logo d-flex align-items-center" style="margin-left: 15px;">
                                <img src="assets/img/isipa-Logo.png" alt="">
                                <span class="d-none d-lg-block" style="margin-left: 8%;">Isipa</span>
                            </a>
                            <i class="bi bi-list toggle-sidebar-btn"></i>
                        </div><!-- End Logo -->

                        <div class="search-bar">
                            <form class="search-form d-flex align-items-center" method="POST" action="#">
                                <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                            </form>
                        </div><!-- End Search Bar -->

                        <nav class="header-nav ms-auto">
                            <ul class="d-flex align-items-center">

                                <li class="nav-item d-block d-lg-none">
                                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                                        <i class="bi bi-search"></i>
                                    </a>
                                </li><!-- End Search Icon-->
                                <li class="nav-item dropdown pe-3">

                                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                                        <span class="d-none d-md-block dropdown-toggle ps-2 userN"></span>
                                    </a><!-- End Profile Iamge Icon -->

                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                                        <li class="dropdown-header">
                                            <h6 class="userN"></h6>
                                            <span>Caissier</span>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                                                <i class="bi bi-person"></i>
                                                <span>Mon Profile</span>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li>
                                            <a class="dropdown-item d-flex align-items-center" href="logout.php"> <i
                                                    class="bi bi-box-arrow-right"></i>
                                                <span>Déconnexion</span>
                                            </a>
                                        </li>

                                    </ul><!-- End Profile Dropdown Items -->
                                </li><!-- End Profile Nav -->

                            </ul>
                        </nav><!-- End Icons Navigation -->

                    </header><!-- End Header -->

                    <!-- ======= Sidebar ======= -->
                    <aside id="sidebar" class="sidebar">

                        <ul class="sidebar-nav" id="sidebar-nav">

                            <li class="nav-item">
                                <a class="nav-link collapsed" href="inscription.php">
                                    <i class="bi bi-person-add"></i>
                                    <span>Inscription</span>
                                </a>
                            </li><!-- End Dashboard Nav -->
                            <li class="nav-item">
                                <a class="nav-link " data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
                                    <i class="bi bi-file-earmark-person-fill"></i><span>Candidat</span><i class="bi bi-chevron-down ms-auto"></i>
                                </a>
                                <ul id="forms-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                                    <li>
                                        <a href="candidat.php" class="active">
                                            <i class="bi bi-circle"></i><span>Candidat</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="viewsCand.php" >
                                            <i class="bi bi-circle"></i><span>Affichage Candidat</span>
                                        </a>
                                    </li>

                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="Paiement.php">
                                    <i class="bi bi-currency-dollar"></i>
                                    <span>Paiement</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="depotDoc.php">
                                    <i class="bi bi-file-earmark-ruled"></i>
                                    <span>Dépot Dossier</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="document.php">
                                    <i class="bi bi-folder-plus"></i>
                                    <span>Document</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link collapsed" href="users-profile.php">
                                    <i class="bi bi-person"></i>
                                    <span>Profile</span>
                                </a>
                            </li><!-- End Profile Page Nav -->

                        </ul>

                    </aside><!-- End Sidebar-->

                    <main id="main" class="main">

                        <div class="pagetitle">
                            <h1>Candidature</h1>
                            <nav>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="inscription.php">Acceuil</a></li>
                                    <li class="breadcrumb-item">Form</li>
                                    <li class="breadcrumb-item active">Candidature</li>
                                </ol>
                            </nav>
                        </div><!-- End Page Title -->
                        <section class="section">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Enregistrement</h5>

                                            <!-- Floating Labels Form -->
                                            <form class="row g-3" id="sample_form">
                                                <input type="hidden" name="location" value="Candidat">
                                                <input type="hidden" name="action" value="Insert">

                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingNom" name="nom"
                                                            placeholder="Nom">
                                                        <label for="floatingNom">Nom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingPostnom" name="postnom"
                                                            placeholder="Postnom">
                                                        <label for="floatingPostnom">Postnom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingPrenom" name="prenom"
                                                            placeholder="Prenom">
                                                        <label for="floatingPrenom">Prenom</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-floating">
                                                        <input type="date" class="form-control" id="floatingDateNaiss" name="dannai">
                                                        <label for="floatingDateNaiss">Date de Naissance</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingSexe" name="sexe"
                                                            placeholder="Sexe">
                                                        <label for="floatingSexe">Sexe</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="floatingAdresse" name="adresse"
                                                            placeholder="Adresse">
                                                        <label for="floatingAdresse">Adresse</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="tel" class="form-control" id="floatingTel" name="tel"
                                                            placeholder="Tel">
                                                        <label for="floatingTel">Tel</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="email" class="form-control" id="floatingEmail" name="mail"
                                                            placeholder="Email">
                                                        <label for="floatingEmail">Email</label>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <button type="submit" class="btn btn-primary">S'enregistrer</button>
                                                    <button type="reset" class="btn btn-secondary">Annuler</button>
                                                </div>
                                            </form><!-- End floating Labels Form -->
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </section>

                    </main><!-- End #main -->

                    <!-- ======= Footer ======= -->
                    <footer id="footer" class="footer">
                        <div class="copyright">
                            &copy; Copyright <strong><span>Isipa</span></strong>. All Rights Reserved
                        </div>
                        <div class="credits">
                            <!-- All the links in the footer should remain intact. -->
                            <!-- You can delete the links only if you purchased the pro version. -->
                            <!-- Licensing information: https://bootstrapmade.com/license/ -->
                            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                            Designed by <a href="#">Merseigne</a>
                        </div>
                    </footer><!-- End Footer -->

                    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
                            class="bi bi-arrow-up-short"></i></a>

                    <!-- Vendor JS Files -->
                    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
                    <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
                    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
                    <script src="assets/vendor/chart.js/chart.umd.js"></script>
                    <script src="assets/vendor/echarts/echarts.min.js"></script>
                    <script src="assets/vendor/quill/quill.min.js"></script>
                    <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
                    <script src="assets/vendor/tinymce/tinymce.min.js"></script>
                    <script src="assets/vendor/php-email-form/validate.js"></script>
                    <script src="assets/js/logger.js"></script>

                    <!-- Template Main JS File -->
                    <script src="assets/js/main.js"></script>
                    <script>
                        $(document).ready(function () {
                            $('#sample_form').on('submit', function (event) {
                                let formData = $(this).serialize();
                                CodeDoc = $('#CodeDoc').val()
                                LibDoc = $('#LibDoc').val()
                                action = $('#action').val()
                                event.preventDefault();
                                $.ajax({
                                    url: "myfonction.php",
                                    method: "POST",
                                    data: {
                                        formData, location: "Candidat", action: "Insert"
                                    },
                                    success: function (data, status) {
                                        console.log(status)
                                        console.log('donnée ajouter')
                                        Swal.fire({
                                            title: 'enregistrement effectué',
                                            icon: 'success',
                                            html:
                                                'Rendez-vous à l\'apparitorat pour deposer votre dossier Scolaire/Académique </br>' +
                                                'et effectuer le paiement de votre accompte',
                                            showCloseButton: true,
                                            focusConfirm: false,
                                            confirmButtonText:
                                                'Fermer',
                                        }),
                                            $('#sample_form')[0].reset();
                                    },
                                });

                            });

                        });
                    </script>
                </body>

                </html>
                <?php

} ?>