<?php

class Subtraction_Math extends Base_Math {

    public function calculate($nums) {
        $this->answer = $nums['num1'] - $nums['num2'];
    }

    protected function set_example() {
        $this->example = 'If you have 2 apples, and I take away 1 apple, how 
            many apples do you have left?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'Starting Amount',
            'num2' => 'Amount to Take Away'
        );
    }

}

?>
