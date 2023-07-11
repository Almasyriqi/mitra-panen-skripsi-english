<?php
namespace App\Traits;

trait PhoneNumberFormatter {
    public function format($phoneNumber)
    {
        if ($phoneNumber[0] == "+") {
            $phoneNumber = str_replace("+", "", $phoneNumber);
        }
        if ($phoneNumber[0] == "0") {
            $phoneNumber = substr($phoneNumber, 1);
        }
        if ($phoneNumber[0] == "8") {
            $phoneNumber = "62" . $phoneNumber;
        }
        return $phoneNumber;
    }
}