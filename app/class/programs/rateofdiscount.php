<?php

class RateOfDiscount_Math extends Base_Math {

    protected $view_name = 'Rate of Discount';
    private $rate;
    private $sale;

    public function calculate($nums) {
        $this->rate = ($nums['discount'] / $nums['price']) * 100;
        $this->sale = $nums['price'] - $nums['discount'];

        $this->format_answer();
    }

    protected function set_example() {
        $this->example = <<<EOT
                <table border="1">
                    <tbody>
                        <tr>
                            <td>marked price</td>
                            <td>$89.00</td>
                        </tr>
                        <tr>
                            <td>Rate of discount</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>Discount</td>
                            <td>$13.35</td>
                        </tr>
                        <tr>
                            <td>Sale Price</td>
                            <td>&nbsp;</td>
                        </tr>
                    </tbody>
                </table>
EOT;
    }

    protected function set_fields() {
        $this->form_fields = array(
            'price' => 'Marked Price $',
            'discount' => 'Discount Amount $'
        );
    }

    private function format_answer() {
        $this->answer = "Rate of Discount: " . round($this->rate, 2) . '% <br />';
        $this->answer .= "Sale Price: $" . $this->sale;
    }

}

?>
