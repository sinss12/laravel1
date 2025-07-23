<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>@yield('title', 'CelestialUI Register')</title>

  <!-- base:css -->
  <link rel="stylesheet" href="{{ url('assets/css/vendor.bundle.base.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/typicons.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

  <!-- Hide navbar & sidebar -->
  <style>
    .page-body-wrapper.full-page-wrapper .navbar,
    .page-body-wrapper.full-page-wrapper .sidebar {
      display: none !important;
    }
  </style>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/typicons/2.1.2/typicons.min.css">
  <link rel="shortcut icon" href="{{ url('assets/images/favicon.png') }}" />
</head>
<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center mb-3">
                <img src="{{ url('assets/images/logo.svg') }}" alt="logo">
              </div>
              <h4>New here?</h4>
              <h6 class="font-weight-light">Create your account</h6>

              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="pt-3">
                @csrf

                <div class="form-group">
                  <input type="text" name="name" class="form-control form-control-lg" placeholder="Full Name" value="{{ old('name') }}" required>
                  @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <input type="email" name="email" class="form-control form-control-lg" placeholder="Email" value="{{ old('email') }}" required>
                  @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required>
                  @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" placeholder="Confirm Password" required>
                </div>

                <div class="form-group">
                  <label class="d-block">Jenis Kelamin</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jkLaki" value="Laki-laki" required>
                    <label class="form-check-label" for="jkLaki">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jenis_kelamin" id="jkPerempuan" value="Perempuan">
                    <label class="form-check-label" for="jkPerempuan">Perempuan</label>
                  </div>
                  @error('jenis_kelamin') <br><small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <label>Foto Profil</label>
                  <input type="file" name="foto" class="form-control form-control-lg" accept="image/*">
                  @error('foto') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="form-group">
                  <textarea name="alamat" class="form-control form-control-lg" rows="3" placeholder="Alamat Lengkap" required>{{ old('alamat') }}</textarea>
                  @error('alamat') <small class="text-danger">{{ $message }}</small> @enderror
                </div>

                <div class="mb-4">
                  <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input" required>
                      Saya menyetujui Syarat & Ketentuan
                    </label>
                  </div>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    Daftar
                  </button>
                </div>

                <div class="text-center mt-4 font-weight-light">
                  Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- JS -->
  <script src="{{ url('assets/js/vendor.bundle.base.js') }}"></script>
  <script src="{{ url('assets/js/off-canvas.js') }}"></script>
  <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
  <script src="{{ url('assets/js/template.js') }}"></script>
  <script src="{{ url('assets/js/settings.js') }}"></script>
  <script src="{{ url('assets/js/todolist.js') }}"></script>
</body>
</html>
