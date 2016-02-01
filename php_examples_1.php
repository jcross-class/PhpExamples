<?php
/**
 * php_examples_1 by Jason Cross for ICS-325 Spring 2016
 * Version 1
 * 1/27/2016
 *
 * This program is a collection of examples to illustrate how PHP works.
 * It is written with the assumption that the reader knows the basics of Java.
 *
 * The program is broken into numbered examples that are automatically numbered.
 * The line number where the example code starts is printed next to the example number.
 * The example line number can be used to match up the code and the program output.
 *
 * The following examples cover the basics of:
 * - program output
 * - code comment styles
 * - variables:
 *     + strings
 *     + booleans
 *     + integers
 *     + floats
 * - variable types and type casting
 * - string operators
 * - arithmetic operators
 * - equivalency operators
 * - functions
 * - magical constants
 * - control structures
 * - logical operators
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

// Comments are good!
// Check out comment documentation:
// http://php.net/manual/en/language.basic-syntax.comments.php
/*
 * another style of comment
 */
# and yet another style of comment

// PHP programs don't require any definitions or declarations of classes
// before code can be executed.  So, we'll start by defining some string
// variables.

// PHP variables do not require a declared type.
// PHP will decide what type of variable it is based on the input.
// Using single or double quotes let's PHP know the value is a string.
$my_string = "Hello world!";
$another_string = 'Hello again!';

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



// echo prints strings to the terminal or web server output.
// The \n is needed to create a new line in the output.
print_example_count($example_count++,__LINE__);
echo "Hi!\n";
// print works as well
print "Hello!\n";
// notice that both echo and print don't need parenthesis around their input parameters.
// That's because they're actually language constructs and not functions.  See:
// http://php.net/manual/en/function.echo.php
//
// echo and print are different, but we won't cover that right now.
// If you're curious, check out:
// http://www.w3schools.com/php/php_echo_print.asp

// You're probably wondering what __LINE__ is by now.
// It is a constant, and it is in fact a special constant.
// The PHP docs refers to it as a magic constant.
// It's magic because it changes depending on where
// it is used in the code.  So, it's not really a constant.
print_example_count($example_count++,__LINE__);
echo "The value of __LINE__ is " . __LINE__ . "\n";
// notice that __LINE__ is NOT interpolated in the double quoted string
// let's call it a few more times to convince ourselves that it changes values
echo "The value of __LINE__ is " . __LINE__ . "\n";
echo "The value of __LINE__ is " . __LINE__ . "\n";
echo "The value of __LINE__ is " . __LINE__ . "\n";
// Check out the PHP docs for more information on the eight magical constants:
// http://php.net/manual/en/language.constants.predefined.php

// strings surrounded by double quotes will be interpolated
// that allows variables and escaped characters to be evaluated
print_example_count($example_count++,__LINE__);
echo "A variable: $my_string AND a newline\n";
// here's the same line with single quotes
echo 'A variable: $my_string AND a newline\n';

// strings can be concatenated with the "." operator
echo "\n"; print_example_count($example_count++,__LINE__);
$combined_string = $my_string . " " . $another_string . "\n";
echo $combined_string;
// what happens when the concatenation operator is used on integers?
echo 5 . 7;
echo "\n";
// let's try that again with the addition operator
echo 5 + 7;
echo "\n";
// what about two strings with the addition operator?
echo "5" + "7";
echo "\n";
// what about a float in a string?
echo "5" + "7.5";
echo "\n";
// as you can see from the output, the type of operator influences how PHP
// automatically type casts a variable from one type to another
// "." will cause variables to be cast to a string
// "+" will cause variables to be cast as a number, either int or float

print_example_count($example_count++,__LINE__);
// let's see the type casting in action
// we can use the PHP function gettype to find out a variables type
echo gettype("This is a string of course!") . "\n";
echo gettype(5) . "\n";
echo '$combined_string is a ' . gettype($combined_string) . "\n";
echo '$example_count is an ' . gettype($example_count) . "\n";
echo "\nwhat about our tests from example " . ($example_count - 2) . "?\n";
echo '5 . 7 is a ' . gettype(5 . 7) . "\n";
echo '5 + 7 is an ' . gettype(5 + 7) . "\n";
echo '5 + 7 is an ' . gettype(5 + 7) . "\n";
echo '"5" + "7" is a ' . gettype("5" + "7") . "\n";
echo '"5" + "7.5" is a ' . gettype("5" + "7.5") . "\n";
// Check out the official docs for some more examples.
// The docs call it "type juggling":
// http://php.net/manual/en/language.types.type-juggling.php
//
// check out the the official docs for more information on:
//    string operators: http://php.net/manual/en/language.operators.string.php
//    arithmetic operators: http://php.net/manual/en/language.operators.arithmetic.php

