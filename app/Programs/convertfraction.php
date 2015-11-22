<?php

namespace MathApp\Programs;

use MathApp\Classes;

class ConvertFraction extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Convert Fraction';
    private $decimal;
    private $percent;

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->decimal = $nums['num1'] / $nums['num2'];
            $this->percent = $this->decimal * 100;

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'With a fraction of <sup>5</sup>/<sub>100</sub> find the decimal value,
                          and the percent value?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'numerator',
            'num2' => 'denominator'
        );
    }

    private function format_answer() {
        $this->answer = 'Decimal: ' . $this->decimal . '<br />';
        $this->answer .= 'Percent: ' . $this->percent . '%';
    }

}
