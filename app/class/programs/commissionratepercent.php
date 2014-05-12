<?php

class CommissionRatePercent_Math extends Base_Math {

    protected $view_name = 'Commision Rate Percent';

    public function calculate($nums) {
        $r = $nums['comm'] / $nums['sales'];

        $this->answer = $r * 100 . '%';
    }

    protected function set_example() {
        $this->example = 'A salesperson earns $104 from the sale of $2,600
                          worth of refrigerators. What is the rate of 
                          commission?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'comm' => 'commission amount $',
            'sales' => 'sales amount $'
        );
    }

}

?>