<?php

namespace App\Http\Controllers;

use App\Models\IGDBInvolvedCompany;
use App\Models\IGDBCompany;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IGDBInvolvedCompaniesController extends Controller
{

    protected $involvedCompanies;

    public function __construct($involvedCompanies) {
        $this->involvedCompanies = $involvedCompanies;
    }

    public function createOrUpdateInvolvedCompanies() {

        try {
            
            foreach ($this->involvedCompanies as $key => $involvedCompany) {

                $company = IGDBCompany::updateOrCreate(
                    ['id' => $involvedCompany['company']['id']],
                    $involvedCompany['company']
                );

                $involvedCompany['company'] = $company->id;

                IGDBInvolvedCompany::updateOrCreate(
                    ['id' => $involvedCompany['id']],
                    $involvedCompany
                );
            } 
            
            
        } catch (\Throwable $th) {
            \Log::error($th);
            throw $th;
        }

    }
        
}
