<?php

class Addition_Math extends Base_Math {

    public function calculate($nums) {
        $this->answer = $nums['num1'] + $nums['num2'];
    }

    protected function set_example() {
        $this->example = 'If you have 2 apples, and you are given 2 apples, how many 
            apples do you have?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'First Number',
            'num2' => 'Second Number'
        );
    }

}

?>
