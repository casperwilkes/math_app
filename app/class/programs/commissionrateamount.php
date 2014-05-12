<?php

class CommissionRateAmount_Math extends Base_Math {

    protected $view_name = 'Commission Rate Amount';

    public function calculate($nums) {
        $per = $this->percent($nums['perc']);
        $r = $per * $nums['comm'];
        $this->answer = '$' . round($r, 2);
    }

    protected function set_example() {
        $this->example = 'A salesperson\'s rate of commission is 5%. What is
                          the commission from the sale of $40,000 worth of 
                          furnaces?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'comm' => 'Commission Amount $',
            'perc' => 'Percent Amount %'
        );
    }

}

?>