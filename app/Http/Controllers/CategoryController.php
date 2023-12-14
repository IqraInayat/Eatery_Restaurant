<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function category_form()
    {
        return view('AdminPanel.Category.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'discription' => 'required',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->discription = $request->discription;
        $category->save();

        return redirect()->back()->with('success','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $search = $request->search;
        if (!is_null($search)) 
        {
            $categories = Category::where('name', 'LIKE', "%$search%")->get();
            return view("AdminPanel.Category.table", ['category' => $categories,"search" =>  $search]);
        } 
        else 
        {
            $categories = Category::all();
            return view("AdminPanel.Category.table", ['category' => $categories,"search" =>  $search]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit = Category::find($id);
        return view('AdminPanel.Category.update',['data' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $update = Category::find($id);
        $update->name = $request->name;
        $update->discription = $request->discription;
        $update->save();
        return redirect()->route('category_table')->with('success','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Category::find($id);
        $delete->delete();
        return redirect()->back()->with('success','Category Deleted Successfully');
    }
}
