<?php

namespace App\Http\Controllers;

use App\Mail\ResisterEmail;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Response;

class AuthController extends Controller
{
    // đăng ký tài khoản 
    public function register(Request $request){
        // lấy dữ liệu
        $input = $request->all();

        // đưa ra thông báo lỗi
        $messages = [
            "required" => ":attribute không được để trống",
            "max" => ":attribute không vượt quá :max ký tự",
            "email" => ":attribute phải là địa chỉ email hợp lệ",
            "min" => ":attribute ít nhất :min ký tự"
        ];
        // kiểm tra
        $validator = Validator::make($input, [
            "name" => "required|string|max:100",
            "email" => "required|email|string|max:255|unique:users",
            "password" => "required|string|min:8",
        ], $messages);

        if($validator->fails()){
            $errors = $validator->errors();
            // trả lỗi và dữ liệu ngược về form khi có lỗi
            return back()
            ->withErrors($errors)
            ->withInput();
        }

        try{
            // tạo mã xác nhận
            $code = str_pad(mt_rand(0, 99999999), 8, '0', STR_PAD_LEFT);
            // gửi gmail với mã xác nhận
            Mail::to($input["email"])->send(new ResisterEmail($code, $input["name"]));
             // Lưu mã xác nhận vào mảng $input
             $input['verification_code'] = $code;
            // Set verification code in cookie for 1 minute
            return redirect()->route('client.verify')
            ->withCookie('verification_code', json_encode($input), 10); // 1 minute expiry
        }
        catch(\Exception $e){
            return response()->json(['success' => false, 'message' => 'Failed to send email', 'error' => $e->getMessage()], 500);
        }
    }
    
    public function verify(Request $request)
    {
        // Lấy dữ liệu từ request
        $input = $request->all();
    
        // Lấy dữ liệu từ cookie và kiểm tra tồn tại
        $verificationData = json_decode($request->cookie('verification_code'), true);
    
        if (!isset($verificationData['verification_code'])) {
            return back()->withErrors(["inputVerification" => 'Không tìm thấy mã xác nhận.'])->withInput();
        }
    
        // Lấy mã xác nhận từ cookie
        $verificationCode = $verificationData['verification_code'];
    
        // Định nghĩa các thông báo lỗi
        $messages = [
            "required" => "Mã xác nhận không được để trống",
            "numeric" => "Mã xác nhận phải là số",
        ];
    
        // Validate mã xác nhận từ người dùng nhập vào
        $validator = Validator::make($input, [
            'inputVerification' => 'required|numeric',
        ], $messages);
    
        // Nếu validate không thành công
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Nếu mã xác nhận không khớp
        if ($input['inputVerification'] != $verificationCode) {
            return back()->withErrors(["inputVerification" => 'Mã xác nhận không chính xác.'])->withInput();
        }
    
        // Mã hóa mật khẩu
        $hashedPassword = Hash::make($verificationData['password']);
    
        try {
            // Đưa dữ liệu vào database
            User::create([
                "name" => $verificationData["name"],
                "email" => $verificationData["email"],
                "password" => $hashedPassword,
                "status_id" => 1,
                "permission_id" => 1,
                "created_at" => now(), // Đổi thành created_at
            ]);
    
            // Xóa cookie sau khi đã sử dụng xong
            $response = new Response('Cookie deleted');
            $response->cookie(Cookie::forget('verification_code'));
    
            // Set success message in session
            session()->flash('status');
            return back()->withCookie('verification_code', json_encode(''), 0); 
    
        } catch (\Exception $e) {
            return back()->withErrors(["inputVerification" => 'Hệ thống đang bảo trì.'])->withInput();
        }
    }
}


