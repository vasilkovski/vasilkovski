<?php

namespace App\Http\Controllers;

use App\Coivd;

use App\Country;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class TrackerController extends Controller
{
  public function index( Request $request)
  {
    $countries = Country::all();
     $covid = Coivd::all();
    
    $data = DB::select("SELECT countries.*, active, deaths,recovered,confirmed, date
            FROM countries

            JOIN (
              SELECT cases.country_id, active, deaths, recovered, confirmed, date
              FROM cases

              JOIN (
                SELECT country_id, MAX(date) as target_date
                FROM cases
                GROUP BY country_id 
              ) as latest

                ON cases.country_id = latest.country_id
                  AND cases.date = latest.target_date
            ) as latest_cases
              ON countries.id = latest_cases.country_id");


    $day = DB::select("SELECT countries.*, active, deaths,recovered,confirmed, date
            FROM countries

            JOIN (
              SELECT cases.country_id, active, deaths, recovered, confirmed, date
              FROM cases

              JOIN (
                SELECT country_id, MAX(date)-1 as target_date
                FROM cases
                GROUP BY country_id 
              ) as latest

                ON cases.country_id = latest.country_id
                  AND cases.date = latest.target_date
            ) as latest_cases
              ON countries.id = latest_cases.country_id");

    $oneMonth = DB::select("SELECT countries.*, active, deaths,recovered,confirmed, date
          FROM countries

          JOIN (
            SELECT cases.country_id, active, deaths, recovered, confirmed, date
            FROM cases

            JOIN (
              SELECT country_id, DATE_ADD(Max(`date`), INTERVAL -30 DAY) as target_date
              FROM cases
              GROUP BY country_id 
            ) as latest

              ON cases.country_id = latest.country_id
                AND cases.date = latest.target_date
          ) as latest_cases
            ON countries.id = latest_cases.country_id");

    $threeMonths = DB::select("SELECT countries.*, active, deaths,recovered,confirmed, date
                FROM countries

                JOIN (
                  SELECT cases.country_id, active, deaths, recovered, confirmed, date
                  FROM cases

                  JOIN (
                    SELECT country_id, DATE_ADD(Max(`date`), INTERVAL -90 DAY) as target_date
                    FROM cases
                    GROUP BY country_id 
                  ) as latest

                    ON cases.country_id = latest.country_id
                      AND cases.date = latest.target_date
                ) as latest_cases
                  ON countries.id = latest_cases.country_id");


    


    $active = $deaths = $recovered = $confirmed = [];
    foreach ($data as $info) {
      
      array_push($deaths, $info->deaths);
      array_push($recovered, $info->recovered);
      array_push($confirmed, $info->confirmed);
    }
    $per_total = [ array_sum($deaths), array_sum($recovered), array_sum($confirmed)];

    

    $dayActive = $dayDeaths = $dayRocovered = $dayConfirmed = [];
    foreach ($day as $info) {
     
      array_push($dayDeaths, $info->deaths);
      array_push($dayRocovered, $info->recovered);
      array_push($dayConfirmed , $info->confirmed);
    }
    $per_day = [array_sum($dayDeaths), array_sum($dayRocovered), array_sum($dayConfirmed)];


    $oneActive = $onedDeaths = $oneRecovered = $oneConfirmed = [];
    foreach ($oneMonth as $info) {
     
      array_push($onedDeaths, $info->deaths);
      array_push($oneRecovered, $info->recovered);
      array_push($oneConfirmed , $info->confirmed);
    }
    $per_month = [ array_sum($onedDeaths), array_sum($oneRecovered), array_sum($oneConfirmed)];


    $threeActive = $threedDeaths = $threeRecovered = $threeConfirmed = [];
    foreach ($threeMonths as $info) {
      
      array_push($threedDeaths, $info->deaths);
      array_push($threeRecovered, $info->recovered);
      array_push($threeConfirmed , $info->confirmed);
    }
    $per_threeMonths = [ array_sum($threedDeaths), array_sum($threeRecovered), array_sum($threeConfirmed)];
    
    
    $deathDay =$per_total[0] - $per_day[0];
    $recoveredDay = $per_total[1] - $per_day[1];
    $confirmedDay = $per_total[2] - $per_day[2];

    
    $deathMonth =$per_total[0] - $per_month[0];
    $recoveredMonth = $per_total[1] - $per_month[1];
    $confirmedMonth = $per_total[2] - $per_month[2];


    
    $deathThreeMonths =$per_total[0] - $per_threeMonths[0];
    $recoveredThreeMonths = $per_total[1] - $per_threeMonths[1];
    $confirmedThreeMonths = $per_total[2] - $per_threeMonths[2];
    
    $total_per_day = [$deathDay,$recoveredDay,$confirmedDay];
    $total_per_month = [$deathMonth,$recoveredMonth,$confirmedMonth];
    $total_per_threeMonths = [ $deathThreeMonths,$recoveredThreeMonths,$confirmedThreeMonths  ];


    return view('welcome', compact('data', 'per_total', 
    'total_per_month','total_per_threeMonths', 'total_per_day', 
    'covid', 'countries'));
  }

  

public function totalCountry(Request $request){
  $country_id = $request->input('country');
  $newCovid = Coivd::where('country_id', $country_id)->orderBy('date','desc')->limit(1)->get();
  session(['country_id' => $country_id]);
  $lastDay = \Carbon\Carbon::now()->subDays(1)->format('Y-m-d');
  $lastDayConfirm = 0;
  $lastDayActive = 0;
  $lastDayDeaths = 0;
  $lastDayRecovered = 0;
  
  $LastDayRecord = DB::table('cases')->where([
    ['country_id', '=', $country_id],
    ['date', '=', $lastDay]
    ])->get();


foreach($LastDayRecord as $record){
  $lastDayConfirm = $record->confirmed;
  $lastDayActive = $record->active;
  $lastDayDeaths = $record->deaths;
  $lastDayRecovered = $record->recovered;
}

$all = [ $lastDayActive,$lastDayDeaths, $lastDayRecovered, $lastDayConfirm ];

  return view('total',compact('newCovid', 'all'));

}
public function total(){
  $country_id = session('country_id');
  $newCovid = Coivd::where('country_id', $country_id)->orderBy('date','desc')->limit(1)->get();
  $lastDay = \Carbon\Carbon::now()->subDays(1)->format('Y-m-d');
  $lastDayConfirm = 0;
  $lastDayActive = 0;
  $lastDayDeaths = 0;
  $lastDayRecovered = 0;
  
  $LastDayRecord = DB::table('cases')->where([
    ['country_id', '=', $country_id],
    ['date', '=', $lastDay]
    ])->get();


foreach($LastDayRecord as $record){
  $lastDayConfirm = $record->confirmed;
  $lastDayActive = $record->active;
  $lastDayDeaths = $record->deaths;
  $lastDayRecovered = $record->recovered;
}

$all = [ $lastDayActive,$lastDayDeaths, $lastDayRecovered, $lastDayConfirm ];

  return view('total',compact('newCovid', 'all'));

}



public function lastDay(){
  $country_id = session('country_id');
      
      $newCovid = Coivd::where('country_id', $country_id)->orderBy('date','desc')->limit(1)->get();

      
      $lastDay = \Carbon\Carbon::now()->subDays(1)->format('Y-m-d');
      $last2Day = \Carbon\Carbon::now()->subDays(2)->format('Y-m-d');

        $lastDayConfirm = 0;
        $lastDayActive = 0;
        $lastDayDeaths = 0;
        $lastDayRecovered = 0;
        
        $LastDayRecord = DB::table('cases')->where([
          ['country_id', '=', $country_id],
          ['date', '=', $lastDay]
          ])->get();


      foreach($LastDayRecord as $record){
        $lastDayConfirm = $record->confirmed;
        $lastDayActive = $record->active;
        $lastDayDeaths = $record->deaths;
        $lastDayRecovered = $record->recovered;
      }

        $last2DayConfirm = 0;
        $last2DayActive = 0;
        $last2DayDeaths = 0;
        $last2DayRecovered = 0;
        
        $Last2DayRecord = DB::table('cases')->where([
          ['country_id', '=', $country_id],
          ['date', '=', $last2Day]
          ])->get();


      foreach($Last2DayRecord as $record){
        $last2DayConfirm = $record->confirmed;
        $last2DayActive = $record->active;
        $last2DayDeaths = $record->deaths;
        $last2DayRecovered = $record->recovered;
      }

        $lastOneDayConfirmed =  $lastDayConfirm - $last2DayConfirm;
        $lastOneDayActive = $lastDayActive ;
        $lastOneDayDeaths = $lastDayDeaths - $last2DayDeaths;
        $lastOneDayRecovered = $lastDayRecovered - $last2DayRecovered;
        $lastOneDayCases = [$lastOneDayActive,$lastOneDayDeaths,$lastOneDayRecovered,$lastOneDayConfirmed  ];
        
        
        return view('oneDay',compact('newCovid','lastOneDayCases'));

}



public function lastMonth(Request $request){
  $country_id = session('country_id');
      
      $newCovid = Coivd::where('country_id', $country_id)->orderBy('date','desc')->limit(1)->get();

      $lastDay = \Carbon\Carbon::now()->subDays(1)->format('Y-m-d');
    
      $last30 = \Carbon\Carbon::now()->subDay(30)->format('Y-m-d');

      $lastDayConfirm = 0;
      $lastDayActive = 0;
      $lastDayDeaths = 0;
      $lastDayRecovered = 0;
      
      $LastDayRecord = DB::table('cases')->where([
        ['country_id', '=', $country_id],
        ['date', '=', $lastDay]
        ])->get();


      foreach($LastDayRecord as $record){
        $lastDayConfirm = $record->confirmed;
        $lastDayActive = $record->active;
        $lastDayDeaths = $record->deaths;
        $lastDayRecovered = $record->recovered;
      }

        $lastMonthConfirm = 0;
        $lastMonthActive = 0;
        $lastMonthDeaths = 0;
        $lastMonthRecovered = 0;
        
        $LastMonthRecord = DB::table('cases')->where([
          ['country_id', '=', $country_id],
          ['date', '=', $last30]
          ])->get();


      foreach($LastMonthRecord as $record){

        $lastMonthConfirm = $record->confirmed;
        $lastMonthActive = $record->active;
        $lastMonthDeaths = $record->deaths;
        $lastMonthRecovered = $record->recovered;
      }
      $lastMonthConfirmed =  $lastDayConfirm - $lastMonthConfirm;
      $lastMonthActive = $lastDayActive ;
      $lastMonthDeaths = $lastDayDeaths - $lastMonthDeaths;
      $lastMonthRecovered = $lastDayRecovered - $lastMonthRecovered;
      $lastMonthCases = [$lastMonthActive,$lastMonthDeaths,$lastMonthRecovered,$lastMonthConfirmed  ];

      return view('lastMonth',compact('newCovid','lastMonthCases', 'country_id'));
  }




  public function lastThreeMonth(Request $request){
    $country_id = session('country_id');
       
        $newCovid = Coivd::where('country_id', $country_id)->orderBy('date','desc')->limit(1)->get();

        $lastDay = \Carbon\Carbon::now()->subDays(1)->format('Y-m-d');
        $last90 = \Carbon\Carbon::now()->subDays(90)->format('Y-m-d');

        $lastDayConfirm = 0;
        $lastDayActive = 0;
        $lastDayDeaths = 0;
        $lastDayRecovered = 0;
        
        $LastDayRecord = DB::table('cases')->where([
          ['country_id', '=', $country_id],
          ['date', '=', $lastDay]
          ])->get();


      foreach($LastDayRecord as $record){
        $lastDayConfirm = $record->confirmed;
        $lastDayActive = $record->active;
        $lastDayDeaths = $record->deaths;
        $lastDayRecovered = $record->recovered;
      }

      $last3MonthConfirm = 0;
      $last3MonthActive = 0;
      $last3MonthDeaths = 0;
      $last3MonthRecovered = 0;
      
      $Last3MonthRecord = DB::table('cases')->where([
        ['country_id', '=', $country_id],
        ['date', '=', $last90]
        ])->get();


      foreach($Last3MonthRecord as $record){
        $last3MonthConfirm = $record->confirmed;
        $last3MonthActive = $record->active;
        $last3MonthDeaths = $record->deaths;
        $last3MonthRecovered = $record->recovered;
      }


        $last3MonthConfirmed =  $lastDayConfirm - $last3MonthConfirm;
        $last3MonthActive = $lastDayActive ;
        $last3MonthDeaths = $lastDayDeaths - $last3MonthDeaths;
        $last3MonthRecovered = $lastDayRecovered - $last3MonthRecovered;

        

        $last3MonthCases = [$last3MonthActive,$last3MonthDeaths,$last3MonthRecovered,$last3MonthConfirmed  ];

        
        return view('lastThreeMonth',compact('newCovid','last3MonthCases'));

  }
}
