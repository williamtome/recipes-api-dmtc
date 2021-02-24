<?php

namespace App\Http\Controllers;

use PHPUnit\Framework\TestCase;

class RecipeControllerTest extends TestCase
{
    public function testClassExists()
    {
        $hasRecipeControllerClass = class_exists('App\\Http\\Controllers\\RecipeController');
        $this->assertTrue($hasRecipeControllerClass);
    }

    public function testMethodIndexExists()
    {
        $hasMethodIndexExists = method_exists('App\\Http\\Controllers\\RecipeController', 'index');
        $this->assertTrue($hasMethodIndexExists);
    }

    public function testConvertStringToArray()
    {
        $string = 'tomato, cheese, onions';
        $array = explode(', ', $string);
        $this->assertIsArray($array);
    }
}
