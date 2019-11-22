<?php 
namespace App\Repositories\State;
use App\Repositories\State\StateInterface;
use App\State;


class StateRepository implements StateInterface
{
    public function findStateById($stateId)
    {
    	return State::where('state_id',$stateId)->first();
    }
    public function getStateCode($state)
    {
    	return State::where('state_id', $state_id)->first()->state_code;
    	//$names = Model::where('age', '29')->pluck('name');
    }

}