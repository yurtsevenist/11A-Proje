<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterPostRequest;
use Illuminate\Support\Str;
use App\Models\Product;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginPost(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if(Auth::user()->who==1)
            {
                toastr()->success('Hoşgeldin '.Auth::user()->name, 'Karşılama');
                return view('main');
            }
            else
            {
                toastr()->info('Sayın '.Auth::user()->name.' yönetici yetkiniz bulunmamaktadır', 'Bilgilendirme');
                return view('login');
            }

        }

            toastr()->error('Şifreniz veya kullanıcı adınız hatalı ','Hata');
            return view('login');


    }
    public function signOut()
    {
        toastr()->info('Güle Güle '.Auth::user()->name, 'Uğurlama');
        Auth::logout();
        return view('login');
    }
    public function registerPost2(Request $request)
    {
        try {

            $ara=User::whereEmail($request->email)->first();//e-posta adresi daha önce kayıt edilmişmi
            if($ara)
            {
                toastr()->error('Bu E-Posta daha önce kayıt edilmiş','Hata');
                return redirect()->back();
            }
            if($request->password!=$request->password_confirmation)
            {
                toastr()->error('Şifre ve Şifre Tekrarı Eşleşmiyor','Hata');
                return redirect()->back();
            }
            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
            toastr()->success('Üyeliğiniz tamalanmıştır','Başarılı');
            return view('login');

        } catch (\Throwable $th) {

           toastr()->error($th,'Hata');
           return redirect()->back();
        }
    }
    public function registerPost(RegisterPostRequest $request)
    {
        $request->flash();
        try {

            $user=new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password=Hash::make($request->password);
            $user->save();
           toastr()->success('Üyeliğiniz tamalanmıştır','Başarılı');
           return view('login');
        } catch (\Throwable $th) {
            toastr()->error($th,'Hata');
            return redirect()->back();
        }

    }
    public function userUpdatePost(Request $request)
    {

        try {
            if(Str::length($request->password)<6)
            {
                toastr()->error('Şifreniz en az 6 karakter olmalıdır','Hata');
                return redirect()->back();
            }
            if($request->password!=$request->password_confirmation)
            {
                toastr()->error('Şifre ve Şifre Tekrarı Eşleşmiyor','Hata');
                return redirect()->back();
            }
            $user=User::whereId(Auth::user()->id)->first();
            $user->name=$request->name;
            $user->password=Hash::make($request->password);
            $user->save();
           toastr()->success('Bilgileriniz Güncellenmiştir','Başarılı');
           return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th,'Hata');
            return redirect()->back();
        }

    }
    public function products()
    {
        $urunler=Product::orderBy('number','ASC')->get();
        return view('products',compact('urunler'));
    }
}
