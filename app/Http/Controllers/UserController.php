<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class UserController extends Controller
{
    public function allUsers(): View
    {
        $data['users'] = User::where('isDeleted', 0)->get();
        return view('back.users', $data);
    }
    public function addNewUser(Request $request)
    {
        // Formdan gelen verileri doğrula
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string',
            'auth' => 'required|numeric', // auth alanının sayısal olması gerektiğini kontrol et
        ]);
        

        // Kullanıcı modelini kullanarak yeni bir kullanıcı oluştur
        User::create([
            'first_name' =>$request->first_name,
            'last_name' =>$request->last_name,
            'email' =>$request->email,
            'password' => Hash::make($request->password),
            'auth' => $request->auth,
        ]);

        // Kullanıcı başarıyla oluşturulduğunda bir geri dönüş yapabilirsiniz
        return redirect()->back()->with('addUserSuccess');
    }
    public function loginPage()
    {
        if(!Auth::check())
            return view('back.login');
        else
            return redirect()->route('admin.dashboard');

    }

    public function loginPost(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'isDeleted'=>0])){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('home');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function dashboard()
    {
        return view('back.dashboard');
    }
}
