<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['index', 'showProfile', 'destroy', 'updateProfile', 'deleteProfile', 'makeAdmin']);
        $this->middleware('auth:api')->only(['apiProfile']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = Auth::user();
        $users = User::where('email', '!=', $auth->email)->get();
        // $users = User::where('email', '!=', $auth->email)->paginate(20);
        return view('/user/index', compact('users', 'auth'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        if ($user = true) {
            return redirect()
            ->back()
            ->with('success', 'User removed!');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Errors');
        }
    }

    public function showProfile()
    {
        $user = User::find(Auth::user()->id);
        return view('user.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $repassword = $request->input('repassword');
        if (isset($name)) {
            $user->name = $name;
        }
        if (isset($email)) {
            $user->email = $email;
        }
        if (isset($password) && isset($repassword)) {
            if ($password == $repassword) {
                $user->password = Hash::make($password);
                $user->save();
            } else {
                return redirect()
            ->back()
            ->with('error', 'The passwords doest not match!');
            }
        } 
        
        if ($user = true) {
            return redirect()
            ->back()
            ->with('success', 'Data updated!');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Erro');
        }
    }

    public function deleteProfile()
    {
        $user = User::find(Auth::user()->id);
        $user->delete();
        return redirect('/home');
    }

    public function makeAdmin($id) {
        $user = User::find($id);
        $name = $user->name;
        $user->admin = true;
        $user->update();
        if ($user = true) {
            return redirect()
            ->back()
            ->with('success', 'User '.$name.' is now Admin!');
        } else {
            return redirect()
            ->back()
            ->with('error', 'Errors');
        }

    }

    public function apiProfile(Request $request){
        $header = $request->bearerToken();
        $user = User::where('api_token', $header)->first;
        if ($user != null){ 
            return response([
                'name' => $user->name,
                'email' => $user->email,
                'admin' => $user->admin,
            ], 200);
        }

    }
}
