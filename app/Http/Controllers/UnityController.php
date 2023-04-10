<?php

namespace App\Http\Controllers;

use App\Models\Unity;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\StoreUnityRequest;
use App\Http\Requests\UpdateUnityRequest;
use Illuminate\Support\Facades\Auth;

class UnityController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Unity::class, 'unity');
    }

    public function index()
    {
        $unities = Unity::all();
        return View::make('unities.index', compact('unities'));
    }

    public function create()
    {
        return View::make('unities.create');
    }

    public function store(StoreUnityRequest $request)
    {
        $this->authorize('create', Unity::class);
        Unity::create($request->validated());
        return Redirect::route('unities.index');
    }

    public function show(Unity $unity)
    {
        return View::make('unities.show', compact('unity'));
    }

    public function edit(Unity $unity)
    {
        return View::make('unities.edit', compact('unity'));
    }

    public function update(UpdateUnityRequest $request, Unity $unity)
    {
        $this->authorize('update', $unity);
        $unity->update($request->validated());
        return Redirect::route('unities.show', $unity->id);
    }

    public function destroy(Unity $unity)
    {
        $unity->delete();
        return Redirect::route('unities.index');
    }
}
