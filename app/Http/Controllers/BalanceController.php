<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scottlaurent\Accounting\Models\Ledger;

class BalanceController extends Controller
{
    public function trialbalance(){
        $the_ledgers = Ledger::get();
        return view('balance_sheets.trialbalance',compact('the_ledgers'));
    }
}
