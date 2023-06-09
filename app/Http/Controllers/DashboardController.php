<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {

        $contracts = Contract::with('client')->paginate();
        $contractsCount = Contract::all()->count();

        $clients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->count();

        $countTerminatingContracts = 0;

        $nextMonth = (new DateTime())->add(new DateInterval('P1M'))->format('Y-m-d');
        // $currentDate = new DateTime();

        foreach ($contracts as $contract) {
            if ($contract->renewal_at !== null) {
                if ($contract->renewal_at <= $nextMonth === 0) {
                    $contract->is_finishing = 'A terminar';
                    $countTerminatingContracts++;
                } else {
                    $contract->is_finishing = 'Normal';
                }
            } else {
                $contract->is_finishing = 'Normal';
            }
        }

        // $contractsFinishing = Contract::where('renewal_at', '>=', date("Y-m-d", strtotime("+1 month", strtotime((new DateTime())->add(new DateInterval('P1M'))->format('Y-m-d')))))->count();
        $contractsFinishing = Contract::where('renewal_at', '<=', $nextMonth)->where('renewal_at', '>=', new DateTime())->count();

        return view('dashboard', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
            'contractsFinishing' => $contractsFinishing,
            'clientsCount' => $clients
        ]);
    }
}
