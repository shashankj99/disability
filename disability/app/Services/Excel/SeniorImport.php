<?php

namespace App\Services\Excel;

use App\SeniorCitizen;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToArray;

class SeniorImport implements ToArray
{
    public function array(array $array) {
        ini_set('max_execution_time', '0');
        ini_set('memory_limit', '-1');

        foreach ($array as $key => $value) {
            if ($key != 0) {
                SeniorCitizen::create([
                    'user_id' => Auth::id(),
                    'name' => $value[0],
                    'locality' => $value[1],
                    'dob_nepali' => $value[2],
                    'dob_english' => $value[3],
                    'age' => $value[4],
                    'gender' => $value[5],
                    'blood_group' => $value[6],
                    'state' => $value[7],
                    'district' => $value[8],
                    'local_level' => $value[9],
                    'ward_no' => $value[10],
                    'citizenship_no' => $value[11],
                    'citizenship_issued_district' => $value[12],
                    'citizenship_issued_date_nepali' => $value[13],
                    'citizenship_issued_date_english' => $value[14],
                    'spouse_name' => $value[15],
                    'facilities' => $value[16],
                    'contact_person_name' => $value[17],
                    'contact_person_address' => $value[18],
                    'certificate_no' => $value[19],
                    'home_care_name' => $value[20],
                    'disease' => $value[21],
                    'medicine' => $value[22]
                ]);
            }
        }
    }
}
