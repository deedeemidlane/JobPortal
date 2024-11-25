@extends('company.layouts.app')

@section('content')

<div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <h5 class="mb-0">Danh sách lịch phỏng vấn</h5>
            <a href="/company/interviews/create" class="btn bg-gradient-primary btn-sm mb-0 d-flex align-items-center gap-2 px-4" type="button">
              <span class="text-md">+</span>
              Tạo mới
            </a>
          </div>
        </div>
        <div class="card-body px-0 pt-3 pb-2">
          <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
              <thead>
                <tr class="border-top border-light">
                  <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-4">
                    Tên lịch phỏng vấn
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Thời gian
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Ngày phỏng vấn
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Ứng viên
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Trạng thái
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                    Ngày tạo
                  </th>
                  <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 invisible">
                    Action
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($interviews as $interview)
                <tr>
                  <td class="ps-4">
                    <p class="text-xs font-weight-bold mb-0">{{ $interview->name }}</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $interview->start_time . " - " . $interview->end_time }}</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $interview->date }}</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">{{ $interview->candidate_count }}</p>
                  </td>
                  <td class="text-center">
                    <p class="text-xs font-weight-bold mb-0">
                      @if ($interview->status === "Đang hoạt động")
                      <span class="bg-green-400 text-white pb-0.5 px-2 rounded">Đang hoạt động</span>
                      @elseif ($interview->status === "Đã kết thúc")
                      <span class="bg-gray-400 text-white pb-0.5 px-2 rounded">Đã kết thúc</span>
                      @else
                      <span class="bg-yellow-200 text-gray-600 py-0.5 px-2 rounded">Chờ xác nhận</span>
                      @endif
                    </p>
                  </td>
                  <td class="text-center">
                    <span class="text-secondary text-xs font-weight-bold">{{ date("d/m/Y", strtotime($interview->created_at)) }}</span>
                  </td>
                  <td class="text-center">
                    <a href="/company/interviews/{{$interview->id}}" class="me-2">
                      <i class="fa-solid fa-up-right-from-square"></i>
                    </a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @if ($interviews->count() === 0)
          <div class="text-center py-5">
            Chưa có lịch phỏng vấn nào trên hệ thống
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

@endsection