<?php

class ConvertFraction_Math extends Base_Math {

    protected $view_name = 'Convert Fraction';
    private $decimal;
    private $percent;

    public function calculate($nums) {
        $this->decimal = $nums['num1'] / $nums['num2'];
        $this->percent = $this->decimal * 100;

        $this->format_answer();
    }

    protected function set_example() {
        $this->example = 'With a fraction of <sup>5</sup>/<sub>100</sub> find the decimal value,
                          and the percent value?';
    }

    protected function set_fields() {
        $this->form_fields = array(
            'num1' => 'numerator',
            'num2' => 'denominator'
        );
    }

    private function format_answer() {
        $this->answer = 'Decimal: ' . $this->decimal . '<br />';
        $this->answer .= 'Percent: ' . $this->percent . '%';
    }

}

?>