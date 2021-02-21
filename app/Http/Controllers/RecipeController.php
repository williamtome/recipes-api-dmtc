<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $params;

    public function index(Request $request)
    {
        if ($request->input('i') === false) {
            return response()->json(['data' => ['message' => 'The parameter is incorrect.']], ['status' => 400]);
        }
        $this->params = $request->input('i');
        return $this->params;
    }
}
