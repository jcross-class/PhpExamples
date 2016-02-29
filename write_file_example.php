<?php

// First create an empty array.
$numerically_indexed_array = array();

// Next fill it with data by appending a new element onto the end of the array.
// The array will be numerically indexed.  Each time a new element is added to the array,
// PHP increments its internal counter for the next available array index.
// This will be index 0
$numerically_indexed_array[] = "First line of text.";
// This will be index 1
$numerically_indexed_array[] = "Second line of text.";
// This will be index 2
$numerically_indexed_array[] = "Third line of text.";
// This will be index 3
$numerically_indexed_array[] = "Fourth line of text.";
// This will be index 4
$numerically_indexed_array[] = "Fifth line of text.";

// We can create the exact same array all in one assignment operation by supplying the elements for the array
// to the array creation function.
$equivalent_numerically_indexed_array = array ("First line of text.", "Second line of text.", "Third line of text.",
                                               "Fourth line of text.", "Fifth line of text.");

// Let's check to see if the two arrays are equal both in contents in type. (they are)
echo 'Are $numerically_indexed_array and $equivalent_numerically_indexed_array equal? ';
if ($numerically_indexed_array === $equivalent_numerically_indexed_array) {
    echo "Yes!";
} else {
    echo "No!";
}

echo "\n\n";

// We can use a regular for loop to iterate through a numerically indexed array.
// Notice that we can get the number of items in an array using the count() function.
for($i=0; $i < count($numerically_indexed_array); $i++) {
    echo "Element at index " . $i . " is: " . $numerically_indexed_array[$i] . "\n";
}

echo "\n\n";

// We can also iterate through the array using a foreach loop.  In this case,
// the $key variable will be the numeric index value.
foreach($numerically_indexed_array as $key => $value) {
    echo "Element at index " . $key . " is: " . $value . "\n";
}

// Open a file for writing.  The w mode will overwrite any existing file.
$output_file = fopen("write_file_example_file.txt", "w");

// Make sure we opened the file successfully.  If not, call die with an error message.
if ($output_file === FALSE) {
    die("Could not open output file!\n");
}

// Locking files for writing is similar to locking files for reading.  However, instead of LOCK_SH
// which allows other processes to read the file, we will use LOCK_EX which prevents any other processes
// from reading or writing to the file.
flock($output_file, LOCK_EX) || die("Could not lock output file!\n");

// We can iterate through the numerically indexed array using a foreach loop without a key.
// This works similarly to the for loop above.
foreach($numerically_indexed_array as $value) {
    // Output each element in the array onto its own line in the output file.
    // fputs() is the same function as fwrite().  Notice the "\n" appended onto the
    // end of the array element value.  That is to make sure the next element will be on the
    // next line in the file.
    fputs($output_file, $value . "\n");
}

// Unlock the file.
flock($output_file, LOCK_UN);

// Close the file to free up any resources associated with it.
fclose($output_file);