@extends('recruiter.layouts.user_type.guest')

@section('content')

<main class="main-content  mt-0">
  <section>
    <div class="page-header min-vh-75">
      <div class="container">
        <div class="row">
          <div class="col-lg-7 d-flex flex-column mx-auto pb-6">
            <div class="card mt-8 py-md-4 px-md-6">
              <div class="card-header pb-0 text-center bg-transparent">
                <h3 class="font-weight-bolder text-primary">Đăng nhập tài khoản nhà tuyển dụng</h3>
                <p class="mb-0">Đăng nhập tài khoản nhà tuyển dụng để tiến hành đăng tuyển ngay<br></p>
              </div>
              <div class="card-body">
                @error('error')
                <p class="text-danger text-center font-weight-bold m-0">{{ $message }}</p>
                @enderror
                <form role="form" method="POST" action="/session">
                  @csrf
                  <label>Email</label>
                  <div class="mb-3">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ old('email') }}" aria-label="Email" aria-describedby="email-addon">
                    @error('email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <label>Mật khẩu</label>
                  <div class="mb-3">
                    <input type="password" class="form-control" name="password" id="password" placeholder="Mật khẩu" aria-label="Password" aria-describedby="password-addon">
                    @error('password')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                  <!-- <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" class="btn bg-primary text-white w-100 mt-4 mb-0">Đăng nhập</button>
                  </div>
                </form>
              </div>
              <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Quên mật khẩu? Đặt lại mật khẩu tại
                  <a href="/login/forgot-password" class="text-primary font-weight-bold font-weight-bolder">đây</a>
                </small>
                <p class="text-sm mx-auto mb-0">
                  Chưa có tài khoản?
                  <a href="register" class="text-primary font-weight-bold font-weight-bolder">Đăng ký ngay</a>
                </p>
              </div>
            </div>
          </div>
          <!-- <div class="col-md-6">
            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
              <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('/assets/recruiter/img/curved-images/curved6.jpg')"></div>
            </div>
          </div> -->
        </div>
      </div>
    </div>
  </section>
</main>

@endsection