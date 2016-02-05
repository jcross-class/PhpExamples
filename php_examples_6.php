<?php
/**
 * php_examples_6 by Jason Cross for ICS-325 Spring 2016
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
 * - functions
 * - printf
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


// Functions can be defined before they are called.
// However, let's start by defining one.
// Notice that a return type and types for the parameters are not required.
print_example_count($example_count++,__LINE__);
function sum_two_numbers($first_number, $second_number) {
    // add the two numbers together and return the result
    return $first_number + $second_number;
}

// A return is optional in a function.
function echo_hello() {
    echo "Hello\n";
}

// Let's try out the 2 functions we defined.
echo_hello();
$sum = sum_two_numbers(10, 5);
echo "The sum is: $sum\n";

// We can also pass variables by reference to a function.
// Normally variable passed to a function is copied so any changes to it
// in the function won't affect the original variable.  When the variable
// is passed by reference, the original variable will be modified by
// the function.
// This example from the PHP Manual illustrates the concept well.
print_example_count($example_count++,__LINE__);
function add_some_extra(&$string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
add_some_extra($str);
echo $str . "\n";    // outputs 'This is a string, and something extra.'

// Here's the same function, but instead of passing by reference,
// the $str is copied.
print_example_count($example_count++,__LINE__);
function try_to_add_some_extra($string)
{
    $string .= 'and something extra.';
}
$str = 'This is a string, ';
try_to_add_some_extra($str);
echo $str . "\n";

// The printf function can be used to output strings in a given format.
// The %s is a placeholder for a string.  % f is a place holder for a float.
// The .4 between the % and f tell printf to print the float with
// 4 digits of precision.
print_example_count($example_count++,__LINE__);
$my_string = "What is 1/3? ";
printf("%s it is %.4f", $my_string, 1/3);
echo "\n";