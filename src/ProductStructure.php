<?php

namespace App;

class ProductStructure
{
    const products = [
        "preto-PP",
        "preto-M",
        "preto-G",
        "preto-GG",
        "preto-GG",
        "branco-PP",
        "branco-G",
        "vermelho-M",
        "azul-XG",
        "azul-XG",
        "azul-XG",
        "azul-P"
    ];

    public function make(): array
    {
        $products = self::products;
        $colors = array();
        $result = array();

        //Pega todas as cores
        for ($i = 0; $i < COUNT($products); $i++) {
            array_push($colors, strtok($products[$i], '-'));
        }

        $colors = array_unique($colors);

        //Pega a quantidade de tamanhos de cada cor
        $newProducts = array_count_values($products);

        //Insere os tamanhos dentro de cada cor
        foreach ($colors as $color) {
            $finalColor = array();
            foreach ($newProducts as $item => $value) {
                if (strpos($item, $color) !== false) {
                    $finalColor = array_merge($finalColor, array(substr($item, strpos($item, "-") + 1) => $value));
                }
            }

            $result[$color] = $finalColor;
        }

        return $result;
    }
}
