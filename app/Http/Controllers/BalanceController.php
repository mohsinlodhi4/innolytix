<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scottlaurent\Accounting\Models\Ledger;
use DB;

class BalanceController extends Controller
{
    public function trialbalance(Request $request){
        $conditions = [];
        if ($request->has('dateFrom') || $request->has('dateTo')) {
            $dateFrom = $request->input('dateFrom') != null ? $request->input('dateFrom') : false;
            $dateTo = $request->input('dateTo') != null ? $request->input('dateTo') : false;
            if ($dateFrom) {
                $conditions[] = ['post_date', '>=', date('Y-m-d', strtotime($dateFrom))];
            }
            if ($dateTo) {
                $conditions[] = ['post_date', '<=', date('Y-m-d', strtotime($dateTo))];
            }
        }

        $the_ledgers = Ledger::get();
        
        $summary = DB::table('accounting_journal_transactions as ajt')->join('accounting_journals as aj','ajt.journal_id','=','aj.id')
        ->join('accounts as a','aj.morphed_id','=','a.id')->groupBy('a.name')
        ->select(DB::raw('a.name, sum(ajt.debit) as debit, sum(ajt.credit) as credit'))->get();
        
        return view('reports.trialbalance',compact('the_ledgers', 'conditions','summary'));
    }
}
