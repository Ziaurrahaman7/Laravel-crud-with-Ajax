<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
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
      $users =  Profile::all();
       return view('form', compact('users'));
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
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:profiles,email',
            'image'=>'image|nullable'
        ]);
        // dd($request->file('image'));
        // $imgupload = $request->file('image')->store('uploads');
        // dd($imgupload);
        if ($request->hasFile('image')){
            $imgupload = $request->file('image')->store('uploads');
            $data['image']=$imgupload;
        }
        // $filname = $request->file('image')->getClientOriginalName();
      
       Profile::create($data);
       return redirect('/')->with('message',"succesfully done");
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
        $data = $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:profiles,email',
            'image'=>'image|nullable'
        ]);
        // dd($request->file('image'));
        // $imgupload = $request->file('image')->store('uploads');
        // dd($imgupload);
        if ($request->hasFile('image')){
            $imgupload = $request->file('image')->store('uploads');
            $data['image']=$imgupload;
        }
        // $filname = $request->file('image')->getClientOriginalName();
       Profile::create($data);
       return redirect('/')->with('message',"succesfully done");
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
