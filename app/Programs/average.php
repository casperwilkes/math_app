<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Average extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->getAverage($nums);
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'A teacher has the scores of 75, 100, 87, 93. 
                         What is the average of these scores?';
    }

    protected function setFields() {
        $this->form_fields = array('numbers' => 'Put your numbers here seperated by a comma.');
    }

    private function getAverage($nums) {
        $input = $nums['numbers'];
        // turn numbers into array //
        $ray = explode(',', $input);
        
        $int = array();

        // turn all numbers into ints //
        foreach ($ray as $n) {
            $int[] = (int) $n;
        }

        $count = count($int);
        $num = array_sum($int);
        $avg = $num / $count;

        $this->answer = $avg;
    }

}
