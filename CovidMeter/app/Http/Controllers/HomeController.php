<?php


namespace App\Http\Controllers;



use App\Country;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function sync()
    {
        $sql = DB::select("SELECT * FROM countries limit 10 offset 190");
        
        foreach ($sql as $row) {
         
            syncCasesByCountry($row->id, $row->slug);
            
        }

        return redirect('/');
    }

    public function fillDb()
    {

        $sql = DB::select("SELECT * FROM countries limit 30 offset 240");

        
        foreach ($sql as $row) {
            casesByCountry($row->id, $row->slug);
        }
    }

    public function countries()
    {

        $countries = file_get_contents("https://api.covid19api.com/countries");
        $countries = json_decode($countries, true);

        foreach ($countries as $country) {
            Country::insert([
                'name' => $country['Country'],
                'slug' => $country['Slug'],
            ]);
        }
    }
}
