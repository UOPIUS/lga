
<?php 
namespace App\Repositories\Transaction;
use App\Repositories\Transaction\TransactionInterface;
use App\Transaction;
class TransactionRepository implements TransactionInterface
{
    public function addTransaction($request){

    	$transaction = new Transaction([
 			'tax_service' => $request->tax_service,
 			'tax_payer' => $request->tax_payer,
 			'amount' => $request->amount,
 			'gateway_used'=>$request->gateway_used,
 			'lga_id'=> $request->lga_id,
 			'collected_status'=> '0',
 			'created_by' => $request->created_by,
 			'txref' => $request->txref
    	]);

    }
    public function findTransactionByTxref($tin){

    }
    public function allTransactions(){

    }
    public function findTransactionByLga($lga){

    }
}