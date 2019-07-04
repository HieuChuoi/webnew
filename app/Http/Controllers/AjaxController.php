<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\Types;

class AjaxController extends Controller
{
    public function getTypes($idcategories)
    {
        // admin/ajax/types/{{idcategories}}
        $types = Types::where('idcategories',$idcategories)->get();
        foreach($types as $type)
        {
            echo "<option value='.$type->id.'>$type->name</option>"; 
        }
    }
}
?>