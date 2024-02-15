<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\View\View;
use function PHPUnit\Framework\exactly;

class UserController extends Controller
{
    public function allUsers()
    {
        try {
            $data['users'] = User::where('isDeleted', 0)->paginate(15);
            return view('back.users', $data);
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
            return redirect()->back();
        }
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

        try {
            // Kullanıcı modelini kullanarak yeni bir kullanıcı oluştur
            User::create([
                'first_name' =>$request->first_name,
                'last_name' =>$request->last_name,
                'email' =>$request->email,
                'password' => Hash::make($request->password),
                'auth' => $request->auth,
            ]);
            toastr()->success('User has been created successfully.');
        }catch(\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }

        return redirect()->back();
    }

    public function editUser(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
        ]);
        try {
            $user = User::where('id', $request->id)->get()[0];
            $emailValidation = User::where('email', $request->email)->where('id', '<>', $user->id)->get();
            if(count($emailValidation) != 0){
                toastr()->error('This email address is being used by another user.');
                return redirect()->back();
            }
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->save();
            toastr()->success('User\'s information has been changed successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong!'.$e->getMessage());
        }
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        try {
            $user = User::where('id', $request->id)->get()[0];
            $user->isDeleted = 1;
            $user->deleted_at = now();
            $user->save();
            toastr()->success('The user deleted successfully.');
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
        }
        return redirect()->back();
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
        try {
            if(Auth::attempt(['email'=>$request->email, 'password'=>$request->password, 'isDeleted'=>0])){
                return redirect()->route('admin.dashboard');
            }
            toastr()->error('Wrong email address or password!');
            return redirect()->back();
        }catch (\Exception $e){
            toastr()->error('Something went wrong! '.$e->getMessage());
            return redirect()->back();
        }
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

    public function profile()
    {
        return view('back.profile');
    }

    public function changePassword(Request $request)
    {
        $validation = $request->validate([
            'currentPassword' => 'required',
            'newPassword' => 'required',
            'newPasswordConfirm' => 'required'
        ]);
        try {
            if(Hash::check($request->currentPassword, Auth::user()->getAuthPassword())){
                if($request->newPassword == $request->newPasswordConfirm){
                    $user = Auth::user();
                    $user->password = Hash::make($request->newPassword);
                    $user->save();
                    toastr()->success('Your password has been changed successfully.');
                }
            }
        }catch (\Exception $e){
            toastr()->error('Something went wrong!');
        }
        return redirect()->back();
    }
}
