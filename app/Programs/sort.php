<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Sort extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $nums = $nums['ints'];

            $ray = explode(',', $nums);
            $int = array();
            // turn all numbers into ints //
            foreach ($ray as $n) {
                $int[] = (int) $n;
            }
            sort($int);
            $this->answer = implode(', ', $int);
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'Take a series of integers and sort them out chronologically.';
    }

    protected function setFields() {
        $this->form_fields = array(
            'ints' => 'Put your numbers here, seperate with a comma'
        );
    }

}
