<?php

require('./my_sort.php');

$test = [45, 78967, 56, 908, -2345, 33, 0, 27, 54, -12, 4, 1, 15];

echo "Tableau:\n";
print_r($test);
echo "Test tri a bulle:\n";
print_r(my_sort($test));
echo "\n\n";
echo "Test tri a fusion:\n";
print_r(my_speed_sort($test));

