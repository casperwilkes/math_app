<?php

namespace MathApp\Classes;

/**
 * This class is a factory that assembles and displays all programs. All functionality
 * from the classes are routed through here. 
 * 
 * @author Casper Wilkes <casper@casperwilkes.net>
 */
class ProgramRouter {

    /**
     * This sets the class object to be used when working with a problem. 
     * @var object
     */
    private $program;

    /**
     * Sets the name of the program to be used with viewableName and exceptions.
     * @var string
     */
    private $program_name;

    /**
     * These are classes that are to be used as exceptions.
     * Exceptions are classes that will handle thier own input.
     * @var array
     */
    private $exceptions = ['average', 'sort'];

    public function __construct($program_name = null) {
        $this->startProgram($program_name);
    }

    /**
     * Loads the class that will be used for problems.
     * @param string $program_name Name of the program to run
     * @return boolean
     */
    public function startProgram($program_name = null) {
        if (is_string($program_name) && strlen($program_name)) {
            // Set the class path //
            $program_path = PROGRAMS_DIR . DS . strtolower($program_name) . '.php';
            // Make sure file exists and include it.//
            if (is_file($program_path)) {
                $pro = 'MathApp\Programs\\' . $program_name;
                $this->program = new $pro();
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
    public function getViewableName() {
        $class = get_class($this->program);
        $this->program_name = substr($class, (strrpos($class, '\\') + 1));
        $viewable_name = $this->program->getViewableName();
        return (is_null($viewable_name)) ? $this->program_name : $viewable_name;
    }

    /**
     * Set the publicly viewable name for the templates
     */
    protected function setViewableName() {
        
    }

    /**
     * Returns the answer after calculation is complete. 
     * @return string
     */
    public function getAnswer() {
        return $this->program->getAnswer();
    }

    /**
     * Accepts the values to be calculated, casts them as doubles, and sends
     * them to the child class for calculation. 
     * @param string $nums The numbers to be calculated. 
     * @return string
     */
    public function getCalculation($nums = array()) {
        // Check if the current class is in the exception list in the $exceptions property //
        $exception = $this->checkException();
        $num_array = array();
        foreach ($nums as $key => $value) {
            // Remove submit field //
            if ($key != 'submit') {
                if ($exception) {
                    // Class will take care of input //
                    $num_array[$key] = $value;
                } else {
                    // cast the values as double //
                    $num_array[$key] = (double) str_replace(',', '', trim($value));
                }
            }
        }

        return $this->program->calculate($num_array);
    }

    /**
     * Return the form fields from the child classes. Used for building the 
     * form for the templating system. 
     * @return array
     */
    public function getFields() {
        return $this->program->getFields();
    }

    /**
     * Gets the example for the child class for the templating system. 
     * @return string
     */
    public function getExample() {
        return $this->program->getExample();
    }

    /**
     * Checks to see if the current class is listed in the exceptions property.
     * @return boolean
     */
    private function checkException() {
        return in_array(strtolower($this->program_name), $this->exceptions);
    }

}
