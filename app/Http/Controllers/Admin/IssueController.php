<?php

namespace App\Http\Controllers\Admin;

use App\Issue;
use App\Category;
use App\Costumer;
use App\Http\Controllers\Controller;
use App\Module;
use App\User;
use App\Http\Requests\Admin\Issue as IssueRequest;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $issues = Issue::all();
        return view('admin.issues.index' ,[
            'issues' => $issues
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
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $modules = Module::orderBy('id')->get();


        return view('admin.issues.create', [
            'costumers' => $costumers,
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
    public function store(IssueRequest $request)
    {
        $issueCreate = Issue::create($request->all());
        return redirect()->route('admin.issues.edit',[
            'issue' => $issueCreate->id
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
        $issue = Issue::where('id', $id)->first();
        $costumers = Costumer::orderBy('social_name')->get();
        $users = User::orderBy('name')->get();
        $categories = Category::orderBy('id')->get();
        $modules = Module::orderBy('id')->get();

        return view('admin.issues.edit', [
            'issue' =>$issue,
            'costumers' => $costumers,
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
    public function update(IssueRequest $request, $id)
    {
        $issue = Issue::where('id', $id)->first();

        $issue->fill($request->all());

        if(!$issue->save()){
            return redirect()->back()->withInput()->withErrors();
        }

        return redirect()->route('admin.issues.edit', [
            'issue' => $issue->id
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
