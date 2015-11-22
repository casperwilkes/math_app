<?php

namespace MathApp\Programs;

use MathApp\Classes;

class CommissionRatePercent extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Commision Rate Percent';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $r = $nums['comm'] / $nums['sales'];

            $this->answer = $r * 100 . '%';
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'A salesperson earns $104 from the sale of $2,600
                          worth of refrigerators. What is the rate of 
                          commission?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'comm' => 'commission amount $',
            'sales' => 'sales amount $'
        );
    }

}
