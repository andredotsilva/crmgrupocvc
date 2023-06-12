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


        foreach ($contracts as $contract) {
            $nextMonth = (new DateTime())->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'))->format('Y-m-d');
        }
        $nextMonth = (new DateTime())->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'))->format('Y-m-d');
        // dd($nextMonth);
        // $currentDate = new DateTime();

        // foreach ($contracts as $contract) {
        //     if ($contract->renewal_at !== null) {
        //         if ($contract->renewal_at <= $nextMonth === 0) {
        //             $contract->is_finishing = 'A terminar';
        //             $countTerminatingContracts++;
        //         } else {
        //             $contract->is_finishing = 'Normal';
        //         }
        //     } else {
        //         $contract->is_finishing = 'Normal';
        //     }
        // }
        $contractsFinishing = 0;
        foreach ($contracts as $contract) {
            $dataEfetivacao = new DateTime($contract->effective_at);
            $dataInicio = $dataEfetivacao->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'));
            // dd($dataInicio);
            $dataFim = clone $dataEfetivacao;
            $dataFim->add(new DateInterval('P12M'));

            $hoje = new DateTime();
            // dd([$dataEfetivacao, $dataInicio, $dataFim, $hoje]);
            // dd(($hoje >= $dataInicio && $hoje <= $dataFim));
            if (($hoje >= $dataInicio && $hoje <= $dataFim)) {
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
