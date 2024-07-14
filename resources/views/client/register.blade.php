@extends("client.main")
@section('title')
    Đăng ký
@endsection
@php
    $hideCarousel = true;
@endphp


@section('main')
<div class="container">
    <form action="{{ route('register') }}" method="post">
      @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Tên của bạn ?</label>
          <input type="text" placeholder="Họ và tên của bạn" class="form-control" value="{{ old('name') }}" name="name" id="name" aria-describedby="nameError">
          <div id="nameError" class="form-text text-danger">
            @error('name')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email của bạn</label>
          <input type="email" placeholder="Địa chỉ email" class="form-control" value="{{ old('email') }}" name="email" id="email" aria-describedby="emailError">
          <div id="emailError" class="form-text text-danger">
            @error('email')
                {{ $message }}
            @enderror
          </div>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" placeholder="Nhập mật khẩu" class="form-control" value="{{ old('password') }}" name="password" id="password" aria-describedby="passwordError">
          <div id="passwordError" class="form-text text-danger">
            @error('password')
                {{ $message }}
            @enderror
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Đăng ký</button>
    </form>
</div>
@endsection