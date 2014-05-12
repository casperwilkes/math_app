<?php

/**
 * This is more of a factory than a controller, but set so that it will work with 
 * lazy loader. This class controlls what child classes to initiate for called problem.
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
class Model_Controller {

    /**
     * This sets the class object to be used when working with a problem. 
     * @var object
     */
    private $model;

    /**
     * Loads the class that will be used for problems.
     * @param string $model_name Name of the model needed for problem.
     * @return boolean
     */
    public function load_model($model_name = '') {
        if (is_string($model_name) && strlen($model_name)) {
            // Set the class path //
            $class_path = PROGRAMS_DIR . DS . strtolower($model_name) . '.php';
            // Make sure file exists and include it.//
            if (is_file($class_path)) {
                require($class_path);
                $name = $model_name . '_Math';
                $this->model = new $name();

                return TRUE;
            } else {
                return FALSE;
            }
        }

        return FALSE;
    }

    /**
     * Returns name that will be used for header of template. 
     * @return string
     */
    public function get_viewable_name() {
        return $this->model->view_name();
    }

    /**
     * Returns the answer after calculation is complete. 
     * @return string
     */
    public function get_answer() {
        return $this->model->answer();
    }

    /**
     * Accepts the values to be calculated, casts them as doubles, and sends
     * them to the child class for calculation. 
     * @param string $nums The numbers to be calculated. 
     * @return string
     */
    public function get_calculation($nums = array()) {
        $num_array = array();
        foreach ($nums as $key => $value) {
            // Remove submit field //
            if ($key != 'submit') {
                // cast the values as double //
                $num_array[$key] = (double) str_replace(',', '', trim($value));
            }
        }

        return $this->model->calculate($num_array);
    }

    /**
     * Return the form fields from the child classes. Used for building the 
     * form for the templating system. 
     * @return array
     */
    public function get_fields() {
        return $this->model->fields();
    }

    /**
     * Gets the example for the child class for the templating system. 
     * @return string
     */
    public function get_example() {
        return $this->model->example();
    }

}

?>