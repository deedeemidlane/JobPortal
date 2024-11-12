@extends('company.layouts.app')

@section('content')

<div class="row">
  <div class="col-12">
    <div class="card mb-4">
      <div class="card-header">
        <h6>Danh sách ứng viên</h6>
      </div>
      <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
          <table class="table align-items-center mb-0">
            <thead>
              <tr class="border-top border-light">
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">
                  Ứng viên
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  Tin tuyển dụng
                </th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                  Thông tin liên lạc
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Trạng thái
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                  Thời gian ứng tuyển
                </th>
                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 invisible">
                  Action
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($applications as $application)
              <tr>
                <td class="ps-4">
                  <p class="text-xs font-weight-bold mb-2">{{$application->candidate_name}}</p>
                  <button class="text-xs bg-green-400 text-white py-1 px-2 rounded-sm"><i class="bi bi-eye"></i> Xem CV</button>
                  <!-- <span class="text-xs bg-gray-500 text-white py-1 px-2 rounded-sm">Đã xem</span> -->
                </td>
                <td class="">
                  <a href=" /company/recruitment-news/update/{{$application->job_id}}" target="_blank" class="text-xs font-weight-bold mb-0">{{$application->job_title}}</a>
                </td>
                <td class="">
                  <p class="text-xs mb-2"><i class="bi bi-envelope-at-fill"></i> {{$application->candidate_email}}</p>
                  <p class="text-xs mb-0"><i class="bi bi-telephone-fill"></i> {{$application->candidate_phone}}</p>
                </td>
                <td class="text-center">
                  <span class="text-secondary text-xs font-weight-bold">Trạng thái</span>
                </td>
                <td class="text-center">
                  <span class="text-secondary text-xs font-weight-bold">{{ date("d/m/Y  h:i", strtotime($application->created_at)) }}</span>
                </td>
                <td class="text-left text-xs">
                  <a class="text-blue-400 mb-2 p-0 text-start text-xs font-bold hover:text-blue-500" href="">
                    <i class="fas fa-pencil-alt me-2" aria-hidden="true"></i>Chỉnh sửa
                  </a>
                  <button class="text-red-400 hover:text-red-500 mt-2 d-block p-0 text-start font-bold" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$application->id}}">
                    <i class="far fa-trash-alt me-2"></i>Xóa
                  </button>
                </td>
              </tr>

              <!-- Modal -->
              <div class="modal fade" id="confirmModal-{{$application->id}}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="confirmModalLabel-{{$application->id}}">Xác nhận xóa</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <h6 class="mb-0 text-danger">Bạn có chắc chắc muốn xóa ứng viên này?</h6>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                      <a href="/company/applications/delete/{{$application->id}}" type="button" class="btn btn-danger">Xóa</a>
                    </div>
                  </div>
                </div>
              </div>
              @endforeach

            </tbody>
          </table>
          @if($applications->count() == 0)
          <div class="text-center py-5">
            Chưa có lượt ứng tuyển nào trên hệ thống
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection