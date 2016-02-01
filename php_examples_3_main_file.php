<?php
/**
 * php_examples_3 by Jason Cross for ICS-325 Spring 2016
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
 * - file includes
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

/**
 * PHP allows programs to be broken up into multiple files by using the following
 * 4 statements to inline files into the current file:
 *   include
 *   include_once
 *   require
 *   require_once
 *
 * include/include_once and require/require_once work the same,
 * except that include will issue a non-fatal warning if a file can't be found.
 * require will cause the program to exit if a file isn't found.
 */

// php_examples_3_include_file.php is a simple PHP program that prints
// Hello world!
print_example_count($example_count++,__LINE__);
include 'php_examples_3_include_file.php';

// let's call it a few more times
print_example_count($example_count++,__LINE__);
include 'php_examples_3_include_file.php';
include 'php_examples_3_include_file.php';
include 'php_examples_3_include_file.php';

// we can even use include in a loop
print_example_count($example_count++,__LINE__);
for($count=0; $count < 4; $count++) {
    include 'php_examples_3_include_file.php';
}

// require works the same way
print_example_count($example_count++,__LINE__);
require 'php_examples_3_include_file.php';
require 'php_examples_3_include_file.php';
require 'php_examples_3_include_file.php';

// loops work too
print_example_count($example_count++,__LINE__);
for($count=0; $count < 4; $count++) {
    require 'php_examples_3_include_file.php';
}

// what happens if we try include_once?
print_example_count($example_count++,__LINE__);
include_once 'php_examples_3_include_file.php';
// Notice that nothing is printed.  That means that
// PHP did not include the php_examples_3_include_file.php file
// this time.  That's because it has already been included at
// least once.

// what about require_once?
print_example_count($example_count++,__LINE__);
require_once 'php_examples_3_include_file.php';
// it works the same way
//
// Most of the time you will want to use require_once.
// for more information: http://php.net/manual/en/function.include.php
