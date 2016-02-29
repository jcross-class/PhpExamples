<?php

// We want to read in a file that contains properties for a single pet on each
// line of text.  The properties are: owner name, pet name, pet type (cat or dog),
// and color.
// Example: petname=Snuggles,ownername=Smith,pettype=dog,color=red
//
// We then want to print out this information in alphabetical order by
// owner name first and pet name second.
//
// Next we want to print out the number of pets.
//
// Finally we want to print out the counts for each pet color and each type of pet
// in descending order.
//
// We'd also like to be able to add new colors and pet types in the future, so the
// program shouldn't hard code those values.


// First we'll open the text read_file_example_file.txt in read mode.
// fopen() returns a file resource (aka. a file handle).  We will store that
// resource to the variable $input_file.  From now on, we can reference
// the file we are reading using the $input_file variable.  Note that
// a file resource keeps track of internal state such as where we are
// in the current file.  We'll see how that works when we use the
// gets() function.
// http://php.net/manual/en/function.fopen.php
$input_file = fopen("read_file_example_file.txt", "r");

// If we can't open the file, then exit the program by calling die with an error message.
// Notice that we are using the === equality operator instead of ==.  === checks both
// value and type for equality. == only checks value for equality.
// Note that die and exit are the same thing.  When there is some problem usually
// die is used instead of exit.
// http://php.net/manual/en/function.die.php
// http://php.net/manual/en/function.exit.php
if ($input_file === FALSE) {
    die("Failed to open the input file!\n");
}

// Next we will lock the file.
// The locking prevents other processes from writing to the file while we read it.
// LOCK_SH is a shared lock.  Other processes can still read from the file while it is locked.
// If we can't lock the file, then exit the program by calling die with an error message.
// http://php.net/manual/en/function.flock.php
flock($input_file, LOCK_SH) || die("Failed to lock the file!\n");

// We will define an empty array to store the information we read from each
// of text.  Each element of the array will contain the information for
// 1 line of text.
$pets = array();

// We want to read the file line-by-line until we run out of lines to read.
// feof($input_file) will return true when no more lines are left in to read
// in from the file.  eof stands for end of file.
// http://php.net/manual/en/function.feof.php
while(!feof($input_file)) {
    // fgets() will read a line of text.  Within the $intput_file file resource
    // there is a pointer that points to the current place we are reading from
    // in the file.  When we call fgets(), PHP looks ahead to find the next new
    // line character (\n).  When it finds it, it returns a string starting at
    // where the internal file pointer is at until after the new line character
    // it just found.  It then moves the internal file pointer to after that
    // new line.  So when fgets() is called again, the next line of text will
    // be read.  So, the returned string will be a line of text with a new line
    // character at the end of it.  We don't want that new line character as it
    // will mess up our output, so we'll remove it using rtrim().  The returned
    // string will be stored in the $line variable.
    // http://php.net/manual/en/function.fgets.php
    // http://php.net/manual/en/function.rtrim.php
    $line = rtrim(fgets($input_file));

    // If the last line in a file has a newline character at the end of it,
    // PHP will try to read another line of text before it figures out that
    // it is at the end of the file.  That means the last time that fgets() is
    // called, it will return an empty string.  So, we need to check for that.
    if ($line !== "") {
        // The file we are reading contains key value/pairs with each pair separated
        // from the next by a comma.  First we want to split up each line of text
        // to extract the key/value pairs.  The explode() function will do that
        // for us.  We need to specify what character to split the string up by.
        // In this case, that character is a , character.  We also need to give it
        // the string to split up, which in this case is the $line string we just
        // read in from the text file.  Explode will return a numerically indexed
        // array containing all the strings created by splitting the $line string
        // at every comma.  We will call that array $key_value_pairs to make it
        // easy to remember what it is the explode function is returning to us.
        $key_value_pairs = explode(",", $line);

        // We will define an empty array to store the key/value pairs in as
        // we read them.
        $pet = array();
        // Now let's iterate over all the values and put them in an associative array.
        foreach ($key_value_pairs as $key_value) {
            // The key/value pairs are both in a string separated by an = character.
            // We can use explode() to split them apart. So, this time we will use the
            // = character and $key_value as parameters to the explode() function.
            // We know that each string we pass in is a key/value pair, so the array
            // returned by explode() will have 2 elements in it. We can extract those 2
            // elements and store them into variables by using the list() language
            // construct.  In this case, we will use list($key, $value). So, the first
            // element in the array returned by explode() will be stored in the $key variable.
            // The second element will be stored in the $value variable.
            // http://php.net/manual/en/function.list.php
            list($key, $value) = explode("=", $key_value);

            // Now $key will store the property name and $value will store the property value.
            // So, we'll store this information in the $pet array using $key as the key
            // and $value as the value.
            // For example, say the key/value pair was: color=brown
            // We would store them as: $pet['color'] = 'brown';
            $pet[$key] = $value;
        }

        // Now that we are done reading in the line of text and storing every property name and
        // value to $pet, we can store $pet in the $pets array.  We want to be able to sort
        // the array by the owner's name first and the pet's name second, so we can do that by
        // appending those 2 strings together and using them as the key for the $pets array.
        // So for example, if the owner is Smith and the pet is Snuggles,
        // it would be stored to $pets as: $pets['Smith' . 'Snuggles'] = $pet
        $pets[$pet['ownername'] . $pet['petname']] = $pet;
    }
}

