<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Addition extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['num1'] + $nums['num2'];
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'If you have 2 apples, and you are given 2 apples, how many 
            apples do you have?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Second Number'
        );
    }

}
