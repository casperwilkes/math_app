<?php

namespace MathApp\Programs;

use MathApp\Classes;

class PercentOf extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Percent Of';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $total = $this->percent($nums['percent']) * $nums['amount'];
            $this->answer = "Total = " . $total;
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'A local little league has a total of 95 players, 
                          of whome 20% are left-handed. How many left handed 
                          players are there?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'amount' => 'Amount',
            'percent' => 'Percent %'
        );
    }

}
