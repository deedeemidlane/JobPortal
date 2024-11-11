<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 " id="sidenav-main">
  <div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
    <a class="m-0 navbar-brand text-wrap text-center p-1" href="#">
      <div class="font-bold text-xl fs-5"><i class="bi bi-briefcase-fill"></i> ENUY </div>
      <p class="mb-0 underline underline-offset-4">ADMIN</p>
    </a>
  </div>
  <hr class="horizontal dark mt-0">
  <div class="collapse navbar-collapse  w-auto" id="sidenav-collapse-main">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('company/users') || Request::is('company/users/*') ? 'active' : '') }}" href="{{ url('company/users') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 1rem;" class="fas fa-lg fa-list-ul ps-2 pe-2 text-center text-dark {{ (Request::is('company/users') || Request::is('company/users/*') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý tài khoản</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('company/recruitment-news') || Request::is('company/recruitment-news/*') ? 'active' : '') }}" href="{{ url('company/recruitment-news') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <!-- <i style="font-size: 1rem;" class="fas fa-solid fa-lg fa-newspaper ps-2 pe-2 text-center text-dark {{ (Request::is('company/recruitment-news') || Request::is('company/recruitment-news/*') ? 'text-white' : 'text-dark') }} " aria-hidden="true"></i> -->
            <i style="font-size: 0.9rem" class="bi bi-newspaper pb-1 {{ (Request::is('company/recruitment-news') || Request::is('company/recruitment-news/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý tin tuyển dụng</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('company/applications') || Request::is('company/applications/*') ? 'active' : '') }}" href="{{ url('company/applications') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 0.9rem" class="bi bi-people-fill pb-1 {{ (Request::is('company/applications') || Request::is('company/applications/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý ứng viên</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link {{ (Request::is('company/interview-management') || Request::is('company/interview-management/*') ? 'active' : '') }}" href="{{ url('company/interview-management') }}">
          <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
            <i style="font-size: 0.9rem" class="bi bi-headset pb-1 {{ (Request::is('company/interview-management') || Request::is('company/interview-management/*') ? 'text-white' : 'text-dark') }}"></i>
          </div>
          <span class="nav-link-text ms-1">Quản lý lịch phỏng vấn</span>
        </a>
      </li>
    </ul>
  </div>
</aside>