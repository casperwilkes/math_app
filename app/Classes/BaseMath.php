<?php

namespace MathApp\Classes;

/**
 * This is the base class in which all other math programs are extended from.
 * All common methods that will be shared among the classes should go here.
 * All protected abstract methods should go in here as well.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
abstract class BaseMath {

    /**
     * The answer created after calculating has processed. 
     * @var string
     */
    protected $answer;

    /**
     * Sets the exmample which will be shown on the template view.
     * @var string
     */
    protected $example;

    /**
     * Sets the form fields in the template view. This is an associative array. 
     * The key is the name of the input field, and the value is the label. 
     * @var array
     */
    protected $form_fields = array();

    /**
     * This sets the public title and page label. It is created dynamically unless
     * this variable is set within the children classes. 
     * @var string
     */
    protected $view_name = null;

    /**
     * This sets the number of required input fields.
     * @var int
     */
    private $required = 0;

    //////////////////////////
    // ** Public methods ** //
    //////////////////////////

    /**
     * Set the example, form fields, and view name.
     */
    public function __construct() {
        $this->setExample();
        $this->setFields();
    }

    /**
     * Gets the example for the viewing template.
     * @return string
     */
    public function getExample() {
        return $this->example;
    }

    /**
     * Gets the form fields for the form if any.
     * @return array
     */
    public function getFields() {
        return $this->form_fields;
    }

    /**
     * Returns the answer to the template.
     * @return string
     */
    public function getAnswer() {
        return $this->answer;
    }

    /**
     * Gets the name viewing name for the template. 
     * @return string
     */
    public function getViewableName() {
        return $this->view_name;
    }

    /////////////////////////////
    // ** Protected methods ** //
    /////////////////////////////

    /**
     * Turns percent into decimals.
     * @param int $percent Number to turn into a percent. 
     * @return int $percent turned into a percent.
     */
    protected function percentToDecimal($percent) {
        $dec = $percent / 100;
        return $dec;
    }

    /**
     * Checks to see if any fields are empty in an array.
     * @param array $fields Array of elements to check.
     * @return int The amount of empty fields in the array.
     */
    protected function checkEmpty($fields) {
        $empty = 0;
        // If the field is empty increment the $empty variable. 
        foreach ($fields as $field) {
            if (empty($field)) {
                $empty = ++$empty;
            }
        }

        return $empty;
    }

    /**
     * Outputs the multiples of a number up to an indicated length. 
     * @param int $y The number you want to turn into a multiple.
     * @param int $length The amount of numbers to turn into multiples. 
     * @return array An array of numbers that are multiples of $y.
     */
    protected function multiple($y, $length = 0) {
        $rays = array();
        if ($y) {
            $x = $length;
            for ($i = 1; $i < $x; $i++) {
                $rays[] = $i * $y;
            }
        }

        return $rays;
    }

    /**
     * Returns the interest rate.
     * @param int $principal The principal amount
     * @param int $rate The rate of the term
     * @param int $time The length of the term
     * @return int The interest rate
     */
    protected function interest($principal, $rate, $time) {
        $n = $principal * $rate;
        $interest = $n * $time;

        return $interest;
    }

    /**
     * Gives the tax amount. 
     * @param int $c The cost of the item.
     * @param int $r The tax rate
     * @return int The tax on the cost of the item.
     */
    protected function tax($c, $r) {
        $decimal = $this->percent($r);
        $cost = $c * $decimal;

        return $cost;
    }

    /**
     * Turns a number into a percent.
     * @param int $p The number to turn into a percent.
     * @return int $p as a percent.
     */
    protected function percent($p) {
        $size = strlen($p);

        if ($size < 2) {
            $size = 2;
        }

        $percent = $p / 100;
        $output = round($percent, $size);

        return $output;
    }

    /**
     * Returns the factors of a number.
     * @param int $x The number to factor.
     * @return array An array of factors of $x.
     */
    protected function factor($x) {
        // Init empty array //
        $ints = array();
        // Cast $x as int //
        $ex = (int) $x;
        for ($i = 1; $i <= $ex; $i++) {
            // Divide x by i for n //
            $n = $ex / $i;

            // Checks and remove floats //
            if (!is_float($n)) {
                $ints[] = $n;
            }
        }

        return $ints;
    }

    /**
     * Checks to make sure that user supplied at least the minimum required input.
     * @param array $input The user supplied input
     * @param int $required number of inputs required. If left null, it will consider the amount of form fields.
     * @return boolean
     */
    protected function meetsRequired($input, $required = null) {
        $check = [];
        $in_length = count($input);
        // Set required property to either user specified or form_fields count //
        $this->required = (is_null($required)) ? count($this->form_fields) : $required;
        // Get input values because input will always be an associative array // 
        $in_values = array_values($input);
        // Loop over inputs //
        for ($i = 0; $i < $in_length; $i++) {
            // Check that input has a value, and that value isn't 0 //
            if (strlen($in_values[$i]) and $in_values[$i] != 0) {
                // Add random character just so we can count it //
                $check[] = 'd';
            }
        }
        // check that $check is equal to or larger than inputs required //
        // If inputs required isn't set, check all form fields filled //
        return (count($check) >= $this->required);
    }

    /**
     * Sets the answer to an error message indicating to the user how many fields need filled out.
     * The required amount is set within the meetsRequired function.
     */
    protected function isRequired() {
        // If requried more than 1, use plural //
        $num = ($this->required > 1) ? 'numbers' : 'number';
        $this->answer = sprintf('You must enter at least ' . $this->required . ' %s to calculate the answer.', $num);
    }

    ////////////////////////////
    // ** Abstract Methods ** //
    ////////////////////////////

    /**
     * Sets the form fields if form exists. 
     */
    abstract protected function setFields();

    /**
     * Sets the example in the public view.
     */
    abstract protected function setExample();
}
