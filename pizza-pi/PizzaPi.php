<?php

class PizzaPi
{
    public function calculateDoughRequirement(int $num_pizzas, int $num_persons): int
    {
        return (int) (($num_persons * 20) +  200) * $num_pizzas;
    }

    public function calculateSauceRequirement(int $num_pizzas, int $sauce_volume_ml): int
    {
        $sauce_per_pizza = 125; //ml
        return (int) ceil($num_pizzas * $sauce_per_pizza / $sauce_volume_ml);
    }

    public function calculateCheeseCubeCoverage(float $cube_side_length, float $cheese_layer_thickness, float $pizza_diameter): int
    {
        return (int) floor(pow($cube_side_length, 3) / ($cheese_layer_thickness * pi() * $pizza_diameter));
    }

    public function calculateLeftOverSlices(int $number_of_pizzas, int $number_of_friends): int
    {
        return (int) (($number_of_pizzas * 8) % $number_of_friends);
    }
}
