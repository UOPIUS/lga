<?php 
namespace App\Repositories\LocalGovernment;

interface LocalGovernmentInterface
{
    public function findLGAByStateId($stateId);
    public function findLGAById($lga);

}