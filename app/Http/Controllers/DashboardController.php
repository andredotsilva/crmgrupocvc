<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use Date;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $contracts = Contract::with('client')->paginate();
        $testeee = Contract::all();

        $contractsCount = Contract::count();

        $clientsCount = User::whereHas('roles', function ($query) {
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
                $contract->status = 1;
                // $contractsFinishing++;
            } else {
                $contract->status = 0;
            }
        }

        foreach ($testeee as $contract) {
            $effectiveAt = new DateTime($contract->effective_at);
            $dangerousDate = $effectiveAt->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'));

            $dataFim = clone $effectiveAt;
            $dataFim->add(new DateInterval('P12M'));

            $today = new DateTime();

            if (($today >= $dangerousDate && $today <= $dataFim)) {
                $contractsFinishing++;
            }
        }


        return view('dashboard', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
            'contractsFinishing' => $contractsFinishing,
            'clientsCount' => $clientsCount,
        ]);
    }
}
