<?php

namespace MathApp\Programs;

use MathApp\Classes;

class LeastCommonMultiple extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Least Common Multiple';
    private $ray1;
    private $ray2;
    private $ray3;
    private $mult1;
    private $mult2;
    private $mult3;

    public function calculate($nums) {
        if ($this->meetsRequired($nums, 2)) {
            $this->mult1 = $nums['num1'];
            $this->mult2 = $nums['num2'];
            $this->mult3 = $nums['num3'];

            $this->ray1 = $this->multiple($this->mult1, 150);
            $this->ray2 = $this->multiple($this->mult2, 150);
            $this->ray3 = $this->multiple($this->mult3, 150);

            if ($this->checkEmpty($nums) >= 2) {
                $this->answer = 'Sorry, you must enter at least 2 digits.';
            } else {
                $this->format_answer();
            }
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'Find the least common multiple of 55 and 25.';
    }

    protected function setFields() {
        $this->form_fields = array(
            'num1' => 'Number 1',
            'num2' => 'Number 2',
            'num3' => 'Number 3');
    }

    private function format_answer() {
        if (!empty($this->ray3)) {
            $result = array_intersect($this->ray1, $this->ray2, $this->ray3);
            $first = array_shift($result);

            $div1 = $first / $this->mult1;
            $div2 = $first / $this->mult2;
            $div3 = $first / $this->mult3;

            $format = " %d / %d = %d <br />";

            $this->answer = $first . '<br />';
            $this->answer .= '<br />';
            $this->answer .= 'Results:<br />';
            $this->answer .= sprintf($format, $first, $this->mult1, $div1);
            $this->answer .= sprintf($format, $first, $this->mult2, $div2);
            $this->answer .= sprintf($format, $first, $this->mult3, $div3);
        } else {
            $result = array_intersect($this->ray1, $this->ray2);
            $first = array_shift($result);

            $div1 = $first / $this->mult1;
            $div2 = $first / $this->mult2;

            $format = " %d / %d = %d <br />";

            $this->answer = $first . '<br />';
            $this->answer .= '<br />';
            $this->answer .= 'Results:<br />';
            $this->answer .= sprintf($format, $first, $this->mult1, $div1);
            $this->answer .= sprintf($format, $first, $this->mult2, $div2);
        }
    }

}
