<?php

namespace App\Http\Controllers\Admin;

use App\Costumer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Customer as CostumerRequest;

class CostumerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $costumers = Costumer::all();
        return view('admin.costumers.index', [
            'costumers' => $costumers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.costumers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CostumerRequest $request)
    {
        $createCostumer = Costumer::create($request->all());

        return redirect()->route('admin.costumers.edit', [
            'customer' => $createCostumer->id,
        ])->with(['color' => 'green', 'message' => 'Empresa cadastrada com sucesso!']);
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
        $costumer = Costumer::where('id', $id)->first();

        return view('admin.costumers.edit', [
            'costumer' => $costumer
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(CostumerRequest $request, $id)
    {
        $costumer = Costumer::where('id', $id)->first();
        $costumer->fill($request->all());

        $costumer->setStatusAttribute($request->status);

        if(!$costumer->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.costumers.edit', [
            'costumer' => $costumer->id,
        ])->with(['color' => 'green', 'message' => 'Empresa atualizada com sucesso!']);
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
