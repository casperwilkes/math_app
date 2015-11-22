<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Multiplication extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['num1'] * $nums['num2'];
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'If there are 10 apples trees, and each apple tree bears 
            15 apples, how many apples are there?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Amount to Multiply'
        );
    }

}
