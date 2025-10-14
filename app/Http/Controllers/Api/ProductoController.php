<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    // Mostrar todos los productos
    public function index()
    {
        return response()->json(Producto::with('categoria')->get());
    }

    // Crear nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'categoria_id' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'sku' => 'required|string|max:50|unique:productos,sku',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'activo' => 'boolean'
        ]);

        $producto = Producto::create($request->all());
        return response()->json(['message' => 'Producto creado exitosamente', 'data' => $producto], 201);
    }

    // Mostrar producto por ID
    public function show($id)
    {
        $producto = Producto::with('categoria')->findOrFail($id);
        return response()->json($producto);
    }

    // Actualizar producto
    public function update(Request $request, $id)
    {
        $producto = Producto::findOrFail($id);

        $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'sku' => 'sometimes|string|max:50|unique:productos,sku,' . $producto->id,
            'precio' => 'sometimes|numeric|min:0',
            'stock' => 'sometimes|integer|min:0',
            'activo' => 'boolean'
        ]);

        $producto->update($request->all());
        return response()->json(['message' => 'Producto actualizado', 'data' => $producto]);
    }

    // Eliminar producto
    public function destroy($id)
    {
        $producto = Producto::findOrFail($id);
        $producto->delete();
        return response()->json(['message' => 'Producto eliminado correctamente']);
    }
}
