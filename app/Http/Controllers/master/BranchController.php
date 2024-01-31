<?php

namespace App\Http\Controllers\master;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\admin\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branches=Branch::all();
        return view('master.branch.branh-list',compact('branches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $branchid = $request->get('branchid') ?? '';
        if (empty($branchid)) {
            return view('master.branch.branch-create');
        } else { //edit
            $branch = Branch::query()->where('branches.id', $branchid)->first();
            return view('master.branch.branch-create',compact('branch'));
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $brancharray = $request->get('branch');
        //return $rolearray;
        DB::beginTransaction();
        try {
            if (empty($brancharray['id'])) { //create 
                $brancharray['created_by'] = Auth::id();
                $branch = new Branch($brancharray);
                $branch->save();
            } else { //upated
                $branch = Branch::find($brancharray['id']);
                if (!$branch) return back()->with('error', 'Branch not found!');
                $brancharray['modified_by'] = Auth::id();
                $branch->update($brancharray);
            }
            DB::commit();
            return redirect()->route('branches')->with("success", "Branch successfully saved");
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
            return back()->with('error', 'Failed to save Role');
        }
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
    public function edit(string $id)
    {
        //
    }

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
