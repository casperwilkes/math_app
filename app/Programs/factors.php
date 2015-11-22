<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Factors extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {

            $num = $this->factor($nums['numbers']);
            sort($num);

            $this->answer = implode(', ', $num);
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'The factors of 200 are: 1, 2, 4, 5, 8, 
            10, 20, 25, 40, 50, 100, 200';
    }

    protected function setFields() {
        $this->form_fields = array(
            'numbers' => 'Put your number here'
        );
    }

}
