<?php

function InputItemPrice($enabled, $price) {
    if($enabled == 1) {
        return $price;
    } else {
        return 0.00;
    }
}