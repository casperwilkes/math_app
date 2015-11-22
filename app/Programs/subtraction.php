<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Subtraction extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['num1'] - $nums['num2'];
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'If you have 2 apples, and I take away 1 apple, how 
            many apples do you have left?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'Starting Amount',
            'num2' => 'Amount to Take Away'
        );
    }

}
