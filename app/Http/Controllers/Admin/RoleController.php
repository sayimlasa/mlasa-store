<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.role-list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $roleid = $request->get('roleid') ?? '';
        if (empty($roleid)) {
            return view('admin.roles.role-create');
        } else { //edit
            $role = Role::query()->where('roles.id', $roleid)->first();
            return view('admin.roles.role-create', compact('role'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoleRequest $request)
    {
       
        $rolearray = $request->get('role');
        //return $rolearray;
        DB::beginTransaction();
        try {
            if (empty($rolearray['id'])) { //create 
                $rolearray['created_by'] = Auth::id();
                $role = new Role($rolearray);
                $role->save();
            } else { //upated
                $role = Role::find($rolearray['id']);
                if (!$role) return back()->with('error', 'Role not found!');
                $rolearray['modified_by'] = Auth::id();
                $role->update($rolearray);
            }
            DB::commit();
            return redirect()->route('roles.list')->with("success", "Role successfully saved");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->with('error', 'Failed to save Role');
        }
    }
 
 

     
    public function destroy(string $id)
    {
        $role=Role::find($id);
        $role->delete();
        return redirect()->route('roles.list')
        ->with('succes',"Role successfully deleted");
    }
}
