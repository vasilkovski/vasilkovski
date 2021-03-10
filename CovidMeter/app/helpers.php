<?php

use App\Coivd;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


function syncCasesByCountry($countryId, $countrySlug)
{

    $today = Carbon::now()->format("Y-m-d");
    $data_yesterday = DB::select("SELECT country_id, DATE_ADD(Max(`date`), INTERVAL +1 DAY) as target_date
                                 FROM cases
                             Where country_id = $countryId ");
    $last_row_in_db = "";
    foreach ($data_yesterday as $before) {
        $last_row_in_db = $before->target_date;
        }
        
    $data = file_get_contents("https://api.covid19api.com/total/country/$countrySlug?from=$last_row_in_db&to=$today");
    $data = json_decode($data, true);
    
    foreach ($data_yesterday as $yesterday) {
        if ($yesterday->target_date != $today) {
            
            foreach ($data as $info) { 
                $dateInDb = Carbon::parse($info['Date'])->format('Y-m-d');

                Coivd::insert([
                    'country_id' => $countryId,
                    'date' =>   $dateInDb,
                    'active' => $info['Active'],
                    'recovered' => $info['Recovered'],
                    'deaths' => $info['Deaths'],
                    'confirmed' => $info['Confirmed']
                ]);
            }
            
        }
    }
    
}


function casesByCountry($countryId, $countrySlug)
{
    $data = file_get_contents("https://api.covid19api.com/total/dayone/country/$countrySlug");
    $data = json_decode($data, true);

    foreach ($data as $info) {
        $dateInDb = Carbon::parse($info['Date'])->format('Y-m-d');

        Coivd::insert([
            'country_id' => $countryId,
            'date' => $dateInDb,
            'active' => $info['Active'],
            'recovered' => $info['Recovered'],
            'deaths' => $info['Deaths'],
            'confirmed' => $info['Confirmed']
        ]);
    }
}
