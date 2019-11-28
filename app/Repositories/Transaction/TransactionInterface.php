
<?php 
namespace App\Repositories\Transaction;

interface TransactionInterface
{
    public function addTransaction($request,$tin);
    public function findTransactionByTxref($tin);
    public function allTransactions();
    public function findTransactionByLga($lga);
}