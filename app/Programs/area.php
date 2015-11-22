<?php

namespace MathApp\Programs;

use MathApp\Classes;

class Area extends Classes\BaseMath implements Classes\InterfaceMath {

    public function calculate($nums) {
        if ($this->meetsRequired($nums)) {
            $this->answer = $nums['height'] * $nums['width'];
        } else {
            $this->isRequired();
        }
    }

    protected function setExample() {
        $this->example = 'If the height of a rectangle is 2 inches, and the width
                          is 4 inches, what is the area?';
    }

    protected function setFields() {
        $this->form_fields = array('height' => 'height', 'width' => 'width');
    }

}
