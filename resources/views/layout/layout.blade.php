<!doctype html>
<html lang="en">
  <head>
  	<title>PPDB SMKN 1 Cimahi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">

    <!-- ... (kode lainnya) ... -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="{{ asset('js/sorting.js') }}"></script> <!-- File JavaScript baru untuk pengurutan -->

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="{{ asset('css/informasi.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Pastikan link menuju versi terbaru Leaflet.js dan Leaflet.css -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    @notifyCss
    @stack('styles')
</head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('js/multiselect-dropdown.js') }}"></script>
    <style>
      .multiselect-dropdown{
        width:100% !important;
      }

      .alert-success {
    animation: bounce 1s ease infinite;
  }

  @keyframes bounce {
    0%, 20%, 50%, 80%, 100% {
      transform: translateY(0);
    }
    40% {
      transform: translateY(-30px);
    }
    60% {
      transform: translateY(-15px);
    }
  }

    </style>
  </head>
  <body>

		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="custom-menu">
					<button type="button" id="sidebarCollapse" class="btn btn-primary">
	          <i class="fa fa-bars"></i>
	          <span class="sr-only">Toggle Menu</span>
	        </button>
        </div>
	  		<h1><a href="" class="logo">i-PPDB</a></h1>
        <ul class="list-unstyled components mb-5">

      @if(auth()->user()->role == 0)
          <li>
              <a href="#"><span class="fa fa-users mr-3"></span> Pedoman</a>
          </li>
          <li>
              <a href="{{ route('formulir-pendaftaran.index') }}"><span class="fa fa-role mr-3"></span>Manage Data Pendaftar</a>
          </li>
          <li>
              <a href="{{ route('userpendaftar.index') }}"><span class="fa fa-role mr-3"></span>Manage Data Formulir</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Verifikasi</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Hasil Seleksi</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Laporan</a>
          </li>
          @elseif(auth()->user()->role == 1)
          <li>
              <a href="{{ route('dashboardSuperAdmin') }}"><span class="fa fa-users mr-3"></span> Dashboard</a>
          </li>
          <li>
              <a href="{{ route('superAdminUsers') }}"><span class="fa fa-users mr-3"></span> Users</a>
          </li>
          
          <li>
              <a href="{{ route('asal-kota.index') }}"><span class="fa fa-role mr-3"></span>Manage Kota</a>
          </li>
          <li>
              <a href="{{ route('asalKelurahan') }}"><span class="fa fa-role mr-3"></span>Manage Asal Kelurahan</a>
          </li>
          <li>
              <a href="{{ route('asal-sekolah.index') }}"><span class="fa fa-role mr-3"></span>Manage Asal Sekolah</a>
          </li>
          <li>
              <a href="{{ route('jurusan') }}"><span class="fa fa-role mr-3"></span> Manage Jurusan</a>
          </li>
          <li>
              <a href="{{ route('kompetensiKeahlian') }}"><span class="fa fa-role mr-3"></span> Manage Kompetensi Keahlian</a>
          </li>
          <li>
              <a href="{{ route('jalur.index') }}"><span class="fa fa-role mr-3"></span> Manage Jalur</a>
          </li>
          <li>
              <a href="{{ route('periode.index') }}"><span class="fa fa-role mr-3"></span> Manage Periode</a>
          </li>
       
      @elseif(auth()->user()->role == 2)
            <li>
              <a href="#"><span class="fa fa-users mr-3"></span>Informasi </a>
          </li>
          <li>
              <a href="{{ route('udahpendaftar.index') }}"><span class="fa fa-role mr-3"></span>Verifikasi Pendaftar</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Hasil Seleksi</a>
          </li>
          
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Laporan</a>
          </li>
      @elseif(auth()->user()->role == 3)
            <li>
              <a href="{{ route('informasiPPDB') }}"><span class="fa fa-users mr-3"></span> Informasi PPDB</a>
          </li>
          <li>
              <a href="{{ route('informasiSekolah') }}"><span class="fa fa-users mr-3"></span>Informasi Sekolah</a>
          </li>
          <li>
              <a href="#"><span class="fa fa-role mr-3"></span>Chat dengan Budak PPDB</a>
          </li>
      @elseif(auth()->user()->role == 4)
            <li>
                <a href="{{ route('pendaftar.index') }}"><span class="fa fa-role mr-3"></span>Tambahkan Akun Siswa</a>
            </li>
            <li>
                <a href="{{ route('nilai.index') }}"><span class="fa fa-role mr-3"></span>Nilai Rapot Siswa</a>
            </li>
      @endif

        <li>
            <a href="#" data-toggle="modal" data-target="#confirmLogoutModal">
                <span class="fa fa-sign-out mr-3"></span> Logout
            </a>
        </li>


           
        </ul>

    	</nav>

        <!-- Page Content  -->
            <div id="content" class="p-4 p-md-5 pt-5">
                @yield('space-work')
            </div>
		</div>

    <!-- Modal Logout -->
    <div class="modal fade" id="confirmLogoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Logout</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin logout?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="/logout" class="btn btn-primary">Ya, Logout</a>
                </div>
            </div>
        </div>
    </div>

      

    @notifyJs
    @notifyJs
    @stack('scripts')
    <!-- <script src="{{ asset('js/jquery.min.js') }}"></script> -->

   <!-- JavaScript with jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
  $(document).ready(function() {
    $("#myAlert").addClass("alert-success");

    // Optional: Remove the class after a certain duration
    setTimeout(function() {
      $("#myAlert").removeClass("alert-success");
    }, 1000); // Adjust the duration as needed
  });
</script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/popper.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <x-notify::notify />
        @notifyJs
  </body>
</html>
