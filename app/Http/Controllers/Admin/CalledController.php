<?php

namespace App\Http\Controllers\Admin;

use App\Called;
use App\Category;
use App\Client;
use App\Http\Controllers\Controller;
use App\Module;
use App\User;
use App\Http\Requests\Admin\Called as CalledRequest;
use Illuminate\Http\Request;

class CalledController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $calleds = Called::all();
        return view('admin.calleds.index' ,[
            'calleds' => $calleds
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $clients = Client::orderBy('social_name')->get();
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $modules = Module::orderBy('id')->get();


        return view('admin.calleds.create', [
            'clients' => $clients,
            'users' => $users,
            'categories' => $categories,
            'modules' => $modules
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CalledRequest $request)
    {
        $calledCreate = Called::create($request->all());
        return redirect()->route('admin.calleds.edit',[
            'called' => $calledCreate->id
        ])->with(['color' => 'green', 'message' => 'Chamado criado com sucesso!']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
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
        $called = Called::where('id', $id)->first();
        $clients = Client::orderBy('social_name')->get();
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $modules = Module::orderBy('id')->get();

        return view('admin.calleds.edit', [
            'called' =>$called,
            'clients' => $clients,
            'users' => $users,
            'categories' => $categories,
            'modules' => $modules
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(CalledRequest $request, $id)
    {
        $called = Called::where('id', $id)->first();

        $called->fill($request->all());

        if(!$called->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.calleds.edit', [
            'called' => $called->id
        ])->with(['color' => 'green', 'message' => 'Chamado atualizado com sucesso!']);


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
