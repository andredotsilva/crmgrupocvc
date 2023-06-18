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
        $contractsCount = Contract::count();

        $clients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->count();

        $contractsFinishing = 0;
        foreach ($contracts as $contract) {
            $effectiveAt = new DateTime($contract->effective_at);
            $dangerousDate = $effectiveAt->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'));

            $dataFim = clone $effectiveAt;
            $dataFim->add(new DateInterval('P12M'));

            $today = new DateTime();

            if (($today >= $dangerousDate && $today <= $dataFim)) {
                $contractsFinishing++;
                $contract->status = 1;
            } else {
                $contract->status = 0;
            }
        }

        return view('dashboard', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
            'contractsFinishing' => $contractsFinishing,
            'clientsCount' => $clients,
        ]);
    }
}
