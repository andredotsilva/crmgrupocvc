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
        $contractsCount = Contract::count();

        $clients = User::whereHas("roles", function ($query) {
            $query->where("role_id", 4); // Cliente role_id = 4
        })
            ->withCount(["contracts"]) // Conta o número de contratos
            ->with("client") // Carrega os detalhes do cliente
            ->get();

        return view(
            "pages.finances.index",
            compact("clients", "contractsCount")
        );
    }

    /*public function showContractsByClient($clientId)
    {
        $user = User::with('client.contracts.meter', 'client.contracts.status')
                 ->where('id', $clientId)
                 ->whereHas('roles', function ($query) {
                     $query->where('id', 4);
                 })
                 ->firstOrFail();

        $contracts = $user->client ? $user->client->contracts : collect();
        return view('pages.finances.showContractsByClient', compact('user', 'contracts'));
    }*/

    public function showContractsByClient($id)
    {
        $contracts = Contract::with(['client.user', 'commission', 'provider'])
            ->whereHas('client.user', function ($query) use ($id) {
                $query->where('id', $id);
            })
            ->get();

        $user = User::with([
            'roles',
            'client',
            'client.contracts.provider',
            'client.district',
            'client.municipality',
            'client.parish',
        ])
            ->where('id', $id)
            ->first();

        $contractsByNif = $contracts->groupBy(function ($contract) {
            return $contract->client->nif;
        });

        // todos os contratos
        $totalPaidToCVC = 0;
        $totalPaidToAdministrators = 0;
        $totalPaidToCommercials = 0;
        $totalCompanyProfit = 0;

        // juntar comissoes pelo provider 
        $commissionsByProvider = [];

        foreach ($contracts as $contract) {
            $totalPaidToCVC += $contract->commission->cvc_paid_amount + $contract->commission->energy_cvc_paid_amount;
            $totalPaidToAdministrators += $contract->commission->administrator_paid_amount + $contract->commission->refund_administrator_paid_amount;
            $totalPaidToCommercials += $contract->commission->commercial_paid_amount + $contract->commission->refund_commercial_paid_amount;

            $providerId = $contract->provider_id;
            if (!isset($commissionsByProvider[$providerId])) {
                $commissionsByProvider[$providerId] = [
                    'name' => $contract->provider->acronym,
                    'totalPaidToCVC' => 0,
                    'totalPaidToAdministrators' => 0,
                    'totalPaidToCommercials' => 0,
                    'totalCompanyProfit' => 0,
                ];
            }

            $commissionsByProvider[$providerId]['totalPaidToCVC'] += $contract->commission->cvc_paid_amount + $contract->commission->energy_cvc_paid_amount;
            $commissionsByProvider[$providerId]['totalPaidToAdministrators'] += $contract->commission->administrator_paid_amount + $contract->commission->refund_administrator_paid_amount;
            $commissionsByProvider[$providerId]['totalPaidToCommercials'] += $contract->commission->commercial_paid_amount + $contract->commission->refund_commercial_paid_amount;
        }

        $totalCompanyProfit = $totalPaidToCVC - ($totalPaidToAdministrators + $totalPaidToCommercials);

        //lucro por provider
        foreach ($commissionsByProvider as &$providerData) {
            $providerData['totalCompanyProfit'] = $providerData['totalPaidToCVC'] - ($providerData['totalPaidToAdministrators'] + $providerData['totalPaidToCommercials']);
        }



        return view('pages.finances.showContractsByClient', [
            'user' => $user,
            'contracts' => $contracts,
            'contractsByNif' => $contractsByNif,
            'totalPaidToCVC' => $totalPaidToCVC,
            'totalPaidToAdministrators' => $totalPaidToAdministrators,
            'totalPaidToCommercials' => $totalPaidToCommercials,
            'totalCompanyProfit' => $totalCompanyProfit,
            'commissionsByProvider' => $commissionsByProvider,
        ]);
    }

    public function showContractDetails($contractId)
    {
        $contract = Contract::with("commission")->findOrFail($contractId);

        $totalPaidToCVC =
            $contract->commission->cvc_paid_amount +
            $contract->commission->energy_cvc_paid_amount;

        $totalPaidToAdministrators =
            $contract->commission->administrator_paid_amount +
            $contract->commission->refund_administrator_paid_amount;
        $totalPaidToCommercials =
            $contract->commission->commercial_paid_amount +
            $contract->commission->refund_commercial_paid_amount;

        $companyProfit =
            $totalPaidToCVC -
            ($totalPaidToAdministrators + $totalPaidToCommercials);

        

        return view(
            "pages.finances.showContractDetails",
            compact(
                "contract",
                "totalPaidToCVC",
                "totalPaidToAdministrators",
                "totalPaidToCommercials",
                "companyProfit"
            )
        );
    }
}