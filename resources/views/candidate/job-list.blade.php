@extends('candidate.layouts.default')

@section('content')

<!-- Header End -->
<div class="container-xxl py-5 bg-dark page-header">
    <div class="container my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Danh sách việc làm</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-uppercase">
                <li class="breadcrumb-item"><a href="/" class="text-light">Trang chủ</a></li>
                <!-- <li class="breadcrumb-item"><a href="#" class="text-white">Pages</a></li> -->
                <li class="breadcrumb-item text-white active" aria-current="page">Danh sách việc làm</li>
            </ol>
        </nav>
    </div>
</div>
<!-- Header End -->

<!-- Search Start -->
<div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
    <div class="container">
        <form method="POST" action="/job-search">
            <div class="row g-4">
                <div class="col-md-10">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <input type="text" class="form-control border-0" placeholder="Vị trí tuyển dụng" />
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Chọn địa điểm</option>
                                <option value="Hà Nội">Hà Nội</option>
                                <option value="Hồ Chí Minh">Hồ Chí Minh</option>
                                <option value="Bình Dương">Bình Dương</option>
                                <option value="Bắc Ninh">Bắc Ninh</option>
                                <option value="Đồng Nai">Đồng Nai</option>
                                <option value="Hưng Yên">Hưng Yên</option>
                                <option value="Hải Dương">Hải Dương</option>
                                <option value="Đà Nẵng">Đà Nẵng</option>
                                <option value="Hải Phòng">Hải Phòng</option>
                                <option value="An Giang">An Giang</option>
                                <option value="Bà Rịa-Vũng Tàu">Bà Rịa-Vũng Tàu</option>
                                <option value="Bắc Giang">Bắc Giang</option>
                                <option value="Bắc Kạn">Bắc Kạn</option>
                                <option value="Bạc Liêu">Bạc Liêu</option>
                                <option value="Bến Tre">Bến Tre</option>
                                <option value="Bình Định">Bình Định</option>
                                <option value="Bình Phước">Bình Phước</option>
                                <option value="Bình Thuận">Bình Thuận</option>
                                <option value="Cà Mau">Cà Mau</option>
                                <option value="Cần Thơ">Cần Thơ</option>
                                <option value="Cao Bằng">Cao Bằng</option>
                                <option value="Cửu Long">Cửu Long</option>
                                <option value="Đắk Lắk">Đắk Lắk</option>
                                <option value="Đắc Nông">Đắc Nông</option>
                                <option value="Điện Biên">Điện Biên</option>
                                <option value="Đồng Tháp">Đồng Tháp</option>
                                <option value="Gia Lai">Gia Lai</option>
                                <option value="Hà Giang">Hà Giang</option>
                                <option value="Hà Nam">Hà Nam</option>
                                <option value="Hà Tĩnh">Hà Tĩnh</option>
                                <option value="Hậu Giang">Hậu Giang</option>
                                <option value="Hoà Bình">Hoà Bình</option>
                                <option value="Khánh Hoà">Khánh Hoà</option>
                                <option value="Kiên Giang">Kiên Giang</option>
                                <option value="Kon Tum">Kon Tum</option>
                                <option value="Lai Châu">Lai Châu</option>
                                <option value="Lâm Đồng">Lâm Đồng</option>
                                <option value="Lạng Sơn">Lạng Sơn</option>
                                <option value="Lào Cai">Lào Cai</option>
                                <option value="Long An">Long An</option>
                                <option value="Miền Bắc">Miền Bắc</option>
                                <option value="Miền Nam">Miền Nam</option>
                                <option value="Miền Trung">Miền Trung</option>
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
                                <option value="Thanh Hoá">Thanh Hoá</option>
                                <option value="Thừa Thiên Huế">Thừa Thiên Huế</option>
                                <option value="Tiền Giang">Tiền Giang</option>
                                <option value="Toàn Quốc">Toàn Quốc</option>
                                <option value="Trà Vinh">Trà Vinh</option>
                                <option value="Tuyên Quang">Tuyên Quang</option>
                                <option value="Vĩnh Long">Vĩnh Long</option>
                                <option value="Vĩnh Phúc">Vĩnh Phúc</option>
                                <option value="Yên Bái">Yên Bái</option>
                                <option value="Nước Ngoài">Nước Ngoài</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Chọn ngành nghề</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100" type="submit">Tìm kiếm</button>
                </div> -->

                <div class="col-md-10">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Chức vụ</option>
                                <option value="1">Chức vụ 1</option>
                                <option value="2">Chức vụ 2</option>
                                <option value="3">Chức vụ 3</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Mức lương</option>
                                <option value="">Dưới 10 triệu</option>
                                <option value="">10 - 15 triệu</option>
                                <option value="">25 - 20 triệu</option>
                                <option value="">25 - 30 triệu</option>
                                <option value="">30 - 50 triệu</option>
                                <option value="">Trên 50 triệu</option>
                                <option value="">Thỏa thuận</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <select class="form-select border-0">
                                <option selected>Trình độ</option>
                                <option value="1">Trình độ 1</option>
                                <option value="2">Trình độ 2</option>
                                <option value="3">Trình độ 3</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-dark border-0 w-100" type="submit">Tìm kiếm</button>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Jobs Start -->
<div class="container-xxl pb-5">
    <div class="container">
        <!-- <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">Việc làm tốt nhất</h1> -->
        <div class="text-center wow fadeInUp" data-wow-delay="0.3s">
            <!-- <div class="tab-content"> -->
            <div class="fade show p-0 active">
                @foreach($jobs as $job)
                <div class="job-item p-4 mb-4">
                    <div class="row g-4">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            <!-- <img class="flex-shrink-0 img-fluid border rounded" src="/assets/candidate/img/com-logo-1.jpg" alt="" style="width: 80px; height: 80px;"> -->
                            <div class="text-start ps-4">
                                <h5 class="mb-3">{{$job->name}}</h5>
                                <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$job->location}}</span>
                                <span class="text-truncate me-3"><i class="fa fa-clock text-primary me-2"></i>{{$job->employment_type}}</span>
                                <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>{{$job->salary}}</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                            <div class="d-flex mb-3">
                                <a class="btn btn-light btn-square me-3" href=""><i class="far fa-heart text-primary"></i></a>
                                <a class="btn btn-primary" href="/jobs/{{$job->id}}#job-detail">Xem chi tiết</a>
                            </div>
                            <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>Hạn ứng tuyển: {{$job->deadline}}</small>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>
<!-- Jobs End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


@endsection