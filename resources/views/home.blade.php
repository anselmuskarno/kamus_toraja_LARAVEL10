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
      <button data-bs-toggle="modal" data-bs-target="#basicModal" class="btn btn-sm btn-success">Login</button> &nbsp;&nbsp;&nbsp;&nbsp;
      <a href="/" class="logo d-flex align-items-center">
        <img src="NiceAdmin/assets/img/icon.png" alt="">
        <span class="d-none d-lg-block text-success">Kamus Toraja</span>
      </a>
    </div><!-- End Logo -->

  </header><!-- End Header -->

  <!-- LOGIN -->
  <div class="modal fade" id="basicModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Login</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Vertical Form -->
          <form class="row g-3" action="/login" method="post">
            @csrf
            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <input type="text" name="username" class="form-control" id="username">
            </div>
            <div class="col-12">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-success">Masuk</button>
        </div>
        </form><!-- Vertical Form -->
      </div>
    </div>
  </div><!-- End Basic Modal-->

  <main>

    <div class="pagetitle text-center">
      <h1>Tabs</h1>

    </div><!-- End Page Title -->
    <div class="container">
      <section class="section">
        <div class="row">
          <div class="col-lg-12 mt-2">

            <div class="card">
              <div class="card-body">

                <form action="/cariKata" method="post">
                  @csrf
                  <div class="text-center mt-2">
                    <img src="NiceAdmin/assets/img/icon2.png" alt="">
                  </div>
                  <div class="mb-3 d-flex" style="padding-top:20px">
                    <input name="kata" type="text" placeholder="Masukkan Kata..." class="form-control" id="kata" value=" {{ request('kata') }} ">
                    <button class="btn btn-success" type="submit" title="Search"><i class="bi bi-search"></i></button>
                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> -->
                  </div>
                </form>
                @if ($hasilpencarian == "0")

                @else

                @if ($total < 1) <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Hasil tidak ditemukan.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> @endif @foreach ($hasilpencarian as $h) <?php if ($total == 1 || $total > 1) { ?>
                <div class="alert alert-success alert-dismissible fade show d-flex" role="alert">
                  <table>
                    <tr>
                      <td> <b> {{ $h->bahasa_indonesia }} </b></td>
                      <td><i> {{ $h->bahasa_toraja }}</td>
                    </tr>
                    <tr>
                      <td> <button class="btn btn-sm btn-warning playindonesia">
                          Dengarkan Bahasa Indonesia
                        </button></td>
                      <td> <button class="btn btn-sm btn-secondary playtoraja">
                          Dengarkan Bahasa Toraja
                        </button></td>

                    </tr>
                  </table>

                  :

                  @if ($loop->iteration == 1)

                  <?php if ($h->suaratoraja == null && $h->suaraindonesia == null) { ?>
                    <input type="hidden" value="kosong" id="suaratoraja">
                    <input type="hidden" value="kosong" id="suaraindonesia">
                  <?php } else { ?>
                    <input type="hidden" value="{{ $h->suaratoraja }}" id="suaratoraja">
                    <input type="hidden" value="{{ $h->suaraindonesia }}" id="suaraindonesia">
                  <?php } ?>


                  @endif
                  <?php if ($h->suaratoraja == null && $h->suaraindonesia == null) { ?>
                    <span id="soundplay" class="text-danger"></span> &nbsp;&nbsp;&nbsp;
                  <?php } else { ?>
                    <span id="soundplay" class="text-primary"></span> &nbsp;&nbsp;&nbsp;
                  <?php } ?>
                  </i>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
              <?php } else { ?>


              <?php } ?>
              @endforeach
              @endif
            </div>
          </div>

        </div>

        <script>
          let playToraja = document.getElementsByClassName("playtoraja");
          let playIndonesia = document.getElementsByClassName("playindonesia");
          let pauseBtn = document.getElementsByClassName("pause");

          let text = document.querySelector("#soundplay");
          let suaratoraja = document.getElementById("suaratoraja").value;
          let suaraindonesia = document.getElementById("suaraindonesia").value;
          const audiotoraja = new Audio("./storage/" + suaratoraja);
          const audioindonesia = new Audio("./storage/" + suaraindonesia);
          playToraja[0].addEventListener("click", (e) => {
            audiotoraja.play();
            if (suaratoraja != "kosong") {
              text.innerHTML = "Toraja 🔊";
            } else {
              text.innerHTML = "Belum ada suara";
            }
          });
          playIndonesia[0].addEventListener("click", (e) => {
            audioindonesia.play();
            if (suaraindonesia != "kosong") {
              text.innerHTML = "Indonesia 🔊";
            } else {
              text.innerHTML = "Belum ada suara";
            }
          });

          pauseBtn[0].addEventListener("click", (e) => {
            audio.pause();
            playBtn.innerHTML = "Audio Paused";
          });
        </script>

        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center">Manual</h5>

              <!-- Bordered Tabs Justified -->
              <ul class="nav nav-tabs nav-tabs-bordered d-flex" id="borderedTabJustified" role="tablist">
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100 active" id="home-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-home" type="button" role="tab" aria-controls="home" aria-selected="true">Toraja - Indonesia</button>
                </li>
                <li class="nav-item flex-fill" role="presentation">
                  <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab" data-bs-target="#bordered-justified-profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Indonesia - Toraja</button>
                </li>
              </ul>
              <div class="tab-content pt-2" id="borderedTabJustifiedContent">
                <div class="tab-pane fade show active" id="bordered-justified-home" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-striped">
                    <tbody>
                      @foreach ($bahasa as $b)
                      <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td>{{ $b->bahasa_toraja }}</td>
                        <td>{{ $b->bahasa_indonesia }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade " id="bordered-justified-profile" role="tabpanel" aria-labelledby="profile-tab">
                  <table class="table table-striped">
                    <tbody>
                      @foreach ($bahasa as $b)
                      <tr>
                        <th scope="row"> {{ $loop->iteration }} </th>
                        <td>{{ $b->bahasa_indonesia }}</td>
                        <td>{{ $b->bahasa_toraja }}</td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div><!-- End Bordered Tabs Justified -->

            </div>
          </div>

        </div>

    </div>
    </section>
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Yonathan</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Didesaign menggunakan <a href="https://bootstrapmade.com/">BootstrapMade</a>
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
  <script src="pwa/assets/js/register.js"></script>

</body>

</html>