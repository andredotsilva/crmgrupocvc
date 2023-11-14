<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\DocumentationStatus;
use App\Models\User;
use Date;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnergiagasController extends Controller
{
    public function index(Request $request)
    {

        $contracts = Contract::with('client')->paginate();
        $contractsCount = Contract::count();

        $statuses = DocumentationStatus::all();


        $clients = User::whereHas('roles', function ($query) {
            $query->where('role_id', 4);
        })->count();

        $contratos = Contract::whereHas('meter', function ($query) {
            $query->where('gas', '>=', 1);
        })->count();

        $gasContractsCount = Contract::whereHas('meter', function ($query) {
            $query->where('gas', '>=', 1);
        })->count();

        $contracts = Contract::with(['meter.tariff', 'client', 'notes', 'statuses'])
            ->when($request->filled('nif'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('nif', 'like', '%' . $request->input('nif') . '%');
                });
            })
            ->when($request->filled('year'), function ($query) use ($request) {
                return $query->whereRaw("YEAR(effective_at) = ?", $request->input('year'));
            })
            ->when($request->filled('cpe'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('cpe', 'like', '%' . $request->input('cpe') . '%');
                });
            })
            ->when($request->filled('status_id'), function ($query) use ($request) {
                $query->whereHas('statuses', function ($q) use ($request) {
                    $q->where('id', $request->input('status_id'));
                });
            })
            // ->when($request->filled('condominium_administrator'), function ($query) use ($request) {
            //     return $query->whereRaw("YEAR(effective_at) = ?", $request->input('year'));
            // })
            ->when($request->filled('administrator_name'), function ($query) use ($request) {
                // return $query->where('documentation_status_id', $request->input('condominium_administrator'));
                $query->whereHas('client', function ($q) use ($request) {
                    // $q->where('conduminium_administrator', $request->input('condominium_administrator'));
                    $q->where('administrator_name', 'like', '%' . $request->input('administrator_name') . '%');
                });
            })
            ->select('*', DB::raw('IF(DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE() AND DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE(), 1, 0) AS isFinishing'))
            ->paginate(20);


        return view('pages.energia.index', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount,
            'contractsFinishing' => $contratos,
            'gasContractsCount' => $gasContractsCount,
            'clientsCount' => $clients,
            'statuses' => $statuses
        ]);
    }
}
