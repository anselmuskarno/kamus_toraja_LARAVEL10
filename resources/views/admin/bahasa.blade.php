<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Kamus Bahasa Toraja</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="NiceAdmin/assets/img/icon2.png" rel="icon">
  <link href="NiceAdmin/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="NiceAdmin/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="NiceAdmin/assets/css/style.css" rel="stylesheet">
  <link rel="manifest" href="pwa/assets/js/web.webmanifest">
  <link rel="apple-touch-icon" href="pwa/assets/img/icon2.png">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/dashboardAdmin" class="logo d-flex align-items-center">

        <img src="NiceAdmin/assets/img/icon.png" alt="">
        <span class="d-none d-lg-block text-success">Kamus Toraja</span>

      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="NiceAdmin/assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Admin</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

            <li>
              <a class="dropdown-item d-flex align-items-center" href="/">
                <i class="bi bi-box-arrow-right"></i>
                <span>Keluar</span>
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
        <a class="nav-link collapsed" href="/dashboardAdmin">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-heading">Menu</li>

      <li class="nav-item">
        <a class="nav-link " href="/bahasa">
          <i class="bi bi-menu-button-wide"></i>
          <span>Bahasa</span>
        </a>
      </li><!-- End Profile Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->


  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Data Bahasa Kamus Bahasa Toraja</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/dashboardAdmin">Home</a></li>
          <li class="breadcrumb-item active">Data</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <!-- Basic Modal -->
              <button type="button" class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#basicModal">
                Tambah Data
              </button>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Tambah Bahasa</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Vertical Form -->
                      <form class="row g-3" action="/tambahBahasa" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                          <label for="bahasa_indonesia" class="form-label">Bahasa Indonesia</label>
                          <input type="text" name="bahasa_indonesia" class="form-control" id="bahasa_indonesia" required autofocus>
                        </div>
                        <div class="col-12">
                          <label for="suaraindonesia" class="form-label">File Suara Bahasa Indonesia</label>
                          <input type="file" name="suaraindonesia" class="form-control" id="suaraindonesia" required>
                        </div>
                        <div class="col-12">
                          <label for="bahasa_toraja" class="form-label">Bahasa Toraja</label>
                          <input type="text" name="bahasa_toraja" class="form-control" id="bahasa_toraja" required>
                        </div>
                        <div class="col-12">
                          <label for="suaratoraja" class="form-label">File Suara Bahasa Toraja</label>
                          <input type="file" name="suaratoraja" class="form-control" id="suaratoraja" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Tambah Data</button>
                    </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->

              <!-- Table with stripped rows -->
              <table class="table datatable table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bahasa Indonesia</th>
                    <th scope="col">Audio</th>
                    <th scope="col">Bahasa Toraja</th>
                    <th scope="col">Audio</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($bahasa as $b)
                  <tr>
                    <th scope="row"> {{ $loop->iteration }} </th>
                    <td> {{ $b->bahasa_indonesia }} </td>
                    <td>
                      <?php if ($b->suaraindonesia == null) { ?>
                        <span class="text-danger"> <i class="bi bi-emoji-dizzy-fill"></i></span>
                      <?php } else { ?>
                        <span class="text-success"> <i class="bi bi-emoji-laughing-fill"></i></span>
                      <?php } ?>
                    </td>
                    <td>{{ $b->bahasa_toraja }}</td>
                    <td>

                      <?php if ($b->suaratoraja == null) { ?>
                        <span class="text-danger"> <i class="bi bi-emoji-dizzy-fill"></i></span>
                      <?php } else { ?>
                        <span class="text-success"> <i class="bi bi-emoji-laughing-fill"></i></span>
                      <?php } ?>

                    </td>
                    <td class="d-inline">
                      <span class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal{{$b->id}}"> <i class="bi bi-pencil-square"></i></span>

                      <a href="/hapusBahasa/{{$b->id}}" onclick="return confirm('Apakah anda yakin data ini akan dihapus?');" class="btn btn-danger btn-sm">
                        <i class="far fa-trash-alt" data-bs-toggle="tooltip" title="Hapus"></i> <i class="bi bi-trash-fill"></i></a>
                      </a>

                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
    @foreach ($bahasa as $b)
    <div class="modal fade" id="editModal{{$b->id}}" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Edit Bahasa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <!-- Vertical Form -->
            <form class="row g-3" action="/editBahasa/{{$b->id}}" method="post" enctype="multipart/form-data">
              @csrf
              <div class="col-12">
                <label for="bahasa_indonesia" class="form-label">Bahasa Indonesia</label>
                <input type="text" name="bahasa_indonesia" class="form-control" id="bahasa_indonesia" value="{{$b->bahasa_indonesia}}">
              </div>
              <div class="col-12">
                <label for="suaraindonesia" class="form-label">File Suara Bahasa Indonesia</label>
                <?php if ($b->suaraindonesia == null) { ?>
                  <input type="file" name="suaraindonesia" class="form-control" id="suaraindonesia" required>
                  <div class="text-danger mt-1" style="font-size: 10px;"> <i> *Belum memiliki audio </i></div>
                <?php } elseif ($b->suaraindonesia != null) { ?>
                  <input type="hidden" name="suaraindonesiaLama" value="{{ $b->suaraindonesia }}">
                  <input type="file" name="suaraindonesia" class="form-control" id="suaraindonesia">
                  <div class="text-success mt-1" style="font-size: 10px;"> <i> *Sudah memiliki audio </i></div>
                <?php } ?>
              </div>

              <div class="col-12">
                <label for="bahasa_toraja" class="form-label">Bahasa Toraja</label>
                <input type="text" name="bahasa_toraja" class="form-control" id="bahasa_toraja" value="{{$b->bahasa_toraja}}">
              </div>

              <div class="col-12">
                <label for="suaratoraja" class="form-label">File Suara Bahasa Toraja</label>
                <?php if ($b->suaratoraja == null) { ?>
                  <input type="file" name="suaratoraja" class="form-control" id="suaratoraja" required>
                  <div class="text-danger mt-1" style="font-size: 10px;"> <i> *Belum memiliki audio </i></div>
                <?php } elseif ($b->suaratoraja != null) { ?>
                  <input type="hidden" name="suaratorajaLama" value="{{ $b->suaraindonesia }}">
                  <input type="file" name="suaratoraja" class="form-control" id="suaratoraja">
                  <div class="text-success mt-1" style="font-size: 10px;"> <i> *Sudah memiliki audio </i></div>
                <?php } ?>
              </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
          </div>
          </form>
        </div>
      </div>
    </div><!-- End Basic Modal-->
    @endforeach
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Yonathan</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Didesain menggunakan <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="NiceAdmin/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="NiceAdmin/assets/vendor/echarts/echarts.min.js"></script>
  <script src="NiceAdmin/assets/vendor/quill/quill.min.js"></script>
  <script src="NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="NiceAdmin/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="NiceAdmin/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="NiceAdmin/assets/js/main.js"></script>

</body>

</html>