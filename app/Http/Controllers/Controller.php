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
use App\Models\Image;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function loginPost(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            if (Auth::user()->who == 1) {
                toastr()->success('Hoşgeldin ' . Auth::user()->name, 'Karşılama');
                return redirect()->route('main');
            } else {
                toastr()->info('Sayın ' . Auth::user()->name . ' yönetici yetkiniz bulunmamaktadır', 'Bilgilendirme');
                return view('login');
            }
        }

        toastr()->error('Şifreniz veya kullanıcı adınız hatalı ', 'Hata');
        return view('login');
    }
    public function signOut()
    {
        toastr()->info('Güle Güle ' . Auth::user()->name, 'Uğurlama');
        Auth::logout();
        return view('login');
    }
    public function registerPost2(Request $request)
    {
        try {

            $ara = User::whereEmail($request->email)->first(); //e-posta adresi daha önce kayıt edilmişmi
            if ($ara) {
                toastr()->error('Bu E-Posta daha önce kayıt edilmiş', 'Hata');
                return redirect()->back();
            }
            if ($request->password != $request->password_confirmation) {
                toastr()->error('Şifre ve Şifre Tekrarı Eşleşmiyor', 'Hata');
                return redirect()->back();
            }
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            toastr()->success('Üyeliğiniz tamalanmıştır', 'Başarılı');
            return view('login');
        } catch (\Throwable $th) {

            toastr()->error($th, 'Hata');
            return redirect()->back();
        }
    }
    public function registerPost(RegisterPostRequest $request)
    {
        $request->flash();
        try {

            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            toastr()->success('Üyeliğiniz tamalanmıştır', 'Başarılı');
            return view('login');
        } catch (\Throwable $th) {
            toastr()->error($th, 'Hata');
            return redirect()->back();
        }
    }
    public function main()
    {
        $customers=User::get();
        $urunsayisi=Product::get();
        $siparissayisi=Order::get();
        return view('main',compact('customers','urunsayisi','siparissayisi'));
    }
    public function userUpdatePost(Request $request)
    {

        try {
            if (Str::length($request->password) < 6) {
                toastr()->error('Şifreniz en az 6 karakter olmalıdır', 'Hata');
                return redirect()->back();
            }
            if ($request->password != $request->password_confirmation) {
                toastr()->error('Şifre ve Şifre Tekrarı Eşleşmiyor', 'Hata');
                return redirect()->back();
            }
            $user = User::whereId(Auth::user()->id)->first();
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->save();
            toastr()->success('Bilgileriniz Güncellenmiştir', 'Başarılı');
            return redirect()->back();
        } catch (\Throwable $th) {
            toastr()->error($th, 'Hata');
            return redirect()->back();
        }
    }
    public function products()
    {
        $urunler = Product::orderBy('created_at', 'DESC')->get();
        foreach($urunler as $urun)
        {
            $urun->buyprice=$urun->price-($urun->price*0.5);
            $urun->tax=0.08;
            $urun->save();
        }
        return view('products', compact('urunler'));
    }
    public function productDelete(Request $request)
    {
        $urun = Product::whereId($request->id)->first();
        $urun->delete();
        toastr()->success('Ürününüz silinmiştir', 'Başarılı');
        return redirect()->route('products');
    }
    public function userDelete(Request $request)
    {
        $user = User::whereId($request->id)->first();
        $user->who = -1;
        $user->save();

        toastr()->success('Kullanıcı silinmiştir', 'Başarılı');
        return redirect()->route('customers');
    }
    public function customers()
    {
        $users = User::whereWho(0)->orderBy('name', 'ASC')->get();
        return view('customers', compact('users'));
    }
    public function forgot()
    {
        return view('forgot');
    }
    public function forgotPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email'
        ]);




            $tokens = DB::table('password_resets')->where('email', $request->email)->get();
            foreach($tokens as $t)
            {

                $fark=Carbon::now()->diffInDays(Carbon::parse($t->created_at));
                if($fark>=1)
                {

                    DB::table('password_resets')->where('token', $t->token)->delete();
                }

            }

            $token = Str::random(64);

            DB::table('password_resets')->insert(
                ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
            );


        $action_link = route('reset', ['token' => $token, 'email' => $request->email]);
        $body = "Şifreni Sıfırlamak İstediğini Duyduk  ." . $request->email .
            ". Linke Tıklayarak Şifre Sıfırlama Bağlantısına Gidebilirsin";


        Mail::send('email-forgot', ['action_link' => $action_link, 'body' => $body], function ($message) use ($request) {
            $message->from('sinav@ihmtal.com', 'Sınav Kaya');
            $message->to($request->email, 'Kaya')
                ->subject('Reset Password');
        });

        return back()->withSuccess('Şifre Sıfırlama Bağlantısını Gönderdik!');
    }
    public function resetPassword(Request $request){
        $request->validate([
                 'email'=>'required|email|exists:users,email',
                 'password'=>'required|min:6|confirmed',
                 'password_confirmation'=>'required',
        ]);

         $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'token'=>$request->token,
         ])->first();

         if(!$check_token){
            return back()->withInput()->with('Başarısız','Geçersiz Token');
        }else{

            User::where('email', $request->email)->update([
                  'password'=>Hash::make($request->password),
            ]);

            DB::table('password_resets')->where([
                 'email'=>$request->email
            ])->delete();
            toastr()->success('Şifreni Sıfırladın!','Giriş Yap!');
                  return redirect()->route('login')->with('Onaylandı','Başarıyla Şifrenizi Değiştirdiniz')
                    ->with('verifiedEmail', $request->email);
         }
        }
        public function showResetForm(Request $request, $token = null){
            return view('reset')->with(['token'=>$token, 'email'=>$request->email]);
        }
        public function orders()
        {
          $orders=Order::with('getUser')->with('getProduct')->orderBy('date','DESC')->get();
          return view('orders',compact('orders'));
        }
        public function orderUpdate(Request $request)
        {
            $order=Order::whereId($request->id)->first();
            $order->status=$request->status;
            $order->save();
            toastr()->success('Sipariş durumu güncellendi', 'Başarılı');
            return redirect()->back();
        }
        public function productAdd(Request $request)
        {
            // dd($request);
           try {
             if($request->pid==0)//ürün ekleme yapılacak
             {
                if ($request->hasFile('photo')) {
                    $mimetype = $request->photo->extension();
                    do {
                        $kod = Str::random(6);
                    } while (Product::whereCode($kod)->exists());

                    $newName = $kod . '.' . $mimetype;
                    $request->photo->move('productsimages', $newName);
                    $kayit=new Product;
                    $kayit->code=$kod;
                    $kayit->name=$request->pname;
                    $kayit->size=$request->size;
                    $kayit->number=$request->number;
                    $kayit->price=$request->price;
                    $kayit->category=$request->category;
                    $kayit->color=$request->color;
                    $kayit->photo = 'productsimages/' . $newName;
                    $kayit->save();
                    $image=new Image;
                    $image->pid=$kayit->id;
                    $image->photo='productsimages/' . $newName;
                    $image->order=1;
                    $image->save();
                    toastr()->success('Ürün Eklendi', 'Başarılı');
                    return redirect()->back();
                  }
                  else
                  {
                    toastr()->info('Ürün resmi eksik olduğu için kayıt yapılmadı', 'Bilgilendirme');
                    return redirect()->back();
                  }

             }
             else
             {
                 $kayit=Product::whereId($request->pid)->first();
                 if($kayit)
                 {
                    if ($request->hasFile('photo')) {
                        $mimetype = $request->photo->extension();
                        $newName = $kayit->code . '.' . $mimetype;
                        $request->photo->move('productsimages', $newName);
                        $kayit->code=$kayit->code;
                        $kayit->name=$request->pname;
                        $kayit->size=$request->size;
                        $kayit->number=$request->number;
                        $kayit->price=$request->price;
                        $kayit->category=$request->category;
                        $kayit->color=$request->color;
                        $kayit->photo = 'productsimages/' . $newName;
                        $kayit->save();
                        $image=new Image;
                        $image->pid=$kayit->id;
                        $image->photo='productsimages/' . $newName;
                        $image->order=1;
                        $image->save();
                        toastr()->success('Ürün Güncellendi', 'Başarılı');
                        return redirect()->back();
                      }
                      else
                      {
                        toastr()->info('Ürün resmi eksik olduğu için kayıt yapılmadı', 'Bilgilendirme');
                        return redirect()->back();
                      }
                 }
             }


           } catch (\Throwable $th) {
            toastr()->error('Beklenmedik bir hata meydana geldi', 'Hata');
            return redirect()->back();
           }
        }
}