// the "==" operator will try to type cast variables to make them equal
print_example_count($example_count++,__LINE__);
echo 'Does "0"==0 ? ' . ("0"==0) . "\n";
// notice how an integer was printed instead of a boolean
// what's going on here?
// let's check to see what variable type "0"==0 evaluates to
echo 'the expression ("0"==0) evaluates to type ' . gettype("0"==0) . "\n";
// it looks like PHP type casts a boolean into an integer string when the
// the concatenation operator is used
// let's check to convince ourselves
echo 'boolean true is cast to a string as ' . true . "\n";
// ok, now we know that the output of:
//    Does "0"==0 ? 1
// due to type casting means
//    Does "0"==0 ? true

// let's try some other equivalency tests
print_example_count($example_count++,__LINE__);
echo 'Does 0.0==0 ? ' . (0.0==0) . "\n";
echo 'Does 0==false ? ' . (0==false) . "\n";
echo 'Does ""==false ? ' . (""==false) . "\n";
// the empty string ("") is equivalent to false!
// that could get confusing and cause problems
// to prevent auto type casting and check to make sure the values
// are of the same type, use the === equivalency operator

// let's try the same equivalency tests with === instead of ==
print_example_count($example_count++,__LINE__);
echo 'Does 0.0===0 ? ' . (0.0===0) . "\n";
echo 'Does 0===false ? ' . (0===false) . "\n";
echo 'Does ""===false ? ' . (""===false) . "\n";
// Did you notice that that those 3 above expressions are returning
// false which PHP is casting into the empty string?

// let's make them print out as integers using user specified type casting
print_example_count($example_count++, __LINE__);
echo 'Does 0.0===0 ? ' . (int) (0.0===0) . "\n";
echo 'Does 0===false ? ' . (int) (0===false) . "\n";
echo 'Does ""===false ? ' . (int) (""===false) . "\n";
// let's see something that evalutes to true
echo 'Does 88===88 ? ' . (int) (88===88) . "\n";

// if statements work like they do in Java
print_example_count($example_count++, __LINE__);
if (1 == 1) {
    echo "1 is indeed equal to 1!\n";
}
// For a list of all the comparison operators you can use
// like "<", ">", "!=", etc. check out:
// http://php.net/manual/en/language.operators.comparison.php

// here's a control structure using if, elseif, and else
print_example_count($example_count++, __LINE__);
$one = 1;
if ($one == 2) {
    echo "$one is 2!\n";
} elseif ($one == 3) {
    echo "$one is 3!\n";
} elseif ($one == 4) {
    echo "$one is 4!\n";
} else {
    echo "I give up!\n";
}

// while loops like you would expect as well
print_example_count($example_count++, __LINE__);
$loop_count = 1;
while ($loop_count <= 10) {
    echo "This is loop #$loop_count\n";
    $loop_count = $loop_count + 1;
}

// here's a different way to increment $loop_count
print_example_count($example_count++, __LINE__);
$loop_count = 1;
while ($loop_count <= 3) {
    echo "This is loop #$loop_count\n";
    $loop_count += 1;
}

// here's another a different way to increment $loop_count
print_example_count($example_count++, __LINE__);
$loop_count = 1;
while ($loop_count <= 3) {
    echo "This is loop #$loop_count\n";
    $loop_count++;
}

// here's a way to combine the 2 lines of code in the loop into 1 line
print_example_count($example_count++, __LINE__);
$loop_count = 1;
while ($loop_count <= 3) {
    echo "This is loop #" . $loop_count++ . "\n";
}

// a basic for loop
print_example_count($example_count++, __LINE__);
for ($loop_count = 1; $loop_count <= 3; $loop_count++) {
    echo "This is loop #$loop_count\n";
}
// PHP has break and continue statements like Java
// check out the official docs for control structures to learn more:
// http://php.net/manual/en/language.control-structures.php

// PHP supports switch statements as well
print_example_count($example_count++, __LINE__);
$switch_input = 5;
switch ($switch_input){
    case 2:
      echo '$switch_input is 2!' . "\n";
      break;
    case 7:
      echo '$switch_input is 7!' . "\n";
      break;
    case 1:
      echo '$switch_input is 1!' . "\n";
      break;
    case "hello":
      echo '$switch_input is hello!' . "\n";
      break;
    case 5:
      echo '$switch_input is 5!' . "\n";
      break;
    default:
      echo '$switch_input did not match any cases!' . "\n";
}
// for more on switch statements:
// http://php.net/manual/en/control-structures.switch.php

// logical operators work like they do in Java
// "&&" and "and" work the same, but && has higher precedence
// "||" and "or" work the same, but || higher precedence
// for more on operator precedence, see:
// http://php.net/manual/en/language.operators.precedence.php
print_example_count($example_count++, __LINE__);
if ("one" === "one" && 2===2 and "0"==0) {
    echo "They're all equal!\n";
}
// for more on logical operators:
// http://php.net/manual/en/language.operators.logical.php
