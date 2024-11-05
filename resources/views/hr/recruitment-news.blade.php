@extends('hr.layouts.app')

@section('content')

<div class="mx-4">
  <div class="card">
    <div class="card-header pb-0 px-4">
      <div class="d-flex flex-row justify-content-between">
        <div>
          <h5 class="mb-0">Danh sách tin tuyển dụng</h5>
        </div>
        <a href="/hr/recruitment-news/create" class="btn bg-gradient-primary btn-sm mb-0 d-flex align-items-center gap-2 px-4" type="button">
          <span class="text-md">+</span>
          Tạo tin tuyển dụng mới
        </a>
      </div>
    </div>
    <div class="card-body p-4">
      <ul class="list-group">
        @foreach($jobs as $job)
        <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
          <div class="d-flex flex-column">
            <h6 class="mb-3">{{$job->name}}</h6>
            <div class="d-lg-flex gap-4 d-block">
              <div class="mb-2 text-sm">
                <i class="bi bi-geo-alt-fill text-primary"></i>
                <span class="text-dark  ms-sm-1">{{$job->location}}</span>
              </div>
              <div class="mb-2 text-sm">
                <i class="bi bi-clock text-primary"></i>
                <span class="text-dark ms-sm-1 ">{{$job->employment_type}}</span>
              </div>
              <div class="text-sm">
                <i class="bi bi-cash text-primary"></i>
                <span class="text-dark ms-sm-1 ">{{$job->salary}}</span>
              </div>
              <div class="text-sm">
                <i class="bi bi-calendar-event-fill text-primary"></i>
                <span class="text-dark ms-sm-1 ">{{$job->deadline}}</span>
              </div>
            </div>
          </div>
          <div class="ms-auto text-end">
            <a class="btn btn-link text-dark px-3 mb-0 d-block d-lg-inline-block" href="javascript:;">
              <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Chỉnh sửa
            </a>
            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;">
              <i class="far fa-trash-alt me-2"></i>Xóa
            </a>
          </div>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</div>

@endsection