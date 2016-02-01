<?php
/**
 * php_examples_2 by Jason Cross for ICS-325 Spring 2016
 * Version 1
 * 1/28/2016
 *
 * This program is a collection of examples to illustrate how PHP works.
 * It is written with the assumption that the reader knows the basics of Java.
 *
 * The program is broken into numbered examples that are automatically numbered.
 * The line number where the example code starts is printed next to the example number.
 * The example line number can be used to match up the code and the program output.
 *
 * The following examples cover the basics of:
 * - arrays
 *
 * Citation/License:
 * I read the official PHP docs while writing this.
 * I'm sure I've copied sentences verbatim or close to verbatim from
 * several PHP doc pages.  The license for the PHP docs at the time
 * I accessed them can be found here:
 *   http://php.net/manual/en/copyright.php
 * The license is the "Creative Commons Attribution 3.0 License or later".
 * The terms of that license can be found here:
 *   http://creativecommons.org/licenses/by/3.0/
 * I consider this program to be built upon the PHP documentation and therefore
 * I give credit to the PHP Manual as the
 * base work (http://php.net/manual/en/index.php) for this program.
 * Thus this program is bound by the "Creative Commons Attribution 3.0 License
 * or later" as well.
 * Therefore this program may be distributed only subject to the terms
 * and conditions set forth in the Creative Commons Attribution 3.0 License
 * or later:
 *   http://creativecommons.org/licenses/by/3.0/
 */

// This variable will be used to count the number of examples.
// It will be stored as an integer since it isn't surrounded by quotes
// and doesn't have any values after the decimal point.
$example_count = 1;

// here's a basic function
function print_example_count ($count, $line) {
    echo "\nExample " . $count . " (line $line)\n--------------------\n";
}
// Notice that it doesn't have to be part of a class.
// This function is a shortcut for printing out the example number
// and the line number before the example code.


// All arrays in PHP are an ordered map.
// By default, integers starting at 0 are used as the keys.
// Let's create a basic array.
print_example_count($example_count++,__LINE__);
$my_basic_array = array("one", "two", "three");
// var_dump prints the contents of a variable without modifying the variable
// take a look at the contents of the array
var_dump($my_basic_array);
// array(3) means that the variable contains an array with 3 values
// [0] => string(3) "one" means that the key 0 maps to the value "one"
//   which is a string with 3 characters.
//
// Let's print out the second value in the array.
echo "\nThe value at index 1 in the array is: " . $my_basic_array[1] . "\n";

// Let's create an associative array, otherwise known as a hash map.
// Key value pairs must be specified using the syntax: key => value
print_example_count($example_count++,__LINE__);
$my_associative_array = array("ice" => "cream", "hot" => "pot", "time" => "lag");
// take a look at the contents of the array
var_dump($my_associative_array);
// Notice in the output of the array, unlike the previous array example,
// the keys that were specified were used instead of auto-incremented integers.
//
// Let's print out the value of the array associated with the key hot
echo "\nThe value associated with the key hot is: " . $my_associative_array["hot"] . "\n";

// It is easy to iterate through an array using the foreach statement.
print_example_count($example_count++,__LINE__);
foreach($my_basic_array as $array_element) {
    echo "A value from the array: $array_element\n";
}

// There is a different syntax that can be used for an associative array.
print_example_count($example_count++,__LINE__);
foreach($my_associative_array as $element_key => $element_value) {
    echo "The key $element_key maps to the value $element_value\n";
}

// The simple value only syntax works as well for associative arrays.
print_example_count($example_count++,__LINE__);
foreach($my_associative_array as $element_value) {
    echo "A value from the array: $element_value\n";
}

// Multi-dimensional arrays are supported as well.
print_example_count($example_count++,__LINE__);
$my_basic_2d_array = array(
    array(1, 2, 3, 4, 5),
    array("six", "seven", "eight", "nine", "ten"),
    array(11, "12", $my_basic_array, $my_associative_array)
);
// let's see what this looks like
var_dump($my_basic_2d_array);
echo "\n";
// let's reference a few elements directly
echo '$my_basic_2d_array[0][2] is: ' . $my_basic_2d_array[0][2] . "\n";
echo '$my_basic_2d_array[1][2] is: ' . $my_basic_2d_array[1][2] . "\n";
echo '$my_basic_2d_array[2][2] is: ' . $my_basic_2d_array[2][1] . "\n\n";
// we have to use var_dump to see the contents which are arrays
echo 'var_dump($my_basic_2d_array[2][2]) is: ' . "\n";
var_dump($my_basic_2d_array[2][2]);
// for more on arrays: http://php.net/manual/en/language.types.array.php

// let's try some array functions
print_example_count($example_count++,__LINE__);
echo "Here's \$my_basic_array: \n";
var_dump($my_basic_array);
echo "\nHere's \$my_basic_array in reverse order: \n";
var_dump(array_reverse($my_basic_array));

// let's sort the associative array too
print_example_count($example_count++,__LINE__);
echo "Here's \$my_associative_array: \n";
var_dump($my_associative_array);
echo "\nHere's \$my_associative_array sorted by the key: \n";
// first sort the array by its keys
ksort($my_associative_array);
// then print it out
var_dump($my_associative_array);
// for more array functions: http://php.net/manual/en/ref.array.php

// we can add new values to an array as well
// let's add ten to the end of $my_basic_array
print_example_count($example_count++,__LINE__);
$my_basic_array[] = "ten";
var_dump($my_basic_array);
echo "\n";
// let's add cool => beans to $my_associative_array
$my_associative_array["cool"] = "beans";
var_dump($my_associative_array);

// We can easily turn an array into a string using implode.
// Implode joins all the array elements together into a string separated
// by the specified glue string.  In this case, that's: ,
print_example_count($example_count++,__LINE__);
$my_basic_array_imploded = implode(",", $my_basic_array);
echo "\$my_basic_array_imploded is: \n";
echo $my_basic_array_imploded . "\n";
// for more on implode: http://php.net/manual/en/function.implode.php

// We can reverse the process using explode to take the string
// and make it into an array.  Explode splits the string into
// array elements based on a given delimiter.  In this case, that's: ,
print_example_count($example_count++,__LINE__);
$another_basic_array = explode(",", $my_basic_array_imploded);
echo "var_dump(\$another_basic_array) is:\n";
var_dump($another_basic_array);
// for more on explode: http://php.net/manual/en/function.explode.php