// Now that we're done with the file, we can release our lock on it.
// LUCK_UN specifies to release the lock.
// http://php.net/manual/en/function.flock.php
flock($input_file, LOCK_UN);

// Let's close the file and release any resources related to the file.
// http://php.net/manual/en/function.fclose.php
fclose($input_file);

// We now have all the information from each line of text stored in the $pets array.
// However, the array is not sorted by the owner name first and the pet name second.
// Since we made the key to the array be the concatenation of the strings owner name
// and pet name, we can sort the array by its keys.  Then we can simply
// iterate through the array in order and print out each element of the array.
// The ksort() function sorts an array by its keys and maintains the mapping
// between keys and values.
// http://php.net/manual/en/function.ksort.php
ksort($pets);

// Now we will use foreach to iterate through the sorted $pets array.
// http://php.net/manual/en/control-structures.foreach.php
foreach($pets as $pet) {
    // Each element in the $pets array is an associative array containing the properties of
    // each pet.  We know what the names of the properties are, so we can using echo
    // to output the information about the pet to the terminal.
    echo $pet['ownername'] . " owns a " . $pet['color'] . " " . $pet['pettype'] . " named " . $pet['petname'] . ".\n";
}

// Now we need to count up how many of each color pet we have and how
// many of each type of pet we have.  Let's create two empty arrays
// to hold those counts.
$colors = array();
$pet_types = array();
// Now we'll iterate through the $pets array and count up all the property values.
foreach($pets as $pet) {
    // $pet is an associative array with each key being a property name and each
    // value being the value for that property.
    foreach($pet as $property => $property_value) {
        // We only care about counting two of the properties: pet type and color.
        // We'll start with color
        if ($property === 'color') {
            // We will store the count of each color in the $colors array
            // using the color name as the key and the count for the value.
            // We want to add 1 to the count if there already is a count.
            // If there isn't a count yet, we need to create one and set it to 1.
            // We can use array_key_exists() to check if there is a count for a
            // specific color already.
            // http://php.net/manual/en/function.array-key-exists.php
            if (array_key_exists($property_value, $colors)) {
                // Add 1 to the count
                $colors[$property_value]++;
            } else {
                // Set the count to 1
                $colors[$property_value] = 1;
            }  // We'll do the same for pet type now.
        } elseif ($property === 'pettype') {
            if (array_key_exists($property_value, $pet_types)) {
                $pet_types[$property_value]++;
            } else {
                $pet_types[$property_value] = 1;
            }
        }
    }
}

// We'd like to know the total number of pets.  The total number of elements in the $pets array
// is equal to the total number of pets.  We can find that number using the count() function.
// http://php.net/manual/en/function.count.php
$number_of_pets = count($pets);

echo "\nThe total number of pets is: " . $number_of_pets . "\n";

// We'd like to sort the $colors array by array value this time.  We want the colors
// with the highest value to be at the beginning of the array.  We can use the
// arsort() function to sort the array in reverse order by its values while maintaining the
// mapping between the key and value for each element in the array.
// http://php.net/manual/en/function.arsort.php
arsort($colors);
// Now we can simply iterate through the colors array and echo out the counts for each color.
// Since we used arsort(), the order of the elements in the array is exactly how we want it.
echo "\nColors:\n";
foreach ($colors as $color => $color_count) {
    echo "    " . $color_count . ": " . $color . "\n";
}

// We'll do the same for pet type.
arsort($pet_types);
echo "\nPet types:\n";
foreach ($pet_types as $pet_type => $pet_type_count) {
    echo "    " . $pet_type_count . ": " . $pet_type . "\n";
}
