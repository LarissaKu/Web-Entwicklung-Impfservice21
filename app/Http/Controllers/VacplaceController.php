<?php

namespace App\Http\Controllers;

use App\Models\Vacplace;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class VacplaceController extends Controller
{
    public function index(){
        //load all vacdates and relations
        $vacplaces = Vacplace::all();
        return $vacplaces;
    }

    public function findById(int $id){
        $vacplace = Vacplace::where('id',$id)->first();
        return $vacplace;
    }
}
