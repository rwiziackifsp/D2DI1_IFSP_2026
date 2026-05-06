<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view('members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return "O código mudou!";
        // Member::create($request->except('_token')); // Funcionou com essa linha e guarded em Member.php
        Member::create($request->all()); // Lançando erro 500 nesta linha, funcionou depois do primeiro cadastro com linha 34
        // Member::create($request->only(['firstname', 'lastname']));
        return redirect()->route('members.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) //public function edit(Member $member)
    {
        $member = Member::findOrFail($id);
        return view('members.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)    //public function update(Request $request, Member $member)
    {
        $member = Member::findOrFail($id);
        $member->update($request->all());
        return redirect()->route('members.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy ($id)  //public function destroy(Member $member)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('members.index');
    }
}
