<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Repositories\TaxPayer\TaxPayerInterface;
use App\Repositories\LocalGovernment\LocalGovernmentInterface;
use App\LocalGovernment;
use App\State;
use Session;
use Redirect;
use Route;
use Illuminate\Http\Request;

class PayTaxController extends Controller
{
	protected $taxPayerInterface;
	protected $localGovernmentInterface;
   protected $stateInterface;


	public function __construct(TaxPayerInterface $taxPayerInterface,
		LocalGovernmentInterface $localGovernmentInterface, StateInterface $stateInterface )
	{
		$this->taxPayerInterface = $taxPayerInterface;
		$this->localGovernmentInterface = $localGovernmentInterface;
      $this->stateInterface = $stateInterface;
		
	}
    
}
