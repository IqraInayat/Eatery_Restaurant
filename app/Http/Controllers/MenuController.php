<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Chef;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class MenuController extends Controller
{
    /**
     * Show the form for creating a new resource.
     */
    public function Menu_Page()
    {
        $chef = Chef::all();
        $category = Category::all();
        return view('AdminPanel.Menu.menuform',[
            "chef" => $chef,
            "category" => $category
        ]);
    }
     
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=> 'required',
            'chef' =>'required',
            'price'=> 'required',
            'category' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg'
        ]);

        $imagename = microtime(). 'menu.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/images'),$imagename);

        $menu = new Menu();
        $menu->name = $request->name;
        $menu->chef = $request->chef;
        $menu->price = $request->price;
        $menu->category = $request->category;
        $menu->image = $imagename;
        $menu->save();
        return redirect()->back()->with(["success" => "Menu Submitted Successfully"]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) 
        {
            $show_menu = Menu::where('name', 'LIKE', "%$search%")->get();
            return view("AdminPanel.Menu.menutable", ['menu' => $show_menu,"search" =>  $search]);
        } 
        else 
        {
            $show_menu = Menu::all();
            return view("AdminPanel.Menu.menutable", ['menu' => $show_menu,"search" =>  $search]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Menu::find($id);
        return view('AdminPanel.Menu.updatemenu',['data' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Menu::find($id);
        $update->name = $request->name;
        $update->chef = $request->chef;
        $update->price = $request->price;
        $update->category = $request->category;
        $imagePath = public_path('./admin/images/' . $update->image);
        if (File::exists($imagePath)) 
        {
            File::delete($imagePath);
        }

        $newimage = microtime(). 'empimg.' . $request->image->getClientOriginalExtension();
        $request->image->move(public_path('./admin/images'),$newimage);
        $update->image = $newimage;
        $update->save();
        return redirect()->route('menu_table')->with(['success'=> 'Menu Updated Successfully']);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Menu::find($id);
        $imgpath = public_path('./admin/images/'. $delete->image);
        if(File::exists($imgpath))
        {
            File::delete($imgpath);
        }
        $delete->delete();
        return redirect()->back()->with('success','Menu Deleted Successfully');
    }
}
