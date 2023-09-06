<?php
session_start();
if (empty($_SESSION['MatriAgent'])) {
  header('location: login.php?locality=Paiement.php');
} else {
  ?>
          <!DOCTYPE html>
          <html lang="en">

          <head>
            <meta charset="utf-8">
            <meta content="width=device-width, initial-scale=1.0" name="viewport">

            <title>Paiement</title>
            <meta content="" name="description">
            <meta content="" name="keywords">

            <!-- Favicons -->
            <link href="assets/img/favicon.png" rel="icon">
            <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

            <!-- Google Fonts -->
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

            <!-- Template Main CSS File -->
            <link href="assets/css/style.css" rel="stylesheet">


          </head>

          <body class="toggle-sidebar">

  
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
                                      <a class="dropdown-item d-flex align-items-center" href="logout.php">
                                          <i class="bi bi-box-arrow-right"></i>
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
                          <a class="nav-link collapsed" href="candidat.php">
                              <i class="bi bi-file-earmark-person-fill"></i>
                              <span>Candidat</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link " href="Paiement.php">
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
                <h1>Formulaire de Paiement</h1>
                <nav>
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="inscription.php">Home</a></li>
                    <li class="breadcrumb-item">Forms</li>
                    <li class="breadcrumb-item active">Paiement</li>
                  </ol>
                </nav>
              </div><!-- End Page Title -->
              <section class="section">
                <div class="row">
                  <div class="col-lg-6" style="width: 68%;" id="Fac">

                    <div class="card Facture" id="Facture">
                      <div class="card-body">
                        <!-- Horizontal Form -->
                        <form>
                          <div class="row mb-3" style="flex-flow: nowrap;">
                            <div class="card-body">

                              <h5 class="card-title">Informations du candidat</h5>
                              <!-- Default List group -->
                              <ul class="list-group">
                                <li class="list-group-item"> Nom candidat :
                                  <span class="card-title" id="Nom"></span>
                                </li>
                                <li class="list-group-item"> Postnom candidat :<span class="card-title" id="Postnom"></span></li>
                                <li class="list-group-item"> Prenom candidat : <span class="card-title" id="Prenom"></span>
                                </li>
                                <li class="list-group-item"> E-mail candidat : <span class="card-title" id="E-mail"></span></li>
                                <li class="list-group-item"> Telephone candidat : <span class="card-title" id="Telephone"></span>
                                </li>
                                <li class="list-group-item"> Promotion :
                                  <span class="card-title" id="Promotion"></span>
                                </li>
                              </ul><!-- End Default List group -->

                            </div>
                            <div class="card-body">

                              <h5 class="card-title">Informations de paiement</h5>
                              <!-- Default List group -->
                              <ul class="list-group">
                                <li class="list-group-item"> Numéro de Reçu :
                                  <span class="card-title" id="NumPaie"></span>
                                </li>

                                <li class="list-group-item"> Motif :
                                  <span class="card-title" id="Motif"></span>
                                </li>
                                <li class="list-group-item"> Montant Payé :
                                  <span class="card-title" id="Montant"></span>
                                </li>
                                <li class="list-group-item"> Caissier :
                                  <span class="card-title" id="Caissier"></span>
                                </li>
                                <li class="list-group-item"> Date de paie : <span class="card-title" id="Date"></span>
                                </li>
                              </ul><!-- End Default List group -->

                            </div>
                          </div>


                        </form><!-- End Horizontal Form -->

                      </div>
                    </div>
                  </div>

                  <div class="col-lg-6" style="width: 29%;">

                    <div class="card">
                      <div class="card-body">
                        <h5 class="card-title">Zone de saisie</h5>

                        <!-- Vertical Form -->
                        <form class="row g-3">
                          <div class="col-12">
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="search" class="form-control" id="inputSearch" placeholder="Rechercher un étudiant">
                                <div class="list-group" id="dropdown">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-12">
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="search" class="form-control" id="inputSearchMotif" placeholder="Motif de paiement">
                                <div class="list-group" id="dropdownMotif">
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="col-12">
                            <div class="row mb-3">
                              <div class="col-sm-10">
                                <input type="text" class="form-control" id="MontantP" placeholder="Montant payer">
                              </div>
                            </div>
                          </div>
                          <div class="text-center">
                            <button type="button" class="btn btn-primary" id="Printer">Print</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                          </div>
                        </form><!-- Vertical Form -->

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
            <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
            <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
            <script src="assets/vendor/chart.js/chart.umd.js"></script>
            <script src="assets/vendor/echarts/echarts.min.js"></script>
            <script src="assets/vendor/quill/quill.min.js"></script>
            <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
            <script src="assets/vendor/tinymce/tinymce.min.js"></script>
            <script src="assets/vendor/php-email-form/validate.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery.print/1.6.2/jQuery.print.js"
              integrity="sha512-BaXrDZSVGt+DvByw0xuYdsGJgzhIXNgES0E9B+Pgfe13XlZQvmiCkQ9GXpjVeLWEGLxqHzhPjNSBs4osiuNZyg=="
              crossorigin="anonymous" referrerpolicy="no-referrer"></script>
              <script src="assets/js/logger.js"></script>
            <script type="text/javascript">
              $(function () {
                $("#Printer").click(
                  function () {
                    let numcand = $('#Nom').data('id'),
                      Motif = $('#Motif').html(),
                      NumInscription = $('#Nom').data('numins'),
                      MatriAgent = $('#Caissier').data('id'),
                      Montant = $('#Montant').html().split(' $')[0],
                      Caissier = $('#Caissier').data('id');
                    /* `Motif`, `NumInscription`, `MatriAgent` */
                    /* `MontPaye`, `NumPaie`, `CodeFrais` */
                    $.ajax({
                      url: "myfonction.php",
                      method: "POST",
                      data: {
                        location: 'Paiement',
                        action: 'Insert',
                        Motif,
                        NumInscription,
                        MatriAgent,
                        Montant,
                        Caissier,
                        Date: $('#Date').html()
                      },
                      dataType: "JSON",
                      success: function (data) {
                        $('#NumPaie').html(data)
                      }
                    });
                    // Print the DIV.
                   setTimeout(() => {
                    $(".Facture").print();
                  }, 900);

            
          
          

                    // Cancel click event.
                    return (false);
                  }
                )
              });
            </script>
            <script>
              $(document).ready(function () {
                let today = new Date().toLocaleDateString()
                $('#Date').html(today)

                $(document).on('click', '.searchBu', function () {
                  if (action == "Candidat" || action == "Inscrit") {
                    numcand = $(this).data('id');
                    let codeDoc = $(this).data('id');
                    let NumInscription = $('.searchBu').data('numins');
                    $('#Promotion').text($(this).data('promo'));
                    $('#Nom').attr('data-NumIns', NumInscription);

                    $('#ModalLabel').text('Modification du document');

                    $('#action_button').attr('data-id', 'Edit');
                    $('#action_button').text('Modifier');
                    $('#action').val('Update');

                    $('#addDocumentModal').modal('show');
                    $.ajax({
                      url: "myfonction.php",
                      method: "POST",
                      data: { location: 'Candidat', numcand: numcand, action: 'LoadSingle' },
                      dataType: "JSON",
                      success: function (data) {

                        $('#Nom').text(data.data[0]['Nom'])
                        $('#Nom').attr('data-id', data.data[0]['NumCand'])
                        $('#Postnom').text(data.data[0]['PostNom'])
                        $('#Prenom').text(data.data[0]['Prenom'])
                        $('#E-mail').text(data.data[0]['Email'])
                        $('#Telephone').text(data.data[0]['Tel'])

                      }
                    });
                    $('#inputSearch').val('')
                  } else if (action == "Frais") {
                    $('#Motif').text($(this).text())
                    $('#inputSearchMotif').val('')


                  }

                });
                let action, queryId, Aff,
                  button = buttonTemplate = $('<button>').addClass('list-group-item list-group-item-action searchBu')
                    .attr('type', 'button').attr('id', 'sal');

                function fetchData() {

                  var word = $(queryId).val();

                  if (word == '') {
                    $(Aff).css('display', 'none');
                  }
                  $.post("myfonction.php",
                    {
                      location: 'search', word: word, action: action
                    },
                    function (data, status) {
                      if (data != "not found") {
                        $(Aff).css('display', 'block');
                        $(Aff).html(""); // Effacer le contenu précédent

                        let results = JSON.parse(data);
                        for (let i = 0; i < results.length; i++) {
                          let result = results[i];
                          let buttonText = result.Nom + " " + result.PostNom + " " + result.Prenom;
                          if (action === "Frais") {
                            buttonText = result.LibFrais;
                          }

                          let button = buttonTemplate.clone(); // Clonez le modèle
                          button.attr('data-id', result.NumCand || result.CodeFrais);
                          button.attr('data-promo', result.CodePromo);
                          button.attr('data-NumIns', result.NumInscription)

                          button.text(buttonText);
                          $(Aff).append(button);
                        }
                      }
                    });

                }
                /* `Promotion`(`CodePromo`, `Intitule`, `CodeDepart`) */
                $('#inputSearch').on('input', function () {
                  action = "Inscrit";
                  queryId = '#inputSearch'
                  Aff = '#dropdown'

                  fetchData()
                });
                $('#inputSearchMotif').on('input', function () {
                  action = "Frais";
                  queryId = '#inputSearchMotif'
                  Aff = '#dropdownMotif'

                  fetchData()
                });

                $('#MontantP').on('input', () => {
                  console.log($('#MontantP').val())
                  $('#Montant').html($('#MontantP').val() + " $")
                });

                $("body").on('click', () => {
                  setTimeout(() => {
                    $(Aff).css('display', 'none');
                  }, 900);

                });
                $('.form-select').on('change', () => {

                  $('#Annacad').html($(".form-select option:selected").val())
                })


                $('# ').on('click', fetchData);

              });
            </script>
            <!-- Template Main JS File -->
            <script src="assets/js/main.js">

            </script>

          </body>

          </html>
          <?php

} ?>