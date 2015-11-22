<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Division extends Classes\BaseMath implements Classes\InterfaceMath {

    protected function setExample() {
        $this->example = 'If you have 10 apples, and you divide them among 5 people,
            how many apples does each person have?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'Starting amount',
            'num2' => 'Amount to Divide by'
        );
    }

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['num1'] / $nums['num2'];
        } else {
            $this->isRequired();
        }
    }

}
