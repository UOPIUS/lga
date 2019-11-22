<?php 
namespace App\Repositories\TaxPayer;
use App\Repositories\TaxPayer\TaxPayerInterface;
use App\TaxPayer;
class TaxPayerRepository implements TaxPayerInterface
{
    public function addTaxPayer($request,$tin){
        //Get the currently authenticated user
        $user = '1';
       
        $client = new TaxPayer;

        $client->fname = $request->fname;
        $client->lname = $request->lname;
        $client->oname = $request->oname ?? "";
        
        $client->phone = $this->formatMobileNumber($request->phone);
        $client->address = $request->address;
        $client->gender = $request->gender;
        $client->logical_address = 'NIL';
        $client->email = $request->email ?? 'NIL'; //Null coalesce
        $client->state_id = $request->state_id;
        $client->lga_id = $request->lga_id;
        $client->photo = 'NIL';
        $client->tin = $tin;
        $client->work_type = $request->occupation;
        $client->status = 'N'; //$user->registration_center;
        $client->user()->associate($user);
        
        $client->save();
        return $client;
    }
    public function updateTaxPayer($id, $request){
        $client = TaxPayer::find($id);

        $client->fname = $request->fname;
        $client->lname = $request->lname;
        $client->oname = $request->oname ?? "";
        
        $client->phone = $this->formatMobileNumber($request->phone);
        $client->address = $request->address;
        $client->email = $request->email ?? 'NIL'; //Null coalesce
        $client->save();        
        return $client;
    }
    public function uploadPhoto($id,$logicalAddress,$photo){
        $client = TaxPayer::find($id);

        //Only update logical Address if it doesn't already exist
        if(!$client->logical_address){
            $client->logical_address = $logicalAddress;
        }
        $client->photo = $photo;
        $client->save();        
        return $client;
    }
    public function findTaxPayerByTin($tin){
        $data = TaxPayer::where("tin",$tin)->first()->get();
    }

    public function find($id) {
        return TaxPayer::with('user')->with('lga')->with('state')->find($id);
    }

    public function allTaxPayer(){
        return TaxPayer::with('user')->with('lga')->orderBy('id', 'DESC')->take(100)->get();
    }
    public function findTaxPayerByLga($lga){

    }
    public function formatMobileNumber($mobile){
        $country_code = '234';
        $mobilenumber = trim($mobile);
          if (substr($mobilenumber, 0, 1) == '0'){
            $mobilenumber = $country_code . substr($mobilenumber, 1);
          }elseif (substr($mobilenumber, 0, 1) == '+'){
            $mobilenumber = substr($mobilenumber, 1);
          }
        $mobilenumber = '+'.$mobilenumber;
        return $mobilenumber;
    }
    public function typeAheadSearch(){
  
        $data = TaxPayer::select("fname",'lname','phone')->get();
        $array = [];
        foreach($data as $client){
          $array[] = $client->fname.' '.$client->lname.' '.$client->phone;
        }
          return json_encode($array);
    }
}