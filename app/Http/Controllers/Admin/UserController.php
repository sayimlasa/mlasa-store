<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
     
        $userid = $request->get('userid') ?? '';
        if (!empty($userid)) {
            $user = User::query()->where('users.id', $userid)->first();  
        }else{
            return view('admin.users.create');
        }
   
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userarray = $request->get('user');
        if (empty($userarray['id'])) {//new
            $userarray['password'] = bcrypt('user123');
            $userarray['created_by'] = Auth::id();
            User::query()->create($userarray);
        } else {//update
            $user = User::query()->find($userarray['id']);
            if (!$user) redirect()->back()->with('error', 'User not found');
            $userarray['modified_by'] = Auth::id();
            $user->update($userarray);
        }
        return redirect()->route('users')->with('success', 'User saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
 

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
