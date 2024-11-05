<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="#">
      <img src="/assets/admin/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
      <span class="ms-3 font-weight-bold">Enuy - Job portal website</span>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav pb-6">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('hr/recruitment-news') || Request::is('hr/recruitment-news/*') ? 'active' : '') }}" href="{{ url('hr/recruitment-news') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!-- <i style="font-size: 1rem;" class="fas fa-solid fa-lg fa-newspaper ps-2 pe-2 text-center text-dark {{ (Request::is('hr/recruitment-news') || Request::is('hr/recruitment-news/*') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i> -->
            <i style="font-size: 0.9rem" class="bi bi-newspaper pb-1 {{ (Request::is('hr/recruitment-news') || Request::is('hr/recruitment-news/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý tin tuyển dụng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('hr/candidate-management') || Request::is('hr/candidate-management/*') ? 'active' : '') }}" href="{{ url('hr/candidate-management') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 0.9rem" class="bi bi-people-fill pb-1 {{ (Request::is('hr/candidate-management') || Request::is('hr/candidate-management/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý ứng viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('hr/interview-management') || Request::is('hr/interview-management/*') ? 'active' : '') }}" href="{{ url('hr/interview-management') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 0.9rem" class="bi bi-headset pb-1 {{ (Request::is('hr/interview-management') || Request::is('hr/interview-management/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý lịch phỏng vấn</span>
        </a>
      </li>
    </ul>
  </div>
</aside>