<?php

namespace Mfarag\CartesianTree;

use Illuminate\Database\Eloquent\Model;

class Cartesian extends Model
{
    /**
     * Build permutations function
     *
     * @param array $raw_data
     * @return array
     * @author Mina Farag <mina.farag@icloud.com>
     */
    public static function buildPermutations(array $raw_data):array
    {
        if (! $raw_data) {
            return [[]];
        }

        $subset = array_shift($raw_data);
        $cartesianSubset = self::buildPermutations($raw_data);

        $result = [];
        foreach ($subset as $value) {
            foreach ($cartesianSubset as $product) {
                array_unshift($product, $value);
                $result[] = $product;
            }
        }

        return $result;
    }
}
