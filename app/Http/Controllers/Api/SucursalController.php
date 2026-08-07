<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\Sucursal;
use App\Http\Controllers\Controller;
use App\Http\Requests\SucursalStoreRequest;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $sucursales = Sucursal::simplePaginate($request->per_page);
        return response()->json($sucursales);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SucursalStoreRequest $request)
    {
        $sucursal = Sucursal::create($request->all());
        return response()->json($sucursal, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        return response()->json($sucursal);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sucursal $sucursal)
    {
        $sucursal->update($request->all());
        return response()->json($sucursal);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
