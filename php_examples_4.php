<?php
/**
 * php_examples_4 by Jason Cross for ICS-325 Spring 2016
 * Version 1
 * 1/29/2016
 *
 * This program is a collection of examples to illustrate how PHP works.
 * It is written with the assumption that the reader knows the basics of Java.
 *
 * The program is broken into numbered examples that are automatically numbered.
 * The line number where the example code starts is printed next to the example number.
 * The example line number can be used to match up the code and the program output.
 *
 * The following examples cover the basics of:
 * - file input/output
 * - file locking
 * - list() language construct
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

// Let's do some set up to work with files.
// First we'll make some strings from arrays.
$numbers_one = array("one=1", "two=2", "three=3");
$numbers_two = array("four=4", "five=5", "six=6");
$numbers_one_string=implode(",", $numbers_one);
$numbers_two_string=implode(",", $numbers_two);

// Now let's write those strings to a file.
// Let's open a new file in write mode.
$output_file = fopen("php_examples_4_outfile.txt", "w");
// Now write the strings to the file.
// Notice that just like echo, we need to explicitly output a newline character.
// Many text editors put a new line at the end of each line, even at the end
// of the file.  So, we'll do that as well.
fputs($output_file, $numbers_one_string . "\n");
fputs($output_file, $numbers_two_string . "\n");
// now close the file
fclose($output_file);

// Let's read in the file, but this time we'll lock the file as well.
// First we'll open the file in read mode.
$input_file = fopen("php_examples_4_outfile.txt", "r");
// Next we will lock the file.
// The locking prevents other processes from writing to the file while we read it.
// LOCK_SH is a shared lock.  Other processes can read from the file.
flock($input_file, LOCK_SH) || die('Failed to lock the file!');
// Notice that if we fail to lock the file, the die function will be called
// which will cause the program to exit.


// We want to read the file until we run out of newlines to read.
// feof() will return true when no more lines are left in the file.
$numbers = array();
while(!feof($input_file)) {
    // fgets() will read a line of text.
    // The line of text will have some sort of new line or carriage return
    // at the end.  We don't want that, so we'll remove it using rtrim.
    $line = rtrim(fgets($input_file));

    // If the last line in a file has a newline character at the end of it,
    // PHP will try to read another line of text before it figures out that
    // it is at the end of the file.  That means the last time that fgets() is
    // called, it will return an empty string.  So, we need to check for that.
    if ($line !== "") {
        // Let's split up that line of text into an array.
        $key_value_pairs = explode(",", $line);
        // Now let's iterate over all the values and put them in an associative array.
        foreach ($key_value_pairs as $key_value) {
            // We will use list to assign the two items in the array from explode to
            // two variables.
            list($key, $value) = explode("=", $key_value);
            // Now put them in an associative array.
            $numbers[$key] = $value;
        }
    }
}

// Now that we're done with the file, we can release our lock on it.
// LUCK_UN specifies to release the lock.
flock($input_file, LOCK_UN);

// Let's close the file.
fclose($input_file);

// Let's take a look at the array we created.
var_dump($numbers);

// For more information check out:
// locking: http://php.net/manual/en/function.flock.php
// opening files: http://php.net/manual/en/function.fopen.php
// closing files: http://php.net/manual/en/function.fclose.php
// detecting the end of a file: http://php.net/manual/en/function.feof.php
// using list(): http://php.net/manual/en/function.list.php
// trimming whitespace off the end of a string:
//   http://php.net/manual/en/function.rtrim.php

