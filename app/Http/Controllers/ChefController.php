<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ChefController extends Controller
{
    public function create()
    {
        return view('AdminPanel.Chefs.form');
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            "name" => "required",
            "speciality" => "required",
            "nationality"=> "required",
            "image"=> "required|mimes:png,jpg,jpeg",
        ]);

        $imagename = microtime() . "chefimg." . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/chefimages/'),$imagename);

        $chef = new Chef();
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->nationality = $request->nationality;
        $chef->image = $imagename;
        $chef->save();
        return redirect()->back()->with('success','Chef Added Successfully');
    }

    public function show(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) 
        {
            $chef = Chef::where('name', 'LIKE', "%$search%")->get();
            return view("AdminPanel.Chefs.cheftable", ['chefs' => $chef,"search" =>  $search]);
        } 
        else 
        {
            $chef = Chef::all();
            return view("AdminPanel.Chefs.cheftable", ['chefs' => $chef,"search" =>  $search]);
        }
    }

    public function edit($id)
    {
        $chef = Chef::find($id);
        return view('AdminPanel.Chefs.updatechef',['data'=> $chef]);
    }

    public function update(Request $request,string $id)
    {
        $chef = Chef::find($id);
        $chef->name = $request->name;
        $chef->speciality = $request->speciality;
        $chef->nationality = $request->nationality;
        $imagepath = public_path('./admin/chefimages/'.$chef->image);
        if(File::exists($imagepath))
        {
            File::delete($imagepath);
        }

        $newimage = microtime().'chefimg.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/chefimages/'),$newimage);
        $chef->image = $newimage;
        $chef->save();
        return redirect()->route('chef_table')->with('success','Chef Updated Successfully');
    }

    public function destroy($id)
    {
        $chef = Chef::find($id);
        $imagepath = public_path('./admin/chefimages/'. $chef->image);
        if(File::exists($imagepath))
        {
            File::delete($imagepath);
        }
        $chef->delete();
        return redirect()->back()->with('success','Chef Deleted Successfully');
    }
}
