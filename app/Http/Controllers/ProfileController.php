<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $dataPembeli = DB::table('Pembelians')->where('user_id', $id)->paginate(6);
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.index', [
            'title' => 'User Profile',
            'user' => $user,
            'dataPembeli' => $dataPembeli
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id = Auth::user()->id;
        $dataPembeli = DB::table('Pembelians')->where('user_id', $id)->get();
        $user = User::where('id', Auth::user()->id)->first();

        return view('profile.edit', [
            'title' => 'Update Profile',
            'user' => $user,
            'dataPembeli' => $dataPembeli
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|max:12',
            'password' => 'required|min:5',
            'alamat_user' => 'required|string',
        ]);
        
        $user = User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        if(!empty($request->password))
        {
            $user->password = Hash::make($request->password);
        }
        $user->alamat_user = $request->alamat_user;
        
        $user->update();

        return redirect('/user/profile')->with('success', 'Data user berhasil di Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
