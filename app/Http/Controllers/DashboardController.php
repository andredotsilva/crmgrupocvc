<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Date;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // $contracts = Contract::with('client')->paginate();

        $contractsCount = Contract::count();

        $clientsCount = User::whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->count();

        $contractsFinishing = Contract::where(function ($query) {
            $query->whereRaw("DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE()")
                ->whereRaw("DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE()");
        })->select('*', DB::raw('IF(DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE() AND DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE(), 1, 0) AS status'))
            ->get();

        $contractsFinishingCount = $contractsFinishing->count();

        $contracts = Contract::orderBy('updated_at', 'desc')->limit(20)->get();

        return view('dashboard', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
            'contractsFinishing' => $contractsFinishingCount,
            'clientsCount' => $clientsCount,
        ]);
    }
}
