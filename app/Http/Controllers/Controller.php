<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\State;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $stateInterface;
   
    public function generateTin($state)
    {
    	
    	$stateCode = State::where('state_id',$state)->first()->state_code;
    	$tin = $stateCode.date('YmdHms');
    	//Log::Info($tin);
    	return $tin;

    }
    public function generateUniqueCodeForTax($pptyCode,$userTin){
        $code = $userTin.$ppty;
        return $code;
    }

    
}
