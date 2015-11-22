<?php

namespace MathApp\Programs;

use MathApp\Classes;

class RateOfDiscount extends Classes\BaseMath implements Classes\InterfaceMath {

    protected $view_name = 'Rate of Discount';
    private $rate;
    private $sale;

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->rate = ($nums['discount'] / $nums['price']) * 100;
            $this->sale = $nums['price'] - $nums['discount'];

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = "
                    <table>
                        <tr>
                            <th>marked price</th>
                            <th>$89.00</th>
                        </tr>
                        <tr>
                            <th>Rate of discount</th>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <th>Discount</th>
                            <td>$13.35</td>
                        </tr>
                        <tr>
                            <th>Sale Price</th>
                            <td>&nbsp;</td>
                        </tr>
                    </table>";
    }

    protected function setFields() {
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
