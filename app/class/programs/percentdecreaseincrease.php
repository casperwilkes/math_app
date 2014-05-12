<?php

class PercentDecreaseIncrease_Math extends Base_Math {

    protected $view_name = 'Percent Decrease / Increase';

    public function calculate($nums) {
        $modifier = $nums['now'] - $nums['then'];
        $remainder = $modifier / $nums['then'];
        $total = $remainder * 100;
        $this->answer = 'Percent Modified: = ' . round($total, 2) . '%';
    }

    protected function set_example() {
        $this->example = 'As first public inquiry showed, there were 611,000
                          women motorcyclists in the United States, up from 
                          413,000 just eight years before it. Find the percent 
                          of increase in the number of women motorcyclists
                          during these eight years.';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'then' => 'Past Amount',
            'now' => 'Present amount'
        );
    }

}

?>
