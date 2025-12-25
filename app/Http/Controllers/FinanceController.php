<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FinanceController extends Controller
{
    /*public function index()
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
    }*/
    
    public function index()
    {
        // Count total contracts
        $contractsCount = Contract::count();
    
        // Get clients with the role 'Cliente' and their contracts count
        $clients = User::whereHas("roles", function ($query) {
            $query->where("role_id", 4); // Cliente role_id = 4
        })
            ->withCount(["contracts"]) // Count the number of contracts per client
            ->with("client") // Load client details
            ->get();
    
        // Fetch all contracts with their commissions and providers
        $contracts = Contract::with(['commission', 'provider'])->get();
    
        // Initialize the array for commissions by provider
        $commissionsByProvider = [];
    
        foreach ($contracts as $contract) {
            if ($contract->provider) {
                $providerId = $contract->provider->id;

                // Debug para ver os valores
                Log::info('Contract ID: ' . $contract->id);
                Log::info('CVC Amount: ' . ($contract->commission->cvc_paid_amount ?? 0));
                Log::info('Admin Amount: ' . ($contract->commission->administrator_paid_amount ?? 0));
                Log::info('Commercial Amount: ' . ($contract->commission->commercial_paid_amount ?? 0));

                // Initialize provider data if it doesn't exist
                if (!isset($commissionsByProvider[$providerId])) {
                    $commissionsByProvider[$providerId] = [
                        'name' => $contract->provider->acronym,
                        'totalPaidToCVC' => 0,
                        'totalPaidToAdministrators' => 0,
                        'totalPaidToCommercials' => 0,
                        'totalCompanyProfit' => 0,
                    ];
                }

                // Get the values
                $cvcAmount = $contract->commission->cvc_paid_amount ?? 0;
                $adminAmount = $contract->commission->administrator_paid_amount ?? 0;
                $commercialAmount = $contract->commission->commercial_paid_amount ?? 0;

                // Add to the totals
                $commissionsByProvider[$providerId]['totalPaidToCVC'] += $cvcAmount;
                $commissionsByProvider[$providerId]['totalPaidToAdministrators'] += $adminAmount;
                $commissionsByProvider[$providerId]['totalPaidToCommercials'] += $commercialAmount;

                // Calculate company profit: CVC amount - (admin + commercial)
                $commissionsByProvider[$providerId]['totalCompanyProfit'] = 
                    $commissionsByProvider[$providerId]['totalPaidToCVC'] - 
                    ($commissionsByProvider[$providerId]['totalPaidToAdministrators'] + 
                     $commissionsByProvider[$providerId]['totalPaidToCommercials']);
            }
        }
    
        // Pass the data to the view
        return view(
            "pages.finances.index",
            compact("clients", "contractsCount", "commissionsByProvider")
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
            $totalPaidToCVC += ($contract->commission->cvc_paid_amount - $contract->commission->energy_cvc_paid_amount);
            $totalPaidToAdministrators += ($contract->commission->administrator_paid_amount - $contract->commission->refund_administrator_paid_amount);
            $totalPaidToCommercials += ($contract->commission->commercial_paid_amount - $contract->commission->refund_commercial_paid_amount);

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

            $providerCVC = ($contract->commission->cvc_paid_amount - $contract->commission->energy_cvc_paid_amount);
            $providerAdmin = ($contract->commission->administrator_paid_amount - $contract->commission->refund_administrator_paid_amount);
            $providerCommercial = ($contract->commission->commercial_paid_amount - $contract->commission->refund_commercial_paid_amount);

            $commissionsByProvider[$providerId]['totalPaidToCVC'] += $providerCVC;
            $commissionsByProvider[$providerId]['totalPaidToAdministrators'] += $providerAdmin;
            $commissionsByProvider[$providerId]['totalPaidToCommercials'] += $providerCommercial;
            $commissionsByProvider[$providerId]['totalCompanyProfit'] = 
                $commissionsByProvider[$providerId]['totalPaidToCVC'] - 
                ($commissionsByProvider[$providerId]['totalPaidToAdministrators'] + 
                 $commissionsByProvider[$providerId]['totalPaidToCommercials']);
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
            ($contract->commission->cvc_paid_amount - $contract->commission->energy_cvc_paid_amount);

        $totalPaidToAdministrators = 
            ($contract->commission->administrator_paid_amount - $contract->commission->refund_administrator_paid_amount);

        $totalPaidToCommercials = 
            ($contract->commission->commercial_paid_amount - $contract->commission->refund_commercial_paid_amount);

        $companyProfit = 
            $totalPaidToCVC - ($totalPaidToAdministrators + $totalPaidToCommercials);

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
