<?php

namespace App\Http\Controllers;

use App\Models\Breed;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $type = 'dog')
    {
        $breeds = Breed::where('type', strtolower($type))->get();

        return $breeds->all();
    }
}
