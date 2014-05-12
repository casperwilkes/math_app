<?php

class Multiplication_Math extends Base_Math {

    public function calculate($nums) {
        $this->answer = $nums['num1'] * $nums['num2'];
    }

    protected function set_example() {
        $this->example = 'If there are 10 apples trees, and each apple tree bears 
            15 apples, how many apples are there?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Amount to Multiply'
        );
    }

}

?>
