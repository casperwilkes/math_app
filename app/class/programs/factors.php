<?php

class Factors_Math extends Base_Math {

    public function calculate($nums) {
        $num = $this->factor($nums['numbers']);
        sort($num);

        $this->answer = implode(', ', $num);
    }

    protected function set_example() {
        $this->example = 'The factors of 200 are: 1, 2, 4, 5, 8, 
            10, 20, 25, 40, 50, 100, 200';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'numbers' => 'Put your number here'
        );
    }

}

?>
