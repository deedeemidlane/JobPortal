@extends('company.layouts.app')

@section('content')

<div>
  <div class="row">
    <div class="col-12">
      <div class="card mb-4 mx-4 p-4 pb-0 pt-2">
        <div class="card-header pb-0">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <h4 class="mb-0 text-primary font-bold">Tạo lịch phỏng vấn mới</h4>
            </div>
          </div>
        </div>
        <div class="card-body pt-4">
          <form action="/company/interviews/{{$interview->id}}/update" method="POST" role="form text-left">
            @csrf
            <div class="row">
              <div class="col-md-6 pe-md-5">
                <div class="form-group">
                  <label for="name" class="text-sm">Tên lịch phỏng vấn <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" placeholder="Tên lịch phỏng vấn" name="name" id="name" value="{{ $interview->name }}">
                  @error('name')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
                <div class="form-group">
                  <label for="type" class="text-sm">Vòng phỏng vấn <span class="text-danger">*</span></label>
                  <select class="form-select" name="type" id="type">
                    <option value="" disabled selected>Chọn vòng phỏng vấn</option>
                    <option value="Phỏng vấn chuyên sâu" @if ($interview->type === "Phỏng vấn chuyên sâu") selected @endif>
                      Phỏng vấn chuyên sâu (online)
                    </option>
                    <option value="Phỏng vấn doanh nghiệp" @if ($interview->type === "Phỏng vấn doanh nghiệp") selected @endif>
                      Phỏng vấn doanh nghiệp (offline)
                    </option>
                  </select>
                  @error('type')
                  <p class="text-danger text-xs mt-2">{{ $message }}</p>
                  @enderror
                </div>
              </div>
              <div class="col-md-6 ps-md-5">
                <div class="form-group">
                  <div class="flex align-items-center">
                    <label for="" class="text-sm">Thời gian <span class="text-danger">*</span></label>
                  </div>
                  <div class="flex items-center gap-3 ms-md-3 mb-3">
                    <label for="date" class="mb-0">Ngày phỏng vấn</label>
                    <div class="relative ms-1">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <i class="bi bi-calendar-event-fill"></i>
                      </div>
                      <input id="datepicker-range-start" datepicker datepicker-autohide datepicker-format="dd/mm/yyyy" type="text" class="form-control p-2 ps-5" placeholder="dd/mm/yyyy" name="date" id="date" value="{{ $interview->date }}">
                    </div>
                  </div>
                  @error('date')
                  <p class="text-danger text-xs mt-2 ps-8">{{ $message }}</p>
                  @enderror
                  <div class="flex ms-md-3 gap-3">
                    <div class=" col-md-auto d-flex align-items-center gap-3">
                      <label for="start_time" class="mb-0">Từ</label>
                      <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <input type="time" value="{{ $interview->start_time }}" class="form-control p-2" placeholder="0" name="start_time" id="start_time" value="{{ old('start_time') }}">
                      </div>
                    </div>
                    <div class="col-md-auto d-flex align-items-center gap-3">
                      <label for="end_time" class="mb-0">Đến</label>
                      <div class="relative">
                        <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                          <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z" clip-rule="evenodd" />
                          </svg>
                        </div>
                        <input type="time" value="{{ $interview->end_time }}" class="form-control p-2" placeholder="0" name="end_time" id="end_time" value="{{ old('end_time') }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row items-end" id="interviewer_list">
              <label for="" class="text-sm">Danh sách người phỏng vấn <span class="text-danger">*</span></label>
              <input type="hidden" name="interviewer_indices" id="interviewer_indices">
              @foreach($interview->interviewers as $interviewer)
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="interviewer_name">Họ và tên <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Họ và tên" name="interviewer_name" id="interviewer_name" value="{{ $interviewer['name'] }}">
                    @error('interviewer_name')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="interviewer_email">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" placeholder="Email" name="interviewer_email" id="interviewer_email" value="{{ $interviewer['email'] }}">
                    @error('interviewer_email')
                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                    @enderror
                  </div>
                </div>
              </div>
              @endforeach
            </div>
            <button class="bg-blue-500 text-white font-bold btn-sm d-flex align-items-center gap-2 px-3 py-1 mb-3 hover:opacity-90 rounded-full" type="button" id="add_interviewer">
              <span class="text-md">+</span>
              Thêm người phỏng vấn
            </button>

            <div class="row items-end mt-4" id="candidate_list">
              <label for="" class="text-sm">Danh sách ứng viên <span class="text-danger">*</span></label>
              <div class="table-responsive p-0 rounded-lg">
                <table class="table align-items-center mb-0 border rounded">
                  <thead>
                    <tr class="border-top border-light">
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 invisible px-0">
                        Checkbox
                      </th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
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
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($candidates as $candidate)
                    <tr>
                      <td class="ps-4">
                        <input type="checkbox" value="{{$candidate->id}}" class="w-4 h-4 text-green-500 cursor-pointer rounded focus:ring-0">
                      </td>
                      <td class="">
                        <p class="text-xs font-weight-bold mb-0">{{$candidate->name}}</p>
                      </td>
                      <td class="">
                        <p class="text-xs font-weight-bold mb-0">{{$candidate->application->job->name}}</p>
                      </td>
                      <td class="">
                        <p class="text-xs mb-2"><i class="bi bi-envelope-at-fill"></i> {{$candidate->email}}</p>
                        <p class="text-xs mb-0"><i class="bi bi-telephone-fill"></i> {{$candidate->phone}}</p>
                      </td>
                      <td class="text-center">
                        <p class="text-xs font-weight-bold mb-0">
                          @if ($candidate->status === "Trúng tuyển")
                          <span class="bg-green-400 text-white py-0.5 px-2 rounded">{{$candidate->status}}</span>
                          @elseif ($candidate->status === "Không trúng tuyển")
                          <span class="bg-gray-400 text-white py-0.5 px-2 rounded">{{$candidate->status}}</span>
                          @else
                          <span class="bg-yellow-200 text-gray-600 py-0.5 px-2 rounded">{{$candidate->status}}</span>
                          @endif
                        </p>
                      </td>
                      <td class="text-center">
                        <span class="text-secondary text-xs font-weight-bold">{{ date("d/m/Y  h:i", strtotime($candidate->created_at)) }}</span>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="flex justify-between">
              <div class="d-flex gap-4">
                @if($interview->interviewer_mail_status === 'sent')
                <div class="my-4 flex items-center gap-1 text-primary text-sm font-bold">
                  <i class="bi bi-check-circle-fill"></i>
                  Đã gửi mail cho người phỏng vấn
                </div>
                @else
                <button type="button" class="btn btn-info btn-md my-4" data-bs-toggle="modal" data-bs-target="#interviewerMail">
                  Gửi mail cho người phỏng vấn
                </button>
                @endif

                @if($interview->candidate_mail_status === 'sent')
                <div class="my-4 flex items-center gap-1 text-primary text-sm font-bold">
                  <i class="bi bi-check-circle-fill"></i>
                  Đã gửi mail cho người ứng viên
                </div>
                @else
                <button type="button" class="btn btn-info btn-md my-4" data-bs-toggle="modal" data-bs-target="#candidateMail">
                  Gửi mail cho ứng viên
                </button>
                @endif
              </div>
              <div class="d-flex gap-4">
                <button type="button" class="btn btn-danger btn-md my-4" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$interview->id}}">
                  Xóa
                </button>
                <button type="submit" class="btn bg-info text-white btn-md my-4">Cập nhật</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal-{{$interview->id}}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="confirmModalLabel-{{$interview->id}}">Xác nhận xóa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h6 class="mb-0 text-danger">Bạn có chắc chắn muốn xóa lịch phỏng vấn này?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
        <a href="/company/interviews/{{$interview->id}}/delete" type="button" class="btn btn-danger">Xóa</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<form action="/company/interviews/{{$interview->id}}/mail/interviewer" method="POST">
  @csrf
  <div class="modal fade" id="interviewerMail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="interviewerMailLabel">Email thông báo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="interview_id" value="{{$interview->id}}">
          <div class="flex items-center">
            Gửi đến:
            <div class="p-2 ml-2">
              @foreach($interview->interviewers as $interviewer)
              <span class="border rounded-full bg-gray-200 px-2">{{$interviewer['email']}}</span>
              @endforeach
            </div>
          </div>
          <div class="flex gap-2 items-center">
            <span class=" whitespace-nowrap">Tiêu đề:</span>
            <input type="text" class="form-control" placeholder="Tiêu đề" name="subject" id="interviewerMailSubject" value="{{ $interviewer_mail->subject }}">
          </div>
          <div class="mt-3">
            <x-trix-input id="interviewerMailContent" placeholder="Mô tả công việc" name="content" value="{{ sanitize_html($interviewer_mail->content) }}" />
          </div>
        </div>
        <div class="modal-footer w-full">
          <div class="flex justify-between w-full">
            <a href="/company/mail-setting/interviewer" type="button" class="btn">
              <i class="bi bi-gear mr-1"></i>Thiết lập email
            </a>
            <div class="flex gap-2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Gửi</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<!-- Modal -->
