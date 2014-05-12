<?php

class Sort_Math extends Base_Math {

    public function calculate($nums) {
        $nums = $nums['ints'];

        $ray = explode(',', $nums);
        $int = array();
        // turn all numbers into ints //
        foreach ($ray as $n) {
            $int[] = (int) $n;
        }
        sort($int);
        $this->answer = implode(', ', $int);

        return $this->answer;
    }

    protected function set_example() {
        $this->example = 'Take a series of integers and sort them out chronologically.';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'ints' => 'Put your numbers here, seperate with a comma'
        );
    }

}

?>
