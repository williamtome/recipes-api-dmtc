<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $params;

    protected $ingredients;

    public function index(Request $request): \Illuminate\Http\JsonResponse
    {
        if ($request->filled('i') == false) {
            return response()->json("Please, add url parameter 'i' and type the ingredients.");
        }
        $this->params = $request->input('i');
        $this->ingredients = explode(',', $this->params);
        return response()->json($this->ingredients);
    }

    private function getFormatURL($url, $params): string
    {
        $customUrl = $url;

        foreach ($params as $param) {
            $customUrl .= $param . ',';
        }

        return $customUrl;
    }
}
