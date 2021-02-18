<?php


function my_sort(array $array): array {
    echo implode(', ', $array) . "\n";
    while (true) {
        $swapped = false;
        for ($i = 0; $i < count($array) - 1; $i++)
            if ($array[$i] > $array[$i + 1]) {
                $temp = $array[$i];
                $array[$i] = $array[$i + 1];
                $array[$i + 1] = $temp;
                $swapped = true;
                echo implode(', ', $array) . "\n";
            }
        if (!$swapped) return $array;
    }
}

function my_speed_sort(array $array): array {
    $array = array_chunk($array, 2);
    foreach ($array as $key => $value) {
        $array[$key] = my_sort($array[$key]);
        echo "\n";
    }
    $x = 0;
    $y = 1;
    $z = 0;
    $tmp = [];
    while ($x <= count($array) - 1) {
        if ($y >= count($array) && count($array) % 2 === 1) {
            $tmp[$z - 1] = array_merge($tmp[$z - 1], $array[count($array) - 1]);
            $tmp[$z - 1] = my_sort($tmp[$z - 1]);
        } else {
            $tmp[$z] = array_merge($array[$x], $array[$y]);
            $tmp[$z] = my_sort($tmp[$z]);
        }
        $z++;
        $y += 2;
        $x += 2;
    }
    $array = $tmp;
    if (count($array) != 1)
        return recursive_merge($array);
    else return $array;
}

function recursive_merge(array $array): array {
    $x = 0;
    $y = 1;
    $z = 0;
    $tmp = [];
    while ($y <= count($array)) {
        if ($y >= count($array) && count($array) % 2 === 1) {
            $tmp[$z - 1] = array_merge($tmp[$z - 1], $array[count($array) - 1]);
            $tmp[$z - 1] = my_sort($tmp[$z - 1]);
        } else {
            $tmp[$z] = array_merge($array[$x], $array[$y]);
            $tmp[$z] = my_sort($tmp[$z]);
        }
        $z++;
        $y += 2;
        $x += 2;
    }
    $array = $tmp;
    if (count($array) != 1)
        return recursive_merge($array);
    else return $array;
}
