<?php

class PercentOf_Math extends Base_Math {

    protected $view_name = 'Percent Of';

    public function calculate($nums) {
        $total = $this->percent($nums['percent']) * $nums['amount'];
        $this->answer = "Total = " . $total;
    }

    protected function set_example() {
        $this->example = 'A local little league has a total of 95 players, 
                          of whome 20% are left-handed. How many left handed 
                          players are there?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'amount' => 'Amount',
            'percent' => 'Percent %'
        );
    }

}

?>
