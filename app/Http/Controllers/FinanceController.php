<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;

class FinanceController extends Controller
{

    public function index()
    {
        // Load users with the "Cliente" role and their associated clients and contracts
        $clients = User::with(['client.contracts']) 
                    ->whereHas('roles', function ($query) {
                        $query->where('id', 4); // Only users with role 'Cliente'
                    })->get();

        return view('pages.finances.index', compact('clients'));
    }


    public function showContractsByClient($clientId)
    {
        $user = User::with('client.contracts.meter', 'client.contracts.status') 
                 ->where('id', $clientId)
                 ->whereHas('roles', function ($query) {
                     $query->where('id', 4); 
                 })
                 ->firstOrFail();

        $contracts = $user->client ? $user->client->contracts : collect(); 
        return view('pages.finances.showContractsByClient', compact('user', 'contracts'));
    }

    public function showContractDetails($contractId)
    {
        $contract = Contract::with(['client', 'meter']) // Assuming 'client' and 'meter' relationships
                    ->findOrFail($contractId);

        return view('pages.finances.showContractDetails', compact('contract'));
    }




    /*public function show($contractId)
    {
        $contract = Contract::with('commission')->findOrFail($contractId);

        $totalPaidToCVC = $contract->commission->cvc_paid_amount + $contract->commission->energy_cvc_paid_amount;

        $totalPaidToAdministrators = $contract->commission->administrator_paid_amount + $contract->commission->refund_administrator_paid_amount;
        $totalPaidToCommercials = $contract->commission->commercial_paid_amount + $contract->commission->refund_commercial_paid_amount;

        $companyProfit = $totalPaidToCVC - ($totalPaidToAdministrators + $totalPaidToCommercials);

        return view('pages.finances.show', compact('contract', 'totalPaidToCVC', 'totalPaidToAdministrators', 'totalPaidToCommercials', 'companyProfit'));
    }


        public function showContractsByClient($clientId)
        {
            //dd($clientId); // This will show you the ID being passed

            $client = User::with('client.contracts.meter')
                ->whereHas('roles', function ($query) {
                    $query->where('id', 4); // Ensure the user has the "Cliente" role
                })
                ->findOrFail($clientId);

            return view('pages.finances.showContractsByClient', compact('client'));
        }

*/
}
