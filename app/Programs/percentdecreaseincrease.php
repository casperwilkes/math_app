<?php

namespace MathApp\Programs;

use MathApp\Classes;

class PercentDecreaseIncrease extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Percent Decrease / Increase';

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $modifier = $nums['now'] - $nums['then'];
            $remainder = $modifier / $nums['then'];
            $total = $remainder * 100;
            $this->answer = 'Percent Modified: = ' . round($total, 2) . '%';
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'As first public inquiry showed, there were 611,000
                          women motorcyclists in the United States, up from 
                          413,000 just eight years before it. Find the percent 
                          of increase in the number of women motorcyclists
                          during these eight years.';
    }

    protected function setFields() {
        $this->form_fields = array(
            'then' => 'Past Amount',
            'now' => 'Present amount'
        );
    }

}
