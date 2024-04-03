<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Department;

class GlobalSearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->global_search;

        $searchResults = [];

        $models = [
            Staff::class,
            Department::class,
        ];

        foreach ($models as $model) {
            $results = $model::globalSearch($query);
            $searchResults[basename(str_replace('\\', '/', $model))] = $results;
        }

        return $searchResults;
    }
}
