<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidatura;

class CandidaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       // $this->middleware('auth')->except(['create', 'store']);
        $this->middleware('auth')->only(['index']);
    }

    public function index()
    {
        //
        $candidaturas = Candidatura::orderBy('id', 'DESC')->get();
        return view('candidaturas', compact('candidaturas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('candidatura')->with('success','Candidatura Submetida com sucesso.');
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
        $candidatura = Candidatura::create($request->all());

        if($candidatura){
            $fileName = $request->cv->storeAs('public/cvs', $candidatura->id . '.' . $request->cv->extension());
            $candidatura->cv = $candidatura->id . '.' . $request->cv->extension();
            $candidatura->save();
            //$request->cv->storeAs('cvs', $candidatura->id . '.' . $request->cv->extension());
        }

        return redirect()->route('candidatura.create');
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
    public function destroy(Candidatura $candidatura)
    {
        //
        $candidatura->delete();
        return redirect()->route('candidatura.index');
    }
}
