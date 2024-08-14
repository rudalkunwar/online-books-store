<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;

class BubbleShortAlgorithm extends Controller
{
    /**
     * Sort an Eloquent collection in descending order based on a specific attribute using bubble sort.
     *
     * @param \Illuminate\Support\Collection $collection
     * @param string $attribute
     * @return \Illuminate\Support\Collection
     */
    public function sortDescending(Collection $collection, string $attribute): Collection
    {
        $array = $collection->all(); // Convert the collection to an array
        $n = count($array);

        // Early return if the array is empty or has one element
        if ($n < 2) {
            return $collection; // Return the original collection if no sorting is needed
        }

        // Perform bubble sort
        for ($i = 0; $i < $n - 1; $i++) {
            for ($j = 0; $j < $n - $i - 1; $j++) {
                // Swap if the current element's attribute is smaller than the next element's attribute
                if ($array[$j]->{$attribute} < $array[$j + 1]->{$attribute}) {
                    $temp = $array[$j];
                    $array[$j] = $array[$j + 1];
                    $array[$j + 1] = $temp;
                }
            }
        }

        return new Collection($array); // Convert the array back to a collection
    }
}
