<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Discount extends Classes\BaseMath implements Classes\InterfaceMath {

    private $discount;
    private $sale;

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $pri = $nums['price'];
            $dec = $this->percentToDecimal($nums['percent']);
            $this->discount = $dec * $pri;
            $this->sale = $pri - $this->discount;

            $this->format_answer();
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = "A '60% off sale' begins today at Wanda's Women's Wear.
        What is the sale price of women's wool coats normally priced at $210?";
    }

    protected function setFields() {
        $this->form_fields = array(
            'price' => 'Marked price $',
            'percent' => 'discount percent %'
        );
    }

    private function format_answer() {
        $this->answer = 'Discount: $' . $this->discount . '<br />';
        $this->answer .= 'Sale Price: $' . $this->sale;
    }

}
