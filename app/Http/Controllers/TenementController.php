<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use App\Repositories\TaxPayer\TaxPayerInterface;
use App\Repositories\LocalGovernment\LocalGovernmentInterface;
use App\LocalGovernment;
use App\State;
use App\Tenement;
use App\Gateway;
use Session;
use Redirect;
use DataTables;
use Route;
class TenementController extends Controller
{

	protected $taxPayerInterface;
	protected $localGovernmentInterface;


	public function __construct(TaxPayerInterface $taxPayerInterface,
		LocalGovernmentInterface $localGovernmentInterface )
	{
		$this->taxPayerInterface = $taxPayerInterface;
		$this->localGovernmentInterface = $localGovernmentInterface;
		
	}
    /*
		@ search existing tax service code
		@param search term
    */
		public function searchTaxServiceCode(Request $request){
			return $this->generateUniqueCodeForTax();
		}
		public function saveTenement(Request $request){

			$request->validate([
			'tax_payer' => 'required',
			'cofo' => 'required',
			'address' => 'required',
			]);

			$user = '1';

			//Get this client information
			$client = $this->taxPayerInterface->find($request->tax_payer);

			$tenement = new Tenement;
			$tenement->tax_payer = $client->id;
			$tenement->cofo = $request->cofo;
			$tenement->lga_id = $client->lga_id;
			$tenement->address = $request->address;
			$tenement->money_made = $request->money_made;
			$tenement->ppty_code = date('YmdHms').$request->tax_service;
			$tenement->created_by = $user;
			$tenement->status = '0';
			try{
				$gateways = Gateway::all();
				Log::Emergency($tenement);
				$tenement->save();
			
				session(['data'=>$client,'gateways'=>$gateways,'tenement'=>$tenement]);
				return redirect()->route('tax_transaction');
				
			}
			catch(\PDOException $e){
				Session::flash('error', 'Could not start Service '.$e->getMessage());
			}

		}
}
