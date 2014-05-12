<?php

class SalesTax_Math extends Base_Math {

    protected $view_name = 'Sales Tax';
    private $sales_tax;
    private $total;

    public function calculate($nums) {
        $c = $nums['cost'];
        $r = $nums['rate'];

        $s = $this->tax($c, $r);
        $cost = $c + $s;
        $this->sales_tax = round($s, 2);
        $this->total = round($cost, 2);

        $this->format_answer();
    }

    protected function set_example() {
        $this->example = 'The sales tax rate in New York City is 8.8%. Find the 
                          tax charged on a purchase of $288, and find the total 
                          cost.';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'cost' => 'Item Cost $',
            'rate' => 'Tax Rate %'
        );
    }

    private function format_answer() {
        $this->answer = 'Sales Tax = $' . $this->sales_tax . '<br />';
        $this->answer .= 'Total Amount = $' . $this->total;
    }

}

?>
