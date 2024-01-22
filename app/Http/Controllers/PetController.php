<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Pet;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pets = Pet::all();

        return Inertia::render('Pets/Index', [
            'pets' => $pets,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pets = Pet::all();

        return Inertia::render('Pets/Create', [
            'pets' => $pets,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|string|max:100',
            'type' => 'required|string|max:100',
            'breed' => 'required|string|max:100',
            'gender' => 'required|string|max:10',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        return Pet::create([
            'name' => request('name'),
            'type' => request('type'),
            'breed' => request('breed'),
            'gender' => request('gender'),
        ]);
    }
}
