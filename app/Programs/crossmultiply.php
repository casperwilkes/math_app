<?php

namespace MathApp\Programs;

use MathApp\Classes;

class CrossMultiply extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Cross multiply';
    private $numerator;
    private $denominator;

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->numerator = $nums['num2'] * $nums['num3'];
            $this->denominator = $nums['num1'] * $nums['num4'];

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = '<sup>num1</sup>/<sub>num2</sub> X 
            <sup>num3</sup>/<sub>num4</sub>';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'Number 1',
            'num2' => 'Number 2',
            'num3' => 'number 3',
            'num4' => 'number 4'
        );
    }

    public function format_answer() {
        $this->answer = '<sup>' . $this->numerator . '</sup>/';
        $this->answer .= '<sub>' . $this->denominator . '</sub>';

        if ($this->numerator == $this->denominator) {
            $this->answer .= ' = 1';
        } else {
            if ($this->denominator == '1') {
                $this->answer .= ' = ' . $this->numerator;
            }
        }
    }

}
