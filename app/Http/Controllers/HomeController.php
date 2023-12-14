<?php

namespace App\Http\Controllers;

use App\Models\Chef;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function web_index()
    {
        $chef = Chef::all();
        $menu = Menu::paginate(6);
        // $menuItems = Menu::paginate(8);
        return view('web',[
            "chef" => $chef,
            "menu" => $menu,
            // "menuItems" => $menuItems
        ]);
    }
    
    public function Display_Users(Request $request)
{
    $user_type = Auth::user()->usertype;
    
    if ($user_type == 'admin') 
    {
        $search = $request->search;
        
        if (!is_null($search)) 
        {
            $users_data = User::where('name', 'LIKE', "%$search%")->get();
        } 
        else 
        {
            $users_data = User::all();
        }

        return view("AdminPanel.table", ['users' => $users_data, "search" => $search]);
    }
    else
    {
        return view('web');
    }
}


    public function Edit_User(string $id)
    {
        $users_data = User::find($id);
        return view('AdminPanel.update', ['user'=> $users_data]);
    }

    public function Update_User(Request $request,string $id)
    {
       $this->validate($request,[
            'password' => 'required|confirmed'
       ]);
        $user_data = User::find($id);
        $user_data->name = $request->name;
        $user_data->email = $request->email;
        $user_data->password = bcrypt($request->password);
        $user_data->save();
        return redirect()->route('user_table')->with('success' , 'User Updated Successfully');

    }
    public function Delete_user(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('success','User Deleted Successfully');
    }
}
