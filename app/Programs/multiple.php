<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Multiple extends Classes\BaseMath implements Classes\InterfaceMath {

    private $mult1;
    private $mult2;
    private $mult3;
    private $ray1;
    private $ray2;
    private $ray3;

    public function calculate($nums) {

        if ($this->meetsRequired($nums, 1)) {
            $this->mult1 = $nums['num1'];
            $this->mult2 = $nums['num2'];
            $this->mult3 = $nums['num3'];

            $this->ray1 = $this->multiple($this->mult1, 21);
            $this->ray2 = $this->multiple($this->mult2, 21);
            $this->ray3 = $this->multiple($this->mult3, 21);

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'List the first 20 multiples of 25, 55, and 75.';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'Number 1',
            'num2' => 'Number 2',
            'num3' => 'Number 3');
    }

    private function format_answer() {
        $format = " %d: %s <br />";
        $this->answer = '';

        if (!empty($this->ray1)) {
            $spread1 = implode(', ', $this->ray1);
            $this->answer .= sprintf($format, $this->mult1, $spread1);
        }

        if (!empty($this->ray2)) {
            $spread2 = implode(', ', $this->ray2);
            $this->answer .= sprintf($format, $this->mult2, $spread2);
        }

        if (!empty($this->ray3)) {
            $spread3 = implode(', ', $this->ray3);
            $this->answer .= sprintf($format, $this->mult3, $spread3);
        }
    }

}
