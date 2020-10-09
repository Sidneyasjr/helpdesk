<?php

namespace App\Http\Controllers\Admin;

use App\Costumer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User as UserRequest;
use App\Support\Cropper;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function team()
    {
        $users = User::where('admin', 1)->get();
        return view('admin.users.team', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $costumers = Costumer::orderBy('social_name')->get();
        return view('admin.users.create',[
            'costumers' => $costumers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request)
    {
        $userCreate = User::create($request->all());



        if(!empty($request->file('cover'))){
            $userCreate->cover = $request->file('cover')->store('user');
            $userCreate->save();
        }

        return redirect()->route('admin.users.edit', [
            'user' => $userCreate->id
        ])->with(['color' => 'green', 'message' => 'Cliente cadastrado com sucesso!']);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $costumers = Costumer::orderBy('alias_name')->get();
        return view('admin.users.edit', [
            'costumers' => $costumers,
            'user' => $user,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::where('id', $id)->first();

        $user->setMasterAttribute($request->master);
        $user->setAdminAttribute($request->admin);

        if(!empty($request->file('cover'))){
            Storage::delete($user->cover);
            Cropper::flush($user->cover);
            $user->cover = '';
        }

        $user->fill($request->all());

        if(!empty($request->file('cover'))){
            $user->cover = $request->file('cover')->store('user');
        }

        if(!$user->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.users.edit', [
            'user' => $user->id
        ])->with(['color' => 'green', 'message' => 'Usuario atualizado com sucesso!']);
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