<form action="/company/interviews/{{$interview->id}}/mail/candidate" method="POST">
  @csrf
  <div class="modal fade" id="candidateMail" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="candidateMailLabel">Email thông báo</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="interview_id" value="{{$interview->id}}">
          <div class="flex items-center">
            Gửi đến:
            <div class="p-2 ml-2">
              @foreach($candidates as $candidate)
              <span class="border rounded-full bg-gray-200 px-2">{{$candidate['email']}}</span>
              @endforeach
            </div>
          </div>
          <div class="flex gap-2 items-center">
            <span class=" whitespace-nowrap">Tiêu đề:</span>
            <input type="text" class="form-control" placeholder="Tiêu đề" name="subject" id="candidateMailSubject" value="{{ $candidate_mail?->subject }}">
          </div>
          <div class="mt-3">
            <x-trix-input id="candidateMailContent" placeholder="Mô tả công việc" name="content" value="{{ sanitize_html($candidate_mail?->content) }}" />
          </div>
        </div>
        <div class="modal-footer w-full">
          <div class="flex justify-between w-full">
            <a href="/company/mail-setting/candidate" type="button" class="btn">
              <i class="bi bi-gear mr-1"></i>Thiết lập email
            </a>
            <div class="flex gap-2">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
              <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Gửi</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<script>
  let interviewer_index = 1;
  const interviewer_indices = [];

  const interviewerList = document.getElementById("interviewer_list");

  document.getElementById("add_interviewer").addEventListener("click", function() {
    const index = interviewer_index;
    interviewer_index++;
    interviewer_indices.push(index);

    const listItem = document.createElement("div");
    listItem.className = "row items-end";
    listItem.innerHTML = `
    <div class="col-md-4">
      <div class="form-group">
        <label for="interviewer_name_${index}">Họ và tên</label>
        <input type="text" class="form-control" placeholder="Họ và tên" name="interviewer_name_${index}" id="interviewer_name_${index}" required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="form-group">
        <label for="interviewer_email_${index}">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="interviewer_email_${index}" id="interviewer_email_${index}" required>
      </div>
    </div>
    `

    const delBtn = document.createElement('button');
    delBtn.type = "button";
    delBtn.className = "mb-3 py-2 px-3 hover:bg-gray-200 rounded";
    delBtn.innerHTML = `<i class="bi bi-x-lg text-black"></i>`;

    delBtn.addEventListener("click", () => {
      interviewer_indices.splice(interviewer_indices.indexOf(index), 1);

      interviewerList.removeChild(listItem);

      document.getElementById("interviewer_indices").value = interviewer_indices.toString();
    });

    const delBtnContainer = document.createElement('div');
    delBtnContainer.className = "col-md-4";

    delBtnContainer.appendChild(delBtn);

    listItem.appendChild(delBtnContainer);

    interviewerList.appendChild(listItem);

    document.getElementById("interviewer_indices").value = interviewer_indices.toString();
  });

  let candidate_index = 1;
  const candidate_indices = [];

  const candidateList = document.getElementById("candidate_list");

  document.getElementById("add_candidate").addEventListener("click", function() {
    const index = candidate_index;
    candidate_index++;
    candidate_indices.push(index);

    const listItem = document.createElement("div");
    listItem.className = "row items-end";
    listItem.innerHTML = `
    <div class="col-md-6">
      <div class="form-group">
        <label for="candidate_id_${index}" class="text-xs">Ứng viên</label>
        <select class="form-select" name="candidate_id_${index}" id="candidate_id_${index}">
          <option value="" disabled selected>Chọn ứng viên</option>
          @foreach($candidates as $candidate)
          <option value="{{$candidate->id}}">{{$candidate->name}}</option>
          @endforeach
        </select>
      </div>
    </div>
    `

    const delBtn = document.createElement('button');
    delBtn.type = "button";
    delBtn.className = "mb-3 py-2 px-3 hover:bg-gray-200 rounded";
    delBtn.innerHTML = `<i class="bi bi-x-lg text-black"></i>`;

    delBtn.addEventListener("click", () => {
      candidate_indices.splice(candidate_indices.indexOf(index), 1);

      candidateList.removeChild(listItem);

      document.getElementById("candidate_indices").value = candidate_indices.toString();
    });

    const delBtnContainer = document.createElement('div');
    delBtnContainer.className = "col-md-4";

    delBtnContainer.appendChild(delBtn);

    listItem.appendChild(delBtnContainer);

    candidateList.appendChild(listItem);

    document.getElementById("candidate_indices").value = candidate_indices.toString();
  });
</script>

@endsection