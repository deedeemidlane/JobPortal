@extends('admin.layouts.user_type.guest')

@section('content')

<main class="main-content mt-0">
  <section>
    <div class="page-header min-vh-50">
      <div class="container">
        <div class="row vh-100 align-items-center">
          <div class="col-lg-5 d-flex flex-column mx-auto py-6">
            <div class="card py-md-4 px-md-5">
              <div class="card-header pb-0 text-center bg-transparent">
                <a class="align-items-center d-flex justify-content-center m-0 navbar-brand text-wrap" href="/">
                  <img src="/assets/admin/img/logo-ct.png" height="30" class="navbar-brand-img" alt="...">
                  <span class="ms-3 font-weight-bold">Enuy - Job portal website</span>
                </a>
                <h3 class="font-weight-bolder text-primary">Đăng nhập</h3>
                <!-- <p class="mb-0">Đăng nhập tài khoản nhà tuyển dụng để tiến hành đăng tuyển ngay<br></p> -->
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
              <!-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
                <small class="text-muted">Quên mật khẩu? Đặt lại mật khẩu tại
                  <a href="/login/forgot-password" class="text-primary font-weight-bold font-weight-bolder">đây</a>
                </small>
                <p class="text-sm mx-auto mb-0">
                  Chưa có tài khoản?
                  <a href="register" class="text-primary font-weight-bold font-weight-bolder">Đăng ký ngay</a>
                </p>
              </div> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>

@endsection