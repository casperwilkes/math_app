<?php

class Average_Math extends Base_Math {

    public function calculate($nums) {
        $nums = $nums['numbers'];
        // turn numbers into array //
        $ray = explode(',', $nums);
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

    protected function set_example() {
        $this->example = 'A teacher has the scores of 75, 100, 87, 93. 
                         What is the average of these scores?';
    }

    protected function set_fields() {
        $this->form_fields = array('numbers' => 'Put your numbers here seperated by a comma.');
    }

}

?>