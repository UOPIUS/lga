<?php 
namespace App\Repositories\State;

interface StateInterface
{
    public function findStateById($stateId);
    public function getStateCode($state);

}