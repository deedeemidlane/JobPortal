@extends('company.layouts.app')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-body p-5">
        <!-- Head -->
        <div class="flex justify-between items-center pb-4 mb-4 border-b">
          <div class="flex items-center gap-2">
            <img src="/user.png" alt="user avatar" width="50px" class="">
            <div>
              <div class="font-bold">{{$application->candidate->name}}</div>
              <div>Ngày tạo hồ sơ: {{ date("d/m/Y", strtotime($application->created_at)) }}</div>
            </div>
          </div>
          <div class="flex gap-3">
            <a href="#" class="border-2 rounded-lg py-2 px-4 bg-green-200 text-black hover:text-black cursor-default">
              <i class="bi bi-person-fill text-primary"></i>
              Hồ sơ ứng viên
            </a>
            <a href="/company/applications/{{$application->id}}/recruitment-process" class="border-2 rounded-lg py-2 px-4 hover:text-black hover:bg-green-50">
              <i class="bi bi-briefcase-fill text-danger"></i>
              Quy trình tuyển dụng
            </a>
          </div>
        </div>

        <!-- Body -->
        <form action="/company/applications/{{$application->id}}/update" method="POST" role="form">
          @csrf
          <div class="row">
            <div class="col-md-6">
              <p class="text-xl font-bold text-green-600">Thông tin chung</p>
              <div class="form-group">
                <label for="name">Họ và tên <span class="text-danger">*</span></label>
                <input type="text" readonly class="form-control" placeholder="Họ và tên" name="name" id="name" value="{{ $application->candidate->name }}">
              </div>
              <div class="form-group">
                <label for="email">Email <span class="text-danger">*</span></label>
                <input type="text" readonly class="form-control" placeholder="Email" name="email" id="email" value="{{ $application->candidate->email }}">
              </div>
              <div class="form-group">
                <label for="phone">Số điện thoại <span class="text-danger">*</span></label>
                <input type="tel" readonly maxlength="10" class="form-control" placeholder="Số điện thoại" name="phone" id="phone" value="{{ $application->candidate->phone }}">
              </div>
              <div class="py-3">
                <label for="name" class="text-sm mr-3">Trạng thái: </label>
                @if ($application->candidate->status === "Trúng tuyển")
                <span class="text-xs bg-green-500 text-white font-bold py-1.5 px-4 rounded-md">
                  {{$application->candidate->status}}
                </span>
                @elseif ($application->candidate->status === "Không trúng tuyển")
                <span class="text-xs bg-gray-400 text-white font-bold py-1.5 px-4 rounded-md">
                  {{$application->candidate->status}}
                </span>
                @else
                <span class="text-xs bg-yellow-200 text-gray-600 font-bold py-1.5 px-4 rounded-md">
                  {{$application->candidate->status}}
                </span>
                @endif
              </div>
            </div>
            <div class="col-md-6">
              <p class="text-xl font-bold text-green-600">Hồ sơ ứng viên</p>
              <div class="form-group">
                <label for="name">Chiến dịch tuyển dụng <span class="text-danger">*</span></label>
                <input type="text" readonly class="form-control" name="campaign_name" value="{{ $application->job->campaign->name }}">
              </div>
              <div class="form-group">
                <label for="name">Vị trí ứng tuyển <span class="text-danger">*</span></label>
                <input type="text" readonly class="form-control bg-white" name="job_name" value="{{ $application->job->name }}">
              </div>
              <div class="py-3">
                <label for="name" class="text-sm mr-3">CV ứng tuyển <span class="text-danger">*</span> :</label>
                <button
                  type="button"
                  class="text-xs bg-green-500 text-white font-bold py-1.5 px-4 rounded-md hover:opacity-80"
                  data-bs-toggle="modal" data-bs-target="#cv-modal">
                  <i class=" bi bi-eye"></i> Xem CV
                </button>
              </div>
              @if ($application->candidate->cover_letter)
              <div class="form-group">
                <label for="cover_letter" class="text-sm">Thư ứng tuyển <span class="text-danger">*</span></label>
                <textarea name="cover_letter" id="cover_letter" readonly class="form-control" placeholder="Thư ứng tuyển" rows="5">{{$application->candidate->cover_letter}}</textarea>
              </div>
              @endif
            </div>
          </div>
          <div class="d-flex justify-content-end">
            <!-- <button type="submit" class="btn bg-info text-white btn-md mt-4 mb-4">Cập nhật</button> -->
            <a href="/company/applications/{{$application->id}}/delete" class="btn bg-danger text-white btn-md mt-4 mb-4">Xoá ứng viên</a>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="cv-modal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cv-modal-label">CV ứng tuyển</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body flex justify-center">
        <object
          data="{{$application->candidate->cv_path}}"
          width="800"
          height="800">
        </object>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
      </div>
    </div>
  </div>
</div>

@endsection