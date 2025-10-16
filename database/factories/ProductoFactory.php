<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categoria;
use App\Models\Producto;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
{
    protected $model = Producto::class;
    public function definition(): array
    {
        return [
            //faker es una libreria que nos permite genera datos falsos
            //unique() es un metodo que nos permite generar valores unicos
            //word() es un metodo que genera una palabra aleatoria
            //bothify() es un metodo que genera una cadena con letras y numeros
            //#### representa numeros
            //SKU-#### representa una cadena que empieza con SKU- seguido de 4 numeros
            //randomFloat(2,1,1000) genera un numero decimal con 2 decimales entre 1 y 1000
            //numberBetween(0,100) genera un numero entero entre 0 y 100
            //boolean(90) genera un valor booleano con una probabilidad del 90%
            'categoria_id' => Categoria::factory(),
            'nombre' => $this->faker->word(3, true),
            'sku' => $this->faker->unique()->bothify('SKU-####'),
            'precio' => $this->faker->randomFloat(2,1,1000),
            'stock' => $this->faker->numberBetween(0, 100),
            'activo' => $this->faker->boolean(90),
        ];
    }
}
