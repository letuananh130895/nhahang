<?php

namespace App\Http\Controllers\FB;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Socialite;
use App\User;
use Hash;
use Auth;
class SocialAuthController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();   
    }   

    public function handleProviderCallback()
    {
        // Sau khi xác thực Facebook chuyển hướng về đây cùng với một token
        // Các xử lý liên quan đến đăng nhập bằng mạng xã hội cũng đưa vào đây.
        $userSocial = Socialite::driver('facebook')->user();    
        $user = User::where('email', $userSocial->email)->first();
        if($user){
        	Auth::login($user);
        	return redirect()->route('trangchu');
        }else{
        	$u = new User;
        	$u->full_name = $userSocial->name;
        	$u->quyen = 0;
        	$u->email = $userSocial->email;
        	$u->password = bcrypt('123456');
        	$u->phone = '';
        	$u->address = '';
        	$u->save();
        	Auth::login($u);
        	return redirect()->route('trangchu');
        }
    }
}
