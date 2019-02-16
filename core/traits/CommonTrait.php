<?php

namespace core\traits;

trait CommonTrait{

    public function checkRange($num, $min, $max){

        return ($num <= $max) && ($num >= $min);

    }

}