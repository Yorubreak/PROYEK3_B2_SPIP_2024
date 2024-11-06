@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutFront')

@section('title', 'Landing - Front Pages')

<!-- Vendor Styles -->
@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.scss',
  'resources/assets/vendor/libs/swiper/swiper.scss'
])
@endsection

<!-- Page Styles -->
@section('page-style')
@vite(['resources/assets/vendor/scss/pages/front-page-landing.scss'])
@endsection

<!-- Vendor Scripts -->
@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/nouislider/nouislider.js',
  'resources/assets/vendor/libs/swiper/swiper.js'
])
@endsection

<!-- Page Scripts -->
@section('page-script')
@vite(['resources/assets/js/front-page-landing.js'])
@endsection


@section('content')
<div data-bs-spy="scroll" class="scrollspy-example">
  <!-- Hero: Start -->
  <section id="hero-animation">
    <div id="landingHero" class="section-py landing-hero position-relative" style="position: relative; width: 100%; height: 100vh; overflow: hidden;">
      <img src="{{asset('assets/img/front-pages/backgrounds/landing-spip.png')}}" alt="hero background" class="position-absolute top-0 start-50 translate-middle-x object-fit-cover w-100 h-100" style="width: 100vw; height: 100vh; object-fit: cover;" />

      <div class="container-fluid">
        <div class="hero-text-box text-align-justified" style="position: absolute; top: 33%; left: 10%; color: #fff; max-width: 60%;">
          <div>
            <h1 class="text-primary hero-title display-7 fw-bold" style="font-size: 2.5rem;">SISTEM PENGENDALIAN INTERN PEMERINTAH (SPIP) POLBAN</h1>
            <h2 class="hero-sub-title h6 mb-4 pb-1" style="font-size: 1rem;text-align:justify;max-width:60%;">
              <span style="display: inline-block; margin-left: 20px;">
              SPIP</span> adalah proses integral yang dilakukan secara terus menerus oleh
              pimpinan dan seluruh pegawai untuk mencapai tujuan organisasi melalui
              kegiatan yang efektif, efisien,keandalan pelaporan keuangan, pengamanan
              aset negara,dan ketaatan terhadap peraturan.
            </h2>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-5 d-flex justify-content-between align-items-start flex-column" style="gap: 2rem;">
      <!-- Hero Dashboard Animation dan Tentang SPIP: Start -->
      <div class="d-flex justify-content-between align-items-start" style="gap: 2rem;">
        <!-- Hero Dashboard Animation: Left (50%) -->
        <div id="heroDashboardAnimation" class="hero-animation-img" style="width: 50%;">
          <a href="{{url('/app/ecommerce/dashboard')}}" target="_blank">
            <div id="heroAnimationImg" class="position-relative hero-dashboard-img" style="width: 100%; height: auto;">
              <img src="{{asset('assets/img/front-pages/landing-page/hero-dashboard-'.$configData['style'].'.png')}}" alt="hero dashboard" class="animation-img" data-app-light-img="front-pages/landing-page/hero-dashboard-light.png" data-app-dark-img="front-pages/landing-page/hero-dashboard-dark.png" style="width: 100%; height: auto;" />
            </div>
          </a>
        </div>

        <!-- Text Box: Tentang SPIP (50%) -->
        <div class="hero-text-box" style="width: 50%; color: #000; margin-top: 4rem;">
          <h1 style="font-size: 1.75rem; font-weight: bold;">Tentang SPIP</h1>
          <h2 style="font-size: 1rem; font-weight: normal; text-align: justify;">
            Sistem Pengendalian Intern Pemerintah (SPIP) adalah proses yang integral pada tindakan dan kegiatan yang dilakukan
            secara terus menerus oleh pimpinan dan seluruh pegawai untuk memberi keyakinan memadai atas tercapainya tujuan
            organisasi melalui kegiatan yang efektif dan efisien, keandalan pelaporan keuangan, pengamanan aset negara, dan
            ketaatan terhadap peraturan perundang-undangan. Selanjutnya, SPIP didefinisikan sebagai SPI yang diselenggarakan
            secara menyeluruh di lingkungan pemerintah pusat dan daerah. Pada Pasal 58 ayat 1 Undang-Undang Nomor 1 Tahun 2004
            mengatur bahwa Presiden selaku Kepala Pemerintahan bertanggung jawab menyelenggarakan SPI untuk mendukung kinerja,
            transparansi, dan akuntabilitas pengelolaan keuangan negara. Pasal 47 ayat 1 Peraturan Pemerintah Nomor 60 Tahun 2008
            mewajibkan setiap Kementerian, Lembaga, dan Pemerintah Daerah (K/L/D) menyelenggarakan SPI yang diselenggarakan secara
            menyeluruh (SPIP).
          </h2>
        </div>
      </div>
      <!-- Hero Dashboard Animation dan Tentang SPIP: End -->

      <!-- Text Box 1 dan Text Box 2: Start -->
      <div class="d-flex justify-content-between align-items-start" style="gap: 2rem;">
        <!-- Text Box 1: Tujuan SPIP (50%) -->
        <div class="hero-text-box d-flex flex-column align-items-center" style="width: 50%; color: #000; padding: 1rem; position: relative;">
          <h1 style="font-size: 1.75rem; font-weight: bold; position: absolute; top: 0; transform: translateY(-50%);">Tujuan SPIP</h1>
          <h2 style="font-size: 1rem; font-weight: normal; text-align: justify; margin-top: 2rem;">
            SPIP bertujuan memberikan keyakinan yang memadai atas:
            <ol>
              <li>Efektivitas dan efisiensi pencapaian tujuan organisasi.</li>
              <li>Keandalan pelaporan keuangan.</li>
              <li>Pengamanan aset negara.</li>
              <li>Ketaatan terhadap peraturan perundang-undangan.</li>
            </ol>
          </h2>
        </div>

        <!-- Text Box 2: Fokusan penyelenggaraan SPIP (50%) -->
        <div class="hero-text-box d-flex flex-column align-items-center" style="width: 50%; color: #000; padding: 1rem; position: relative;">
          <h1 style="font-size: 1.75rem; font-weight: bold; position: absolute; top: 0; transform: translateY(-50%);">Fokusan penyelenggaraan SPIP</h1>
          <h2 style="font-size: 1rem; font-weight: normal; text-align: justify; margin-top: 2rem;">
            Politeknik Negeri Bandung bertanggung jawab untuk menyelenggarakan pengendalian intern dengan fokus pada:
            <ol>
              <li>Identifikasi dan pemantauan risiko.</li>
              <li>Pengendalian korupsi.</li>
              <li>Dukungan peran Satuan Pengawas Internal (SPI) yang kapabel menjadi kunci keberhasilan pencapaian tujuan institusi.</li>
            </ol>
          </h2>
        </div>
      </div>

    </div>
  </section>
  <!-- Hero: End -->

  {{-- <!-- Useful features: Start -->
  <section id="landingFeatures" class="section-py landing-features">
    <div class="container">
      <div class="text-center mb-3 pb-1">
        <span class="badge bg-label-primary">Useful Features</span>
      </div>
      <h3 class="text-center mb-1">
        <span class="position-relative fw-bold z-1">Everything you need
          <img src="{{asset('assets/img/front-pages/icons/section-title-icon.png')}}" alt="laptop charging" class="section-title-img position-absolute object-fit-contain bottom-0 z-n1">
        </span>
        to start your next project
      </h3>
      <p class="text-center mb-3 mb-md-5 pb-3">
        Not just a set of tools, the package includes ready-to-deploy conceptual application.
      </p>
      <div class="features-icon-wrapper row gx-0 gy-4 g-sm-5">
        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/laptop.png')}}" alt="laptop charging" />
          </div>
          <h5 class="mb-3">Quality Code</h5>
          <p class="features-icon-description">
            Code structure that all developers will easily understand and fall in love with.
          </p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/rocket.png')}}" alt="transition up" />
          </div>
          <h5 class="mb-3">Continuous Updates</h5>
          <p class="features-icon-description">
            Free updates for the next 12 months, including new demos and features.
          </p>
        </div>
        <div class="col-lg-4 col-sm-6 text-center features-icon-box">
          <div class="text-center mb-3">
            <img src="{{asset('assets/img/front-pages/icons/paper.png')}}" alt="edit" />
          </div>
          <h5 class="mb-3">Stater-Kit</h5>
          <p class="features-icon-description">
            Start your project quickly without having to remove unnecessary features.
          </p>
        </div>
      </div>
    </div>
  </section> --}}
</div>

{{-- @if($message = Session::get('success'))
  <script>
    Swal.fire({
      icon: 'success',
      title: '{{ $message }}',
      showConfirmButton: false,
      timer: 1500
    });
  </script>
@endif --}}

@endsection
