<?php

class Discount_Math extends Base_Math {

    private $discount;
    private $sale;

    public function calculate($nums) {
        $pri = $nums['price'];
        $dec = $this->percent_to_decimal($nums['percent']);
        $this->discount = $dec * $pri;
        $this->sale = $pri - $this->discount;

        $this->format_answer();
    }

    protected function set_example() {
        $this->example = "A '60% off sale' begins today at Wanda's Women's Wear.
        What is the sale price of women's wool coats normally priced at $210?";
    }

    protected function set_fields() {
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

?>
