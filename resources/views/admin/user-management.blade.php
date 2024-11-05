@extends('admin.layouts.app')

@section('content')

<div>
    <!-- <div class="alert alert-secondary mx-4" role="alert">
        <span class="text-white">
            <strong>Add, Edit, Delete features are not functional!</strong> This is a
            <strong>PRO</strong> feature! Click <strong>
                <a href="https://www.creative-tim.com/live/soft-ui-dashboard-pro-laravel" target="_blank" class="text-white">here</a></strong>
            to see the PRO product!
        </span>
    </div> -->
    <!-- <ul class="nav nav-tabs mx-4 mb-2">
        <li class="nav-item">
            <a class="nav-link active" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul> -->

    <!-- Modal -->
    <!-- <div class="modal fade" id="accountModal" tabindex="-1" aria-labelledby="accountModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="accountModalLabel">Tạo tài khoản</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form role="form text-left" method="POST" action="/register">
                        @csrf
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
                        <div class="mb-3">
                            <label for="name">Họ và tên <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" placeholder="Họ và tên" name="name" id="name" aria-label="Name" aria-describedby="name" value="{{ old('name') }}">
                            @error('name')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="role">Chức vụ <span class="text-danger">*</span></label>
                            <select class="form-select" name="role" id="role" aria-label="role" aria-describedby="role">
                                <option value="">Chọn tỉnh/thành phố</option>
                                <option value="HR">HR</option>
                                <option value="MANAGER">Trường phòng</option>
                            </select>
                            @error('role')
                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div> -->

    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div class="d-flex flex-row justify-content-between">
                        <div>
                            <h5 class="mb-0">Danh sách tài khoản</h5>
                        </div>
                        <!-- Button trigger modal -->
                        <!-- <button class="btn bg-gradient-primary btn-sm mb-0 d-flex align-items-center gap-2 px-4" type="button" data-bs-toggle="modal" data-bs-target="#accountModal">
                            <span class="text-md">+</span>
                            Tạo tài khoản
                        </button> -->

                        <a href="/admin/user-management/create-account" class="btn bg-gradient-primary btn-sm mb-0 d-flex align-items-center gap-2 px-4" type="button">
                            <span class="text-md">+</span>
                            Tạo tài khoản
                        </a>
                    </div>
                </div>
                <div class="card-body px-0 pt-3 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr class="border-top border-light">
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        ID
                                    </th>
                                    <!-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Photo
                                    </th> -->
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Tên
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Email
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Số điện thoại
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Chức vụ
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
                                @foreach ($users as $user)

                                <tr>
                                    <td class="ps-4">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->id }}</p>
                                    </td>
                                    <!-- <td>
                                        <div>
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3">
                                        </div>
                                    </td> -->
                                    <td class="">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->name }}</p>
                                    </td>
                                    <td class="">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->email }}</p>
                                    </td>
                                    <td class="">
                                        <p class="text-xs font-weight-bold mb-0">{{ $user->phone }}</p>
                                    </td>
                                    <td class="">
                                        <p class="text-xs font-weight-bold mb-0">{{ constant('App\Models\User::DISPLAYED_ROLE')[$user->role] }}</p>
                                    </td>
                                    <td class="text-center">
                                        <span class="text-secondary text-xs font-weight-bold">{{ date("d/m/Y", strtotime($user->created_at)) }}</span>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/user-management/update-account/{{$user->id}}" class="me-2" data-bs-toggle="tooltip" data-bs-original-title="Chỉnh sửa">
                                            <i class="fas fa-user-edit text-blue"></i>
                                        </a>
                                        <span type="button" data-bs-toggle="modal" data-bs-target="#confirmModal-{{$user->id}}">
                                            <i class="cursor-pointer fas fa-trash text-danger"></i>
                                        </span>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="confirmModal-{{$user->id}}" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="confirmModalLabel-{{$user->id}}">Xác nhận xóa</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6 class="mb-0 text-danger">Bạn có chắc chắc muốn xóa tài khoản này?</h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                <a href="/admin/user-management/delete-account/{{$user->id}}" type="button" class="btn btn-danger">Xóa</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </tbody>
                        </table>
                        @if($users->count() == 0)
                        <div class="text-center py-5">
                            Chưa có tài khoản nào trên hệ thống
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection