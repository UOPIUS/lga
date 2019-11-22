<?php 
namespace App\Repositories\TaxPayer;

interface TaxPayerInterface
{
    public function addTaxPayer($request,$tin);
    public function updateTaxPayer($id, $request);
    public function findTaxPayerByTin($tin);
    public function allTaxPayer();
    public function findTaxPayerByLga($lga);
    public function uploadPhoto($id,$logicalAddress,$photo);
}