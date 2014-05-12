<?php

/**
 * This is the base class in which all other math programs are based from.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
abstract class Base_Math {

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
    protected $view_name;

    /**
     * Public methods.
     */

    /**
     * Set the example, form fields, and view name.
     */
    public function __construct() {
        $this->set_example();
        $this->set_fields();
        $this->set_view_name();
    }

    /**
     * Gets the example for the viewing template.
     * @return string
     */
    public function example() {
        return $this->example;
    }

    /**
     * Gets the form fields for the form if any.
     * @return array
     */
    public function fields() {
        return $this->form_fields;
    }

    /**
     * Returns the answer to the template.
     * @return string
     */
    public function answer() {
        return $this->answer;
    }

    /**
     * Gets the name viewing name for the template. 
     * @return string
     */
    public function view_name() {
        return $this->view_name;
    }

    /**
     * Protected methods.
     * These methods are for used for multiple children classes.
     */

    /**
     * Turns percent into decimals.
     * @param int $percent Number to turn into a percent. 
     * @return int $percent turned into a percent.
     */
    protected function percent_to_decimal($percent) {
        $dec = $percent / 100;
        return $dec;
    }

    /**
     * Checks to see if any fields are empty in an array.
     * @param array $fields Array of elements to check.
     * @return int The amount of empty fields in the array.
     */
    protected function check_empty($fields) {
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
        $x = (int) $x;
        for ($i = 1; $i <= $x; $i++) {
            // Divide x by i for n //
            $n = $x / $i;

            // Checks and remove floats //
            if (!is_float($n)) {
                $ints[] = $n;
            }
        }

        return $ints;
    }

    /**
     * Private methods.
     */

    /**
     * Sets the $view_name variable if not set for the view template. 
     */
    private function set_view_name() {
        if (!strlen($this->view_name)) {
            $this->view_name = stristr(get_class($this), '_', TRUE);
        }
    }

    /**
     * Abstract methods.
     */

    /**
     * Calculates the input and sets the answer.
     * @param int $nums The input from the user.
     */
    abstract public function calculate($nums);

    /**
     * Sets the form fields if form exists. 
     */
    abstract protected function set_fields();

    /**
     * Sets the example in the public view.
     */
    abstract protected function set_example();
}

?>