<?php
session_start();
if (empty($_SESSION['MatriAgent'])) {
  header('location: login.php?locality=document.php');
} else {

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Document</title>
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
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">


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
        <a class="nav-link collapsed" href="candidat.php">
          <i class="bi bi-file-earmark-person-fill"></i>
          <span>Candidat</span>
        </a>
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
        <a class="nav-link " href="document.php">
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
      <h1>Document</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="inscription.php">Acceuil</a></li>
          <li class="breadcrumb-item">Formulaires</li>
          <li class="breadcrumb-item active">Document</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Documents</h5>

              <!-- Add Document Button -->
              <div class="mb-3">
                <button type="button" class="btn btn-primary addDocumentModal" id="add_data">
                  Add
                </button>
              </div>

              <!-- Table with DataTables -->
              <table class="table datatable" id="config-table">
                <thead>
                  <tr>
                    <th scope="col">Code Document</th>
                    <th scope="col">Libellé Document</th>
                    <th scope="col">Actions</th>

                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
              <!-- End Table with DataTables -->
            </div>
          </div>

          <!-- Add Document Modal -->
          <div class="modal fade" id="addDocumentModal" tabindex="-1" aria-labelledby="addDocumentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="ModalLabel">Ajout Document</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <!-- Add your form fields for adding a document here -->
                  <!-- For example: -->
                  <form id="sample_form">
                    <div class="mb-3">
                      <label for="codeDoc" class="form-label">Code Document</label>
                      <input type="text" class="form-control" id="CodeDoc" name="CodeDoc">
                    </div>
                    <div class="mb-3">
                      <label for="libDoc" class="form-label">Libellé Document</label>
                      <input type="text" class="form-control" id="LibDoc" name="LibDoc">
                    </div>

                    <input type="hidden" id="action" name="action">
                    <input type="hidden" id="location" name="location">
                    <button type="submit" class="btn btn-primary fade-toast" id="action_button"
                      data-id="Edit">Add</button>
                  </form>
                </div>
              </div>
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
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
  <script src="assets/js/logger.js"></script>
  <script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

  <script src="assets/js/main.js"></script>


  <script>
    $(document).ready(function () {
      let dataTable;
      load_data();

      function load_data() {
        $.ajax({
          url: 'myfonction.php',
          method: 'POST',
          data: {
            action: 'Loaddata',
            location: 'Document'
          },
          dataType: 'JSON',
          destroy: true,
          success: function (data) {

            dataTable = null;
            const dataSet = data
            dataTable = $("#config-table").DataTable({
              responsive: true,
              scrollX: false,
              scrollY: false,

              language: {
                lengthMenu: "Affiche _MENU_ / page",
                zeroRecords: "Introuvable - désolé",
                info: "Affichage de la page _PAGE_ sur _PAGES_",
                infoEmpty: "Enregistrements introuvables",
                infoFiltered: "(filtré à partir de _MAX_ enregistrements au total)",
                "paginate": {
                  "previous": "Préc",
                  "next": "Suiv",
                  "first": "Première",
                  "last": "Dernière"
                },
                search: "recherche"

              },
              pagingType: "full_numbers",
              order: [[0, "desc"]],
              columns: [
                { data: 'CodeDoc' },
                { data: 'LibDoc' },
                {
                  data: null,
                  render: function (data, type, row) {
                    return "<button type='button' class='btn btn-danger delete' data-id='" + row.CodeDoc + "'><i class='bi bi-trash3'></i></button>&nbsp;&nbsp;" +
                      "<button type='button' class=\"btn btn-warning Edit-button\" data-id='" + row.CodeDoc + "'><i class='bi bi-pen'></i></button>";
                  }
                }],
              data: data.data,
              dom: 'Bfrtip',
              buttons: [
                {
                  extend: 'print',
                  text: 'Imprimer',
                  "sInfo": "Please press escape when done",

                  title: "",
                  exportOptions: {
                    columns: [0, 1],
                    orthogonal: {
                      display: ':null'
                    }
                  },
                  customize: function (win) {
                    $(win.document.body)
                      .css('font-size', '10pt')
                      .prepend(
                        "<h1 style='text-align:center;text-decoration : underline;'><strong>Liste des documents pour l'inscription </strong></h1>" +
                        '<img src="static/images/isipapng-e1691352966927.png" style="position:absolute; top:30%; left:10%; opacity:30%" />'
                      );

                    $(win.document.body).find('table')
                      .addClass('compact')
                      .css('font-size', 'inherit');
                  }
                }
              ],
            });
          },
          error: function (error) {
            // Gérer les erreurs si nécessaire
          }

        });
      }
      $(document).on('click', '#add_data', function () {
        $('#sample_form')[0].reset();
        $('#action_button').attr('data-id', 'Insert');
        $('#ModalLabel').text('Ajout du document');
        $('#addDocumentModal').modal('show');
        $('#action_button').text('Ajouter');
        $('#action').val('Insert');
        /*           $('#LibDoc').val($('#action').val())
         */
      });

      $(document).on('click', '.Edit-button', function () {


        let codeDoc = $(this).data('id');

        $('#ModalLabel').text('Modification du document');

        $('#action_button').attr('data-id', 'Edit');
        $('#action_button').text('Modifier');
        $('#action').val('Update');

        $('#addDocumentModal').modal('show');
        $.ajax({
          url: "myfonction.php",
          method: "POST",
          data: { location: 'Document', CodeDoc: codeDoc, action: 'LoadSingle' },
          dataType: "JSON",
          success: function (data) {
            console.log(data);
            $('#CodeDoc').val(data.data[0]['CodeDoc']);
            $('#LibDoc').val(data.data[0]['LibDoc']);
            /* codeDoc
            libDoc */
          }
        });

      });
      $('#sample_form').on('submit', function (event) {

        CodeDoc = $('#CodeDoc').val()
        LibDoc = $('#LibDoc').val()
        action = $('#action').val()
        event.preventDefault();
        $.ajax({
          url: "myfonction.php",
          method: "POST",
          data: {
            CodeDoc: CodeDoc, LibDoc: LibDoc, action: action, location: 'Document'
          },
          success: function (data, status) {
            console.log(status)
            console.log('donnée ajouter')
            $('#addDocumentModal').modal('hide');
            dataTable.destroy();
            load_data();
            $('#sample_form')[0].reset();
            setTimeout(function () {
              $('#message').html('');
            }, 5000);
          },
        });

      });
      $(document).on('click', '.delete', function () {

        let codeDoc = $(this).data('id');
        $('#action').val('Delete');
        if (confirm("Êtes-vous sûr de vouloir supprimer ces données ?")) {
          $.ajax({
            url: "myfonction.php",
            method: "POST",
            data: { location: 'Document', CodeDoc: codeDoc, action: 'Delete' },
            success: function (data) {
              console.log(data)
              dataTable.destroy();
              load_data();
              setTimeout(function () {
                $('#message').html('');
              }, 5000);
            }
          });
        }

      });
    });
  </script>



</body>

</html>

?>
<?php

} ?>