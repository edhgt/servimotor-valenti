<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Requests\VehiculoStoreRequest;
use App\Http\Requests\VehiculoUpdateRequest;
use App\Http\Resources\VehiculoResource;
use App\Models\Vehiculo;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Vehiculo::query()->with('cliente');

        if ($request->filled('id_cliente')) {
            $query->where('id_cliente', $request->integer('id_cliente'));
        }

        if ($request->filled('buscar')) {
            $buscar = $request->input('buscar');
            $query->where(function ($q) use ($buscar) {
                $q->where('placa', 'like', "%{$buscar}%")
                  ->orWhere('marca', 'like', "%{$buscar}%")
                  ->orWhere('modelo', 'like', "%{$buscar}%")
                  ->orWhere('vin', 'like', "%{$buscar}%");
            });
        }

        $vehiculos = $query->orderByDesc('created_at')->paginate($request->integer('per_page', 15));

        return VehiculoResource::collection($vehiculos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoStoreRequest $request)
    {
        $vehiculo = Vehiculo::create($request->validated());

        return (new VehiculoResource($vehiculo->load('cliente')))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        return new VehiculoResource($vehiculo->load('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoUpdateRequest $request, Vehiculo $vehiculo)
    {
        $vehiculo->update($request->validated());

        return new VehiculoResource($vehiculo->load('cliente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehiculo $vehiculo)
    {
        $vehiculo->delete();

        return response()->noContent();
    }
}
