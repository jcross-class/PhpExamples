<?php
/**
 * php_examples_5 by Jason Cross for ICS-325 Spring 2016
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
 * - classes
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

// Pull in the file that has the ExampleClass defined in it.
// If the file can't be found, this program won't work so use require.
// The class only needs to be defined once, so use once to get require_once.
require_once 'php_examples_5_ExampleClass.php';

// Instantiate the ExampleClass
print_example_count($example_count++,__LINE__);
$my_example = new ExampleClass('Jason', 'Astronauts', 'John');

// Using echo on $my_example will cause the __toString() method to be called
// to typecast the $my_example instance as a string.
echo $my_example . "\n";

// Let's create another instance of ExampleClass without specifying
// the group name or your name.
print_example_count($example_count++,__LINE__);
$another_example = new ExampleClass('Jason');
echo $another_example . "\n";

// Let's create another instance of ExampleClass but pass in
// null for for my name.
print_example_count($example_count++,__LINE__);
$yet_another_example = new ExampleClass(null, 'Astronauts', 'John');
echo $yet_another_example . "\n";

// Let's set the my name for the instance we just created.
print_example_count($example_count++,__LINE__);
$yet_another_example->my_name = 'Jason';
echo $yet_another_example . "\n";

// Let's change my group to Mission Control.  Since it is protected,
// we must use a setter.
print_example_count($example_count++,__LINE__);
$yet_another_example->setGroupName('Mission Control');
echo $yet_another_example . "\n";

// Let's change your name to Jill.  We must use a setter to do that
// since it is private.
print_example_count($example_count++,__LINE__);
$yet_another_example->setYourName('Jill');
echo $yet_another_example . "\n";

// Since my name is public, we can read it as well.
print_example_count($example_count++,__LINE__);
echo '$yet_another_example->my_name equals ' . $yet_another_example->my_name . "\n";

// Since group name and your name are not public, we must use getters
// to read them.
print_example_count($example_count++,__LINE__);
echo '$yet_another_example->group_name equals ' . $yet_another_example->getGroupName() . "\n";
echo '$yet_another_example->your_name equals ' . $yet_another_example->getYourName() . "\n";