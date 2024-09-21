<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class FinanceController extends Controller
{
    // This method handles the finances index view, listing contracts
    public function index(Request $request)
    {
        // Fetch all contracts for displaying in the table
        $contracts = Contract::select('id', 'client_id', 'signed_at') // Add other fields you need
            ->with('client') // Assuming there is a client relationship
            ->get();

        return view('pages.finances.index', compact('contracts')); // Render contracts list view
    }

    // This method handles displaying financial details for a specific contract
    /*public function show($contractId)
    {
        // Fetch the specific contract with its financial data (commission)
        $contract = Contract::with('commission')->findOrFail($contractId);

        return view('pages.finances.show', compact('contract')); // Render finances view for the selected contract
    }*/

    public function show($contractId)
    {
        // Fetch the specific contract with its financial data
        $contract = Contract::with('commission')->findOrFail($contractId);

        // Calculate the sum of commissions paid to CVC
        $totalPaidToCVC = $contract->commission->cvc_paid_amount + $contract->commission->energy_cvc_paid_amount;

        // Calculate what the CVC pays to administrators and sales representatives
        $totalPaidToAdministrators = $contract->commission->administrator_paid_amount + $contract->commission->refund_administrator_paid_amount;
        $totalPaidToCommercials = $contract->commission->commercial_paid_amount + $contract->commission->refund_commercial_paid_amount;

        // Calculate company profit (amount paid by CVC minus amounts paid to administrators and commercials)
        $companyProfit = $totalPaidToCVC - ($totalPaidToAdministrators + $totalPaidToCommercials);

        return view('pages.finances.show', compact('contract', 'totalPaidToCVC', 'totalPaidToAdministrators', 'totalPaidToCommercials', 'companyProfit'));
    }

}
