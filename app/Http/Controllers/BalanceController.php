<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Scottlaurent\Accounting\Models\Ledger;

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
        return view('reports.trialbalance',compact('the_ledgers', 'conditions'));
    }
}
