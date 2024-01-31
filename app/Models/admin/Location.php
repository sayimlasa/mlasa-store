<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Location extends Model
{
    use HasFactory;
    public function ScopeList(){
        return DB::table('locations','l')
        ->join('branches as b','b.id','=','l.branch_id')
        ->select('l.*','b.name as branch_name')
        ;
    }
}
