<!-- Footer: Start -->
<footer class="landing-footer bg-body footer-text">
  <div class="footer-top position-relative overflow-hidden z-1">
    <img src="{{asset('assets/img/front-pages/backgrounds/footer-bg-'.$configData['style'].'.png')}}" alt="footer bg" class="footer-bg banner-bg-img z-n1" data-app-light-img="front-pages/backgrounds/footer-bg-light1.png" data-app-dark-img="front-pages/backgrounds/footer-bg-dark.png" />
    <div class="container">
      <div class="row gx-0 gy-4 g-md-5">
        <div class="col-lg-5 d-flex align-items-center">
          <a href="{{url('front-pages/landing')}}" class="app-brand-link mb-4 d-flex align-items-center">
            <span class="app-brand-logo demo" style="width: 77px; height: auto; margin-left: 88px;">@include('_partials.macros',['height'=>60,'withbg' => "fill: #fff;"])</span>
            <div class="text-block" style="display: flex; flex-direction: column;">
              <span class="app-brand-text demo footer-link fw-bold ms-2 ps-1" style="color: #001B82; font-size: 1.5rem;">Politeknik Negeri Bandung</span>
              <span class="footer-link ms-2 ps-1" style="color: #F47C20; font-size: 1.2rem;">Assuring Your Future</span>
            </div>
          </a>
          {{-- <p class="footer-text footer-logo-description mb-4">
            Most developer friendly & highly customisable Admin Dashboard Template.
          </p> --}}
          {{-- <form class="footer-form">
            <label for="footer-email" class="small">Subscribe to newsletter</label>
            <div class="d-flex mt-1">
              <input type="email" class="form-control rounded-0 rounded-start-bottom rounded-start-top" id="footer-email" placeholder="Your email" />
              <button type="submit" class="btn btn-primary shadow-none rounded-0 rounded-end-bottom rounded-end-top">
                Subscribe
              </button>
            </div>
          </form> --}}
        </div>
        <div class="col-lg-7 d-flex justify-content-end footer-right" style="color: #fff; font-size: 0.9rem;">
          <div style="margin-top:30px; margin-bottom: 30px; margin-right:130px;">
            <p>Jl. Gegerkalong Hilir, Ciwaruga, Kec. Parongpong,</p>
            <p>Kabupaten Bandung Barat, Jawa Barat</p>
            <p>Kode Pos 40559 | Kotak Pos Bandung 1234</p>
            <p>Telepon: 022 – 2013789 | 022 – 2015271</p>
            <p>Fax: 022 – 2013889</p>
            <p>Email: polban@polban.ac.id</p>
          </div>
        </div>
        {{-- <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-4">Demos</h6>
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="/demo-1" target="_blank" class="footer-link">Vertical Layout</a>
            </li>
            <li class="mb-3">
              <a href="/demo-5" target="_blank" class="footer-link">Horizontal Layout</a>
            </li>
            <li class="mb-3">
              <a href="/demo-2" target="_blank" class="footer-link">Bordered Layout</a>
            </li>
            <li class="mb-3">
              <a href="/demo-3" target="_blank" class="footer-link">Semi Dark Layout</a>
            </li>
            <li class="mb-3">
              <a href="/demo-4" target="_blank" class="footer-link">Dark Layout</a>
            </li>
          </ul>
        </div> --}}
        {{-- <div class="col-lg-2 col-md-4 col-sm-6">
          <h6 class="footer-title mb-4">Pages</h6>
          <ul class="list-unstyled">
            <li class="mb-3">
              <a href="{{url('/front-pages/pricing')}}" class="footer-link">Pricing</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/payment')}}" class="footer-link">Payment<span class="badge rounded bg-primary ms-2">New</span></a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/checkout')}}" class="footer-link">Checkout</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/front-pages/help-center')}}" class="footer-link">Help Center</a>
            </li>
            <li class="mb-3">
              <a href="{{url('/auth/login-cover')}}" target="_blank" class="footer-link">Login/Register</a>
            </li>
          </ul>
        </div> --}}
        {{-- <div class="col-lg-3 col-md-4">
          <h6 class="footer-title mb-4">Download our app</h6>
          <a href="javascript:void(0);" class="d-block footer-link mb-3 pb-2"><img src="{{asset('assets/img/front-pages/landing-page/apple-icon.png')}}" alt="apple icon" /></a>
          <a href="javascript:void(0);" class="d-block footer-link"><img src="{{asset('assets/img/front-pages/landing-page/google-play-icon.png')}}" alt="google play icon" /></a>
        </div> --}}
      </div>
    </div>
  </div>
  <div class="footer-bottom py-3" style="background-color: #192A77">
    <div class="container d-flex flex-wrap justify-content-between flex-md-row flex-column text-center text-md-start">
      <div class="mb-2 mb-md-0">
        <span class="footer-text">©
          <script>
          document.write(new Date().getFullYear());

          </script>
        </span>
        <a href="{{config('variables.creatorUrl')}}" target="_blank" class="fw-medium text-white footer-link">{{config('variables.creatorName')}},</a>
        <span class="footer-text">Politeknik Negeri Bandung</span>
      </div>
      <div>
        <a href="{{config('variables.githubUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/github-'.$configData['style'].'.png') }}" alt="github icon" data-app-light-img="front-pages/icons/github-light.png" data-app-dark-img="front-pages/icons/github-dark.png" />
        </a>
        <a href="{{config('variables.facebookUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/facebook-'.$configData['style'].'.png') }}" alt="facebook icon" data-app-light-img="front-pages/icons/facebook-light.png" data-app-dark-img="front-pages/icons/facebook-dark.png" />
        </a>
        <a href="{{config('variables.twitterUrl')}}" class="footer-link me-3" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/twitter-'.$configData['style'].'.png') }}" alt="twitter icon" data-app-light-img="front-pages/icons/twitter-light.png" data-app-dark-img="front-pages/icons/twitter-dark.png" />
        </a>
        <a href="{{config('variables.instagramUrl')}}" class="footer-link" target="_blank">
          <img src="{{asset('assets/img/front-pages/icons/instagram-'.$configData['style'].'.png') }}" alt="google icon" data-app-light-img="front-pages/icons/instagram-light.png" data-app-dark-img="front-pages/icons/instagram-dark.png" />
        </a>
      </div>
    </div>
  </div>
</footer>
<!-- Footer: End -->
