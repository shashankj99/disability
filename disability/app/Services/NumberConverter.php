<?php

namespace App\Services;

/**
 * class NumberConverter
 * 
 * @package: App\Service
 * @author: Shashank Jha <shashankj677@gmail.com
 */

class NumberConverter {

    public function devanagari($number) {
        $nepaliNumberArray = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        $englishNumberArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $convertedNumber = str_replace($englishNumberArray, $nepaliNumberArray, $number);
        return $convertedNumber;
    }

    public function english(String $number) {
        $nepaliNumberArray = ['०', '१', '२', '३', '४', '५', '६', '७', '८', '९'];
        $englishNumberArray = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        $convertedNumber = str_replace($nepaliNumberArray, $englishNumberArray, $number);
        return $convertedNumber;
    }

}