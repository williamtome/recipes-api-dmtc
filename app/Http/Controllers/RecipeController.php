<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RecipeController extends Controller
{
    protected $ingredients;

    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function index(Request $request): JsonResponse
    {
        if ($request->filled('i') == false) {
            return response()->json([
                'data' => "Please, add url parameter 'i' and type the ingredients.",
                'status' => 400
            ]);
        }

        $this->ingredients = explode(',', $request->input('i'));

        if (count($this->ingredients) > 0 && count($this->ingredients) < 4) {
            $this->ingredients = $request->input('i');
            $results = $this->getResultsOfTheRecipeRequest();
            return response()->json($results);
        }

        return response()->json([
            'data' => 'Please enter a maximum of 3 ingredients!',
            'status' => 406
        ]);
    }

    private function getResultsOfTheRecipeRequest(): string
    {
        define('RECIPE_PUPPY_API', "http://www.recipepuppy.com/api/");

        try {
            $response = $this->client->request('GET', RECIPE_PUPPY_API, [
                'query' => ['i' => $this->ingredients]
            ]);
            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            echo $e;
        }
    }
}
