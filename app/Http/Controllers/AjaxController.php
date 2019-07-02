<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\categories;
use App\types;

class AjaxController extends Controller
{
    public function getTypes($idcategories)
    {
        // admin/ajax/types/{{idcategories}}
        $types = types::where('idcategories',$idcategories)->get();
        foreach($types as $type)
        {
            echo "<option value='.$type->id.'>$type->name</option>";
        }
    }
}
?>