<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Promotion;

class PromotionFactory extends Factory
{
     /**
    * The name of the factory's corresponding model.
    *
    * @var string
    */
    protected $model = Promotion::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
         'status' =>$this->faker->boolean(),
         'montant' =>$this->faker->numberBetween($min = 10000, $max = 10000),
         'produit_id' =>$this->faker->randomElement($array = array ('1','2','3','4','5','6','7','8','9','10')),
        ];
    }
}
