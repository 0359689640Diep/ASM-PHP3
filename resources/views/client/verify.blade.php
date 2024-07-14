@extends('client.main')
@section('title')
    Xác thực tài khoản
@endsection
@php
    $hideCarousel = true;
@endphp


@section('main')
    <div class="container">
        @if (session('status'))
            <div class="alert alert-success mt-3">
                Đã tạo tài khoản thành công, vui lòng <a href="/login">đăng nhập</a> để sử dụng dịch vụ
            </div>
        @endif
        <form action="{{ route('verify') }}" method="post" class="mt-3">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" for="inputVerification">Mã xác nhận</label>
                <input type="number" placeholder="Nhập mã xác nhận từ gmail" class="form-control"
                    value="{{ old('inputVerification') }}" name="inputVerification" id="inputVerification">
                <div id="verificationError" class="form-text text-danger">
                  
                    @error('inputVerification')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Xác nhận và Đăng ký</button>
        </form>

    </div>
@endsection
