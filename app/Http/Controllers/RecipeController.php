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
            return $this->resultHandler($results);
        }

        return response()->json([
            'data' => 'Please enter a maximum of 3 ingredients!',
            'status' => 406
        ]);
    }

    private function resultHandler($results): JsonResponse
    {
        $data = json_decode($results);
        $results = response()->json($data->results);

        $recipesReturned = [
            'keywords' => explode(',', $this->ingredients),
            'recipes' => []
        ];

        foreach ($results->getData() as $result) {
            $recipeTitle = $this->replaceSpaceByPlusOnRecipeTitle($result->title);

            $this->ingredients = $this->convertStringToArray($result->ingredients);

            sort($this->ingredients);

            $urlGif = $this->getResultsOfTheGifsRequest($recipeTitle);

            $recipe = [
                'title' => $result->title,
                'ingredients' => $this->ingredients,
                'link' => $result->href,
                'gif' => $urlGif
            ];

            array_push($recipesReturned['recipes'], $recipe);
        }

        return response()->json($recipesReturned);
    }

    private function getResultsOfTheGifsRequest($recipeTitle): string
    {
        $apiKey = env('GIPHY_API_KEY');

        try {
            $response = $this->setRequestHttp('GET', "https://api.giphy.com/v1/gifs/search", [
                'query' => [
                    'api_key' => $apiKey,
                    'q' => $recipeTitle
                ]
            ]);

            $results = json_decode($response->getBody()->getContents());
            return $results->data[0]->images->original->url;
        } catch (GuzzleException $e) {
            return response()->json(['data' => 'Error on request data of the Giphy API.', 'status' => 500]);
        }
    }

    private function getResultsOfTheRecipeRequest(): string
    {
        define('RECIPE_PUPPY_API', "http://www.recipepuppy.com/api/");

        try {
            $response = $this->setRequestHttp('GET', RECIPE_PUPPY_API, [
                'query' => ['i' => $this->ingredients]
            ]);

            return $response->getBody()->getContents();
        } catch (GuzzleException $e) {
            echo $e;
        }
    }

}
