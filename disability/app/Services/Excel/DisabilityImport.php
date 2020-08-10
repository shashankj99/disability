<?php

namespace App\Services\Excel;

use App\Disable;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToArray;

class DisabilityImport implements ToArray
{
    public function array(array $array) {
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');

        foreach ($array as $key => $value) {
            if ($key != 0) {
                Disable::create([
                    'user_id' => Auth::id(),
                    'nep_name' => $value[0],
                    'eng_name' => $value[1],
                    'dob_nepali' => $value[2],
                    'dob_english' => $value[3],
                    'age' => $value[4],
                    'gender' => $value[5],
                    'blood_group' => $value[6],
                    'state' => $value[7],
                    'district' => $value[8],
                    'local_level' => $value[9],
                    'ward_no' => $value[10],
                    'guardian_nep_name' => $value[11],
                    'guardian_eng_name' => $value[12],
                    'citizenship_no' => $value[13],
                    'citizenship_issued_district' => $value[14],
                    'citizenship_issued_date_nepali' => $value[15],
                    'citizenship_issued_date_english' => $value[16],
                    'disability_category' => $value[17],
                    'disability_severity' => $value[18]
                ]);
            }
        }
    }
}
