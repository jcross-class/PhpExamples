<?php

/**
 * A simple example PHP class.
 *
 * For more info on classes and objects: http://php.net/manual/en/language.oop5.php
 */
class ExampleClass
{

    // This class property can be access outside of the class.
    public $my_name;

    // This class property can only be accessed this class and
    // classes that inherit from this class.
    protected $group_name;

    // This class property can only be accessed by this class.
    private $your_name;

    /**
     * We need a constructor method.  Notice that the function keyword is still used, even in classes.
     * Notice that if no arguments are given to the constructor, the default value of null will be used
     * for all the necessary class properties.
     *
     * Class methods (functions) can be public, protected, and private as well.
     * If one of those three is not specified, the method is public by default.
     *
     * More info on property/method visibility: http://php.net/manual/en/language.oop5.visibility.php
     * More info on constructors: http://php.net/manual/en/language.oop5.decon.php
     */
    function __construct($my_name=null, $group_name=null, $your_name=null) {
        // Only store the passed in value for $my_name if it isn't null.
        if (!is_null($my_name)) {
            // Like in Java, use the this to refer to the current instance of this class.
            // Notice that instead of a ".", you use "->" to refer to object properties.
            //
            // So $my_name is the value passed in to the constructor and it is local to this function.
            // $this->my_name is the class property $my_name for this instance of the class.
            // So, set the passed in value of $my_name to the class property $this->my_name.
            $this->my_name = $my_name;
        }
        // do the same for $this->group_name and $this->your_name
        if (!is_null($group_name)) {
            $this->group_name = $group_name;
        }
        if (!is_null($your_name)) {
            $this->your_name = $your_name;
        }
    }

    /**
     * A magic method used to typcast the object to a string.
     * For more info on this and other magic methods:
    */
    function __toString() {
        // Define a string to hold the output for this function.
        $out_string = 'My name is ';

        // If the property is null, use unknown instead.
        if (is_null($this->my_name)) {
            $out_string .= 'unknown';
        } else {
            $out_string .= $this->my_name;
        }

        $out_string .= '. The group name is ';
        if (is_null($this->group_name)) {
            $out_string .= 'unknown';
        } else {
            $out_string .= $this->group_name;
        }

        $out_string .= '. Your name is ';

        if (is_null($this->your_name)) {
            $out_string .= 'unknown.';
        } else {
            $out_string .= $this->your_name . '.';
        }

        // The string is built, so return it.
        return $out_string;

    }
    // Since $this->group_name and $this->your_name are not public, they need getter/setter methods.

    /**
     * A getter for $this->group_name.
     */
    public function getGroupName()
    {
        return $this->group_name;
    }

    /**
     * A setter for $this->group_name.
     */
    public function setGroupName($group_name)
    {
        $this->group_name = $group_name;
    }

    /**
     * A getter for $this->your_name.
     */
    public function getYourName()
    {
        return $this->your_name;
    }

    /**
     * A setter for $this->your_name.
     */
    public function setYourName($your_name)
    {
        $this->your_name = $your_name;
    }

}