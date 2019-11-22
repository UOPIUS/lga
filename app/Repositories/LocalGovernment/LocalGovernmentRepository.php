<?php 
namespace App\Repositories\LocalGovernment;
use App\Repositories\LocalGovernment\LocalGovernmentInterface;
use App\LocalGovernment;
class LocalGovernmentRepository implements LocalGovernmentInterface
{
    public function findLGAByStateId($stateId){
		return LocalGovernment::where('state_id', $stateId)->get();	
	}
	public function findLGAById($lga){
		return LocalGovernment::find($lga);
	}
}