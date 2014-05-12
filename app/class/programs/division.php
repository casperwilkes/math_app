<?php

class Division_Math extends Base_Math {

    protected function set_example() {
        $this->example = 'If you have 10 apples, and you divide them among 5 people,
            how many apples does each person have?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'Starting amount',
            'num2' => 'Amount to Divide by'
        );
    }

    public function calculate($nums) {
        $this->answer = $nums['num1'] / $nums['num2'];
    }

}

?>
