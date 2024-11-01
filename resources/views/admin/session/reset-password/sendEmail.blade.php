@extends('admin.layouts.user_type.guest')

@section('content')

<div class="page-header section-height-75">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-6 d-flex flex-column mx-auto pb-4">
                <div class="card mt-8 py-md-4 px-md-5">
                    <!-- @if($errors->any())
                    <div class="mt-3  alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="alert-text text-white">
                            {{$errors->first()}}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif -->
                    @if(session('success'))
                    <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
                        <span class="alert-text text-white">
                            {{ session('success') }}</span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </button>
                    </div>
                    @endif
                    <div class="card-header pb-0 text-center bg-transparent">
                        <h4 class="font-weight-bolder text-primary">Forgot your password? Enter your email here</h4>
                    </div>
                    <div class="card-body">

                        <form action="/forgot-password" method="POST" role="form text-left">
                            @csrf
                            <div>
                                <label for="email">Email</label>
                                <div class="">
                                    <input id="email" name="email" type="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    @error('email')
                                    <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-primary text-white w-100 mt-4 mb-0">Recover your password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection