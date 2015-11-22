<?php

namespace MathApp\Programs;

use MathApp\Classes;

class CommissionRateAmount extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Commission Rate Amount';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $per = $this->percent($nums['perc']);
            $r = $per * $nums['comm'];
            $this->answer = '$' . round($r, 2);
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'A salesperson\'s rate of commission is 5%. What is
                          the commission from the sale of $40,000 worth of 
                          furnaces?';
    }

    protected function setFields() {
        $this->form_fields = array(
            'comm' => 'Commission Amount $',
            'perc' => 'Percent Amount %'
        );
    }

}
