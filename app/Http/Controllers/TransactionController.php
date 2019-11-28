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
use DataTables;
use Route;

class TransactionController extends Controller
{
	//DI Params
    protected $taxPayerInterface;
	protected $localGovernmentInterface;


	public function __construct(TaxPayerInterface $taxPayerInterface,
		LocalGovernmentInterface $localGovernmentInterface )
	{
		$this->taxPayerInterface = $taxPayerInterface;
		$this->localGovernmentInterface = $localGovernmentInterface;

		
	}
}
