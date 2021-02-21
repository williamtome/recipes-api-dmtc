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

        if (count($this->ingredients) > 0 && count($this->ingredients) < 4) {
            $headers = [
                'Accept: application/json',
                'Content-Type: application/json'
            ];

            define('RECIPE_PUPPY_API', "http://www.recipepuppy.com/api/?i=");
            $url = $this->getFormatURL(RECIPE_PUPPY_API, $this->ingredients);

            $configs = [
                CURLOPT_URL => $url,
                CURLOPT_HEADER => false,
                CURLOPT_HTTPHEADER => $headers,
                CURLOPT_RETURNTRANSFER => true
            ];

            try {
                $ch = curl_init();
                curl_setopt_array($ch, $configs);
                $results = curl_exec($ch);
                curl_close($ch);
                return response()->json($results);

            } catch (\Exception $exception) {
                throw $exception;
            }
        }
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
