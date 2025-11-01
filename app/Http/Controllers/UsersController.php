<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Contract;
use App\Models\Service;
use App\Models\Status;
use App\Models\Typology;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::all();

        $users = User::with(['roles'])
            ->when($request->filled('name'), function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->input('name') . '%');
            })
            ->when($request->filled('role_id'), function ($query) use ($request) {
                return $query->whereHas('roles', function ($query) use ($request) {
                    $query->where('id', $request->input('role_id'));
                });
            })->paginate(20);

        return view('pages.users.index', [
            'users' => $users,
            'roles' => $roles
        ]);
    }

    public function show(Request $request, User $user)
    {
        $user->load([
            'roles',
            'client',
            'client.district',
            'client.municipality',
            'client.parish',
        ]);

        $filters = [
            'status_id' => $request->integer('status_id'),
            'typology_id' => $request->integer('typology_id'),
            'service_id' => $request->integer('service_id'),
        ];

        $contractsQuery = Contract::query()
            ->with(['statuses', 'provider', 'service', 'commission', 'meter', 'typologies'])
            ->whereHas('client', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });

        if ($filters['status_id']) {
            $contractsQuery->where('status_id', $filters['status_id']);
        }

        if ($filters['service_id']) {
            $contractsQuery->where('service_id', $filters['service_id']);
        }

        if ($filters['typology_id']) {
            $contractsQuery->whereHas('typologies', function ($query) use ($filters) {
                $query->where('typologies.id', $filters['typology_id']);
            });
        }

        $contracts = $contractsQuery
            ->orderByDesc('updated_at')
            ->paginate(10)
            ->withQueryString();

        $baseContracts = Contract::query()
            ->whereHas('client', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });

        $totalContracts = (clone $baseContracts)->count();
        $activeContracts = (clone $baseContracts)
            ->whereHas('statuses', function ($query) {
                $query->where('title', 'Alta');
            })
            ->count();
        $expiringSoon = (clone $baseContracts)
            ->whereRaw("DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE()")
            ->whereRaw("DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE()")
            ->count();
        $lastYearNewContracts = (clone $baseContracts)
            ->whereBetween('created_at', [now()->subYear()->startOfDay(), now()->endOfDay()])
            ->count();

        $commissionQuery = (clone $baseContracts)
            ->leftJoin('commissions', 'contracts.commission_id', '=', 'commissions.id');
        $totalCvc = (float) (clone $commissionQuery)->sum('commissions.cvc_paid_amount');
        $totalAdministrators = (float) (clone $commissionQuery)->sum('commissions.administrator_paid_amount');
        $totalCommercials = (float) (clone $commissionQuery)->sum('commissions.commercial_paid_amount');
        $companyProfit = $totalCvc - ($totalAdministrators + $totalCommercials);

        $meterQuery = (clone $baseContracts)
            ->leftJoin('meters', 'contracts.meter_id', '=', 'meters.id');
        $totalPower = (float) (clone $meterQuery)->sum('meters.power');
        $avgEnergyPrice = (float) (clone $meterQuery)->avg('meters.energy_price');

        $statusBreakdown = (clone $baseContracts)
            ->leftJoin('statuses', 'contracts.status_id', '=', 'statuses.id')
            ->select(DB::raw("COALESCE(statuses.title, 'Sem estado') as label"), DB::raw('COUNT(contracts.id) as total'))
            ->groupBy('label')
            ->orderByDesc('total')
            ->get();

        $serviceBreakdown = (clone $baseContracts)
            ->leftJoin('services', 'contracts.service_id', '=', 'services.id')
            ->select(DB::raw("COALESCE(services.title, 'Sem serviço') as label"), DB::raw('COUNT(contracts.id) as total'))
            ->groupBy('label')
            ->orderByDesc('total')
            ->get();

        $typologyBreakdown = (clone $baseContracts)
            ->leftJoin('contract_typology', 'contracts.id', '=', 'contract_typology.contract_id')
            ->leftJoin('typologies', 'contract_typology.typology_id', '=', 'typologies.id')
            ->select(DB::raw("COALESCE(typologies.title, 'Sem tipologia') as label"), DB::raw('COUNT(DISTINCT contracts.id) as total'))
            ->groupBy('label')
            ->orderByDesc('total')
            ->get();

        $activities = Contract::query()
            ->with(['statuses', 'provider', 'meter'])
            ->whereHas('client', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            })
            ->orderByDesc('updated_at')
            ->limit(5)
            ->get();

        $summaryCards = [
            [
                'label' => 'Contratos totais',
                'value' => $totalContracts,
            ],
            [
                'label' => 'Contratos ativos',
                'value' => $activeContracts,
            ],
            [
                'label' => 'A expirar próximos 30 dias',
                'value' => $expiringSoon,
            ],
            [
                'label' => 'Novos últimos 12 meses',
                'value' => $lastYearNewContracts,
            ],
        ];

        $financialSummary = [
            'totalCvc' => $totalCvc,
            'totalAdministrators' => $totalAdministrators,
            'totalCommercials' => $totalCommercials,
            'companyProfit' => $companyProfit,
        ];

        $consumptionSummary = [
            'totalPower' => $totalPower,
            'averageEnergyPrice' => $avgEnergyPrice,
        ];

        $statuses = Status::orderBy('title')->get();
        $typologies = Typology::orderBy('title')->get();
        $services = Service::orderBy('title')->get();

        return view('pages.users.show', [
            'user' => $user,
            'contracts' => $contracts,
            'summaryCards' => $summaryCards,
            'financialSummary' => $financialSummary,
            'consumptionSummary' => $consumptionSummary,
            'statusBreakdown' => $statusBreakdown,
            'serviceBreakdown' => $serviceBreakdown,
            'typologyBreakdown' => $typologyBreakdown,
            'activities' => $activities,
            'statuses' => $statuses,
            'typologies' => $typologies,
            'services' => $services,
            'filters' => $filters,
        ]);
    }

    public function edit($id)
    {
        $user = User::with('roles')->where('id', $id)->first();
        $roles = Role::all();

        return view('pages.users.edit', compact(['user', 'roles']));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $roles = ($request->input('role') !== 'Escolher Roles')
            ? $request->input('role')
            : null;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->roles()->sync($roles);

        $user->save();

        return redirect()->route('users.show', $user->id);
    }

    public function fetchUserByCode($code)
    {
        $user = User::where('code', $code)->first();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('users.index')
            ->with('success', 'Kamar Theresia deleted successfully');
    }

    public function create()
    {
        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed'],
            'role' => ['required', 'exists:roles,id'] 
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $role = Role::find($request->role);
        $user->roles()->attach($role);

        return redirect()->route('users.index')
            ->with('success', 'Usuário criado com sucesso!');
    }

}
