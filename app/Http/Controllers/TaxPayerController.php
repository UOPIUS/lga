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
class TaxPayerController extends Controller
{
	protected $taxPayerInterface;
	protected $localGovernmentInterface;


	public function __construct(TaxPayerInterface $taxPayerInterface,
		LocalGovernmentInterface $localGovernmentInterface )
	{
		$this->taxPayerInterface = $taxPayerInterface;
		$this->localGovernmentInterface = $localGovernmentInterface;

		
	}
	public function autocomplete(){
  
	    $this->taxPayerInterface->typeAheadSearch();
  	}

	public function index() {
		return view('pages.tax_payer.index');
	}
	public function create() {
		$states = State::all();
		return view('pages.tax_payer.create')->with('states',$states);
	}
	public function ajaxClientRecords(){
        $result = $this->taxPayerInterface->allTaxPayer();
        return Datatables::of($result)->make(true);
    }
	
	public function fetchLGA(Request $request){
		
		 try{
            $stateId = $request->state_id;
            $response = '<option value="">-Select lga-</option>';
            $lgas = $this->localGovernmentInterface->findLGAByStateId($stateId);
            foreach($lgas as $lga){
                $response .= "<option value='$lga->local_id'>".$lga->local_name."</option>";
            }
            echo ($response);
            exit;
        }
        catch(Exception $e){
            echo json_encode(['status'=>'201','msg'=>$e->getMessage()]);
        }
	}
	public function changePicture($id){
		return view('pages.upload.upload_photo')->with('data',$this->taxPayerInterface->find($id));
	}
	public function taxPayerPhotoUpload(Request $request){
		$photoDir = public_path().'/images/profile/';

		try{
			$img = $request->image;
			$img = str_replace('data:image/png;base64,', '', $img);
			$img = str_replace(' ', '+', $img);

			$data = base64_decode($img);
			$file = time() . ".png";
			$success = file_put_contents($photoDir . $file, $data);

			//Update client Record 
			$this->taxPayerInterface->uploadPhoto($request->user,$request->logical_address,$file);

			return json_encode(['status'=>200,'msg'=>'Thank You. Profile Updated Successfully!']);
		}
		catch(\Exception $e){
			return json_encode(['status'=>202,'msg'=>'Oooops! Error '.$e->getMessage()]);
		}
	
	}
	public function store(Request $request) {
		$user = '1';
			
		$request->validate([
			'fname' => 'required|max:159',
			'lname' => 'required|max:255',
			'phone' => 'required|max:11',
			'address' => 'required|max:190',
			'gender' => 'required',
			'state_id' => 'required',
			'lga_id' => 'required',
			'occupation' => 'required'
		]);
		try{
			$tin = $this->generateTin($request->state_id);
			
			$taxPayer = $this->taxPayerInterface->addTaxPayer($request,$tin);

			return view('pages.upload.upload_photo')->with('data',$taxPayer);

			//return Redirect::to('upload/photo')->with('taxPayer',$taxPayer->id);
			
		}
		catch(\Exception $e){
			 Session::flash('error', 'Could not save Tax Payer ');
		}
		
	}

	public function show($id) {
		try{
	      $data = $this->taxPayerInterface->find($id);
	      return view("pages.tax_payer.show")->with('data',$data);
     	}
	     catch(\Exception $e){
	     	Session::flash('error', 'Could not find Tax Payer ');
	    }
	}
	public function edit($id) {
		$returnData = $this->taxPayerInterface->find($id);
      return view('pages.tax_payer.edit')->with('data',$returnData);
	}
	public function update(Request $request, $id) {

		try{
			$data = $this->taxPayerInterface->updateTaxPayer($id,$request);
			Session::flash('success', 'Tax Payer Saved Successfully... ');
			return view("pages.tax_payer.show")->with('data',$data);
		}
		catch(\Exception $e){
			Session::flash('error', 'Could not update Tax Payer '.$e->getMessage());
		}
	}
	public function destroy($id) {
		echo 'destroy';
	}
}
/*
					Log::emergency($message);
					Log::alert($message);
					Log::critical($message);
					Log::error($message);
					Log::warning($message);
					Log::notice($message);
					Log::info($message);
					Log::debug($message);
*/