<?php

/**
 * This is a program framework that can be used to develop new programs for the calculator
 */

namespace MathApp\Programs;

use MathApp\Classes;

class NewProgramName extends Classes\BaseMath implements Classes\InterfaceMath {

    /**
     * This is the method used to calculate your answer.
     * @param array $nums The user input is cleaned, converted, and passed to the program 
     * through the ProgramRouter class. If for some reason you need to use raw input, you 
     * must add an exception in the exception property array in the ProgramRouter class.
     */
    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = 'Calculate your answer here.';
        } else {
            $this->isRequired();
        }
    }

    /**
     * This is where you set the example text that will be displayed in the main
     * program page.
     */
    protected function setExample() {
        $this->example = 'Example text goes here.';
    }

    /**
     * This is where you will set the fields for the form that is used in the main 
     * program page. 
     */
    protected function setFields() {
        $this->form_fields = array(
            'Put' => 'Your',
            'New' => 'Input',
            'Fields' => 'Here'
        );
    }

}
