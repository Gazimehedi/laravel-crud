<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class crudController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('users',compact('user'));
    }
    public function create()
    {
        return view('create');
    }
    public function insert(Request $request)
    {
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'email'=>'required|email|unique:users,users.email',
            'phone'=>'required',
            'image'=>'required|mimes:png,jpg,jpeg',
        ]);
        if($request->image){
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $image_name = time().".".$ext;
            $image->move('media/',$image_name);
        }
        $arr = [
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'image'=>$image_name,
        ];
        User::create($arr);
        return redirect()->route('home')->with('msg','Data insert successfully');
    }
    public function edit($id)
    {
        $user = User::find($id);
        return view('edit',compact('user'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string|min:3|max:40',
            'email'=>'required|email',
            'phone'=>'required',
            'image'=>'mimes:png,jpg,jpeg',
        ]);
        $user = User::find($id);
        if($request->image){
            $path = 'media/'.$user->image;
            if(File::exists($path)){
                File::delete($path);
            }
            // $path = $request->image->store('/public/media');
            $image = $request->image;
            $ext = $image->getClientOriginalExtension();
            $image_name = time().".".$ext;
            $image->move('media/',$image_name);
            $user->image=$image_name;
        }
        $user->name = $request->name;
        $user->name = $request->email;
        $user->name = $request->phone;
        $user->save();
        return redirect()->route('home')->with('msg','Data update successfully');
    }
    public function destroy($id)
    {
        $user = User::find($id);
            $path = 'media/'.$user->image;
            if(File::exists($path)){
                File::delete($path);
            }
        $user->delete();
        return redirect()->route('home')->with('msg','Data delete successfully');
    }
}
