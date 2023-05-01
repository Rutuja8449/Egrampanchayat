<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function loginIndex()
    {
        return view('common.login');
    }
    function registerIndex()
    {
        return view('common.register');
    }

    function logout()
    {
        Session::flush();
        return redirect('/login');
    }

    function login(Request $request)
    {
        $user = User::where('email', $request->email)->where('password', md5($request->password))->first();
        if ($user == null)
            return back()->with('error', 'Wrong credentials, try again');
        else {
            Session::put('user', $user);
            switch ($user->role) {
                case 'ADMIN':
                    return redirect('/admin');
                case 'USER':
                    return redirect('/user');
                case 'STAFF':
                    return redirect('/staff');
                default:
                    return back()->with("error", "Something went wrong with navigation.");
            }
        }
    }
    function register(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->address = $request->address;
        $user->contact = $request->contact;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->gender = $request->gender;
        $user->birth_date = $request->birth_date;
        $user->birth_place = $request->birth_place;
        $user->mother_name = $request->mother_name;
        $user->father_name = $request->father_name;
        $user->password = md5($request->password);
        if ($user->save())
            return back()->with('success', 'User created successfully.');
        else
            return back()->with('error', 'Something went wrong, please try again later.');
    }
    function getUser()
    {
        return session('user');
    }

    function profile()
    {
        $user = $this->getUser();
        switch ($user->role) {
            case 'ADMIN':
                return view('common.profile-admin', ['user' => $user]);
            case 'STAFF':
                return view('common.profile-staff', ['user' => $user]);
            case 'USER':
                return view('common.profile-user', ['user' => $user]);
            default:
                return view('common.profile-user', ['user' => $user]);
        }
        // return view('common.profile', ['user' => '']);
    }

    function findUser(string $id)
    {
        $user = User::find($id);
        return view('admin.user-details', ['user' => $user]);
    }
    function findUserStaff(string $id)
    {
        $user = User::find($id);
        return view('staff.user-details', ['user' => $user]);
    }


}