@extends('recruiter.layouts.user_type.guest')

@section('content')

<section class="min-vh-100 mb-8">
  <div class="page-header align-items-start min-vh-50 pt-5 pb-11 mx-3 border-radius-lg" style="background-image: url('/assets/recruiter/img/curved-images/curved14.jpg');">
    <span class="mask bg-gradient-dark opacity-6"></span>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8 text-center mx-auto">
          <h1 class="text-white mb-2 mt-5">Đăng ký tài khoản nhà tuyển dụng!</h1>
          <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row mt-lg-n10 mt-md-n11 mt-n10">
      <div class="col-lg-7 mx-auto">
        <div class="card z-index-0">
          <!-- <div class="card-header text-center pt-4">
            <h5>Register with</h5>
          </div>
          <div class="row px-xl-5 px-sm-4 px-3">
            <div class="col-3 ms-auto px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink32">
                  <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="facebook-3" transform="translate(3.000000, 3.000000)" fill-rule="nonzero">
                      <circle id="Oval" fill="#3C5A9A" cx="29.5091719" cy="29.4927506" r="29.4882047"></circle>
                      <path d="M39.0974944,9.05587273 L32.5651312,9.05587273 C28.6886088,9.05587273 24.3768224,10.6862851 24.3768224,16.3054653 C24.395747,18.2634019 24.3768224,20.1385313 24.3768224,22.2488655 L19.8922122,22.2488655 L19.8922122,29.3852113 L24.5156022,29.3852113 L24.5156022,49.9295284 L33.0113092,49.9295284 L33.0113092,29.2496356 L38.6187742,29.2496356 L39.1261316,22.2288395 L32.8649196,22.2288395 C32.8649196,22.2288395 32.8789377,19.1056932 32.8649196,18.1987181 C32.8649196,15.9781412 35.1755132,16.1053059 35.3144932,16.1053059 C36.4140178,16.1053059 38.5518876,16.1085101 39.1006986,16.1053059 L39.1006986,9.05587273 L39.0974944,9.05587273 L39.0974944,9.05587273 Z" id="Path" fill="#FFFFFF"></path>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
            <div class="col-3 px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="apple-black" transform="translate(7.000000, 0.564551)" fill="#000000" fill-rule="nonzero">
                      <path d="M40.9233048,32.8428307 C41.0078713,42.0741676 48.9124247,45.146088 49,45.1851909 C48.9331634,45.4017274 47.7369821,49.5628653 44.835501,53.8610269 C42.3271952,57.5771105 39.7241148,61.2793611 35.6233362,61.356042 C31.5939073,61.431307 30.2982233,58.9340578 25.6914424,58.9340578 C21.0860585,58.9340578 19.6464932,61.27947 15.8321878,61.4314159 C11.8738936,61.5833617 8.85958554,57.4131833 6.33064852,53.7107148 C1.16284874,46.1373849 -2.78641926,32.3103122 2.51645059,22.9768066 C5.15080028,18.3417501 9.85858819,15.4066355 14.9684701,15.3313705 C18.8554146,15.2562145 22.5241194,17.9820905 24.9003639,17.9820905 C27.275104,17.9820905 31.733383,14.7039812 36.4203248,15.1854154 C38.3824403,15.2681959 43.8902255,15.9888223 47.4267616,21.2362369 C47.1417927,21.4153043 40.8549638,25.1251794 40.9233048,32.8428307 M33.3504628,10.1750144 C35.4519466,7.59650964 36.8663676,4.00699306 36.4804992,0.435448578 C33.4513624,0.558856931 29.7884601,2.48154382 27.6157341,5.05863265 C25.6685547,7.34076135 23.9632549,10.9934525 24.4233742,14.4943068 C27.7996959,14.7590956 31.2488715,12.7551531 33.3504628,10.1750144" id="Shape"></path>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
            <div class="col-3 me-auto px-1">
              <a class="btn btn-outline-light w-100" href="javascript:;">
                <svg width="24px" height="32px" viewBox="0 0 64 64" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <g id="Artboard" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="google-icon" transform="translate(3.000000, 2.000000)" fill-rule="nonzero">
                      <path d="M57.8123233,30.1515267 C57.8123233,27.7263183 57.6155321,25.9565533 57.1896408,24.1212666 L29.4960833,24.1212666 L29.4960833,35.0674653 L45.7515771,35.0674653 C45.4239683,37.7877475 43.6542033,41.8844383 39.7213169,44.6372555 L39.6661883,45.0037254 L48.4223791,51.7870338 L49.0290201,51.8475849 C54.6004021,46.7020943 57.8123233,39.1313952 57.8123233,30.1515267" id="Path" fill="#4285F4"></path>
                      <path d="M29.4960833,58.9921667 C37.4599129,58.9921667 44.1456164,56.3701671 49.0290201,51.8475849 L39.7213169,44.6372555 C37.2305867,46.3742596 33.887622,47.5868638 29.4960833,47.5868638 C21.6960582,47.5868638 15.0758763,42.4415991 12.7159637,35.3297782 L12.3700541,35.3591501 L3.26524241,42.4054492 L3.14617358,42.736447 C7.9965904,52.3717589 17.959737,58.9921667 29.4960833,58.9921667" id="Path" fill="#34A853"></path>
                      <path d="M12.7159637,35.3297782 C12.0932812,33.4944915 11.7329116,31.5279353 11.7329116,29.4960833 C11.7329116,27.4640054 12.0932812,25.4976752 12.6832029,23.6623884 L12.6667095,23.2715173 L3.44779955,16.1120237 L3.14617358,16.2554937 C1.14708246,20.2539019 0,24.7439491 0,29.4960833 C0,34.2482175 1.14708246,38.7380388 3.14617358,42.736447 L12.7159637,35.3297782" id="Path" fill="#FBBC05"></path>
                      <path d="M29.4960833,11.4050769 C35.0347044,11.4050769 38.7707997,13.7975244 40.9011602,15.7968415 L49.2255853,7.66898166 C44.1130815,2.91684746 37.4599129,0 29.4960833,0 C17.959737,0 7.9965904,6.62018183 3.14617358,16.2554937 L12.6832029,23.6623884 C15.0758763,16.5505675 21.6960582,11.4050769 29.4960833,11.4050769" id="Path" fill="#EB4335"></path>
                    </g>
                  </g>
                </svg>
              </a>
            </div>
            <div class="mt-2 position-relative text-center">
              <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                or
              </p>
            </div>
          </div> -->
          <div class="card-body">
            <form role="form text-left" method="POST" action="/register">
              @csrf
              <h5 class="mb-3">Tài khoản</h5>
              <div class="mb-3">
                <label for="email">Email đăng nhập <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Email" name="email" id="email" aria-label="Email" aria-describedby="email-addon" value="{{ old('email') }}">
                @error('email')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>
              <div class="mb-3">
                <label for="password">Mật khẩu <span class="text-danger">*</span></label>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="password" id="password" aria-label="Password" aria-describedby="password-addon">
                @error('password')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <h5 class="py-3">Thông tin nhà tuyển dụng</h5>
              <div class="mb-3">
                <label for="name">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Họ và tên" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                @error('name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                <input type="tel" maxlength="10" class="form-control" placeholder="Số điện thoại" name="phone" id="phone" aria-label="Phone" aria-describedby="phone" value="{{ old('phone') }}">
                @error('phone')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="company_name">Công ty <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Tên công ty" name="company_name" id="company_name" aria-label="company_name" aria-describedby="company_name" value="{{ old('company_name') }}">
                @error('company_name')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="province">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                <select class="form-select" name="province" id="province" aria-label="province" aria-describedby="province">
                  <option value="">Chọn tỉnh/thành phố</option>
                  <option value="An Giang">An Giang</option>
                  <option value="Bà Rịa - Vũng Tàu">Bà Rịa - Vũng Tàu</option>
                  <option value="Bạc Liêu">Bạc Liêu</option>
                  <option value="Bắc Giang">Bắc Giang</option>
                  <option value="Bắc Kạn">Bắc Kạn</option>
                  <option value="Bắc Ninh">Bắc Ninh</option>
                  <option value="Bến Tre">Bến Tre</option>
                  <option value="Bình Dương">Bình Dương</option>
                  <option value="Bình Định">Bình Định</option>
                  <option value="Bình Phước">Bình Phước</option>
                  <option value="Bình Thuận">Bình Thuận</option>
                  <option value="Cà Mau">Cà Mau</option>
                  <option value="Cao Bằng">Cao Bằng</option>
                  <option value="Cần Thơ">Cần Thơ</option>
                  <option value="Đà Nẵng">Đà Nẵng</option>
                  <option value="Đắk Lắk">Đắk Lắk</option>
                  <option value="Đắk Nông">Đắk Nông</option>
                  <option value="Điện Biên">Điện Biên</option>
                  <option value="Đồng Nai">Đồng Nai</option>
                  <option value="Đồng Tháp">Đồng Tháp</option>
                  <option value="Gia Lai">Gia Lai</option>
                  <option value="Hà Giang">Hà Giang</option>
                  <option value="Hà Nam">Hà Nam</option>
                  <option value="Hà Nội">Hà Nội</option>
                  <option value="Hà Tĩnh">Hà Tĩnh</option>
                  <option value="Hải Dương">Hải Dương</option>
                  <option value="Hải Phòng">Hải Phòng</option>
                  <option value="Hậu Giang">Hậu Giang</option>
                  <option value="Hòa Bình">Hòa Bình</option>
                  <option value="Hưng Yên">Hưng Yên</option>
                  <option value="Khánh Hòa">Khánh Hòa</option>
                  <option value="Kiên Giang">Kiên Giang</option>
                  <option value="Kon Tum">Kon Tum</option>
                  <option value="Lai Châu">Lai Châu</option>
                  <option value="Lâm Đồng">Lâm Đồng</option>
                  <option value="Lạng Sơn">Lạng Sơn</option>
                  <option value="Lào Cai">Lào Cai</option>
                  <option value="Long An">Long An</option>
                  <option value="Nam Định">Nam Định</option>
                  <option value="Nghệ An">Nghệ An</option>
                  <option value="Ninh Bình">Ninh Bình</option>
                  <option value="Ninh Thuận">Ninh Thuận</option>
                  <option value="Phú Thọ">Phú Thọ</option>
                  <option value="Phú Yên">Phú Yên</option>
                  <option value="Quảng Bình">Quảng Bình</option>
                  <option value="Quảng Nam">Quảng Nam</option>
                  <option value="Quảng Ngãi">Quảng Ngãi</option>
                  <option value="Quảng Ninh">Quảng Ninh</option>
                  <option value="Quảng Trị">Quảng Trị</option>
                  <option value="Sóc Trăng">Sóc Trăng</option>
                  <option value="Sơn La">Sơn La</option>
                  <option value="Tây Ninh">Tây Ninh</option>
                  <option value="Thái Bình">Thái Bình</option>
                  <option value="Thái Nguyên">Thái Nguyên</option>
                  <option value="Thanh Hóa">Thanh Hóa</option>
                  <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                  <option value="Tiền Giang">Tiền Giang</option>
                  <option value="TP Hồ Chí Minh">TP Hồ Chí Minh</option>
                  <option value="Trà Vinh">Trà Vinh</option>
                  <option value="Tuyên Quang">Tuyên Quang</option>
                  <option value="Vĩnh Long">Vĩnh Long</option>
                  <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                  <option value="Yên Bái">Yên Bái</option>
                </select>
                @error('province')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>

              <div class="mb-3">
                <label for="address">Địa chỉ <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Địa chỉ (Tên đường, quận/huyện,...)" name="address" id="address" aria-label="company_name" aria-describedby="address" value="{{ old('address') }}">
                @error('address')
                <p class="text-danger text-xs mt-2">{{ $message }}</p>
                @enderror
              </div>


              <!-- <div class="form-check form-check-info text-left">
                <input class="form-check-input" type="checkbox" name="agreement" id="flexCheckDefault" checked>
                <label class="form-check-label" for="flexCheckDefault">
                  I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and Conditions</a>
                </label>
                @error('agreement')
                <p class="text-danger text-xs mt-2">First, agree to the Terms and Conditions, then try register again.</p>
                @enderror
              </div> -->

              <div class="text-center">
                <button type="submit" class="btn bg-primary text-white w-100 my-4 mb-2">Đăng ký</button>
              </div>
              <p class="text-sm mt-3 mb-0">Đã có tài khoản? <a href="login" class="text-primary font-weight-bolder">Đăng nhập</a></p>

              <!-- <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Đăng ký</button>
              </div>
              <p class="text-sm mt-3 mb-0">Đã có tài khoản? <a href="login" class="text-dark font-weight-bolder">Đăng nhập</a></p> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection