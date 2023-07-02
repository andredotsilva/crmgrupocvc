<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreContractRequest;
use App\Models\Category;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\Commission;
use App\Models\DocumentationStatus;
use App\Models\File;
use App\Models\Meter;
use App\Models\MonthlyCommission;
use App\Models\Note;
use App\Models\User;
use App\Models\Contract;
use App\Models\District;
use App\Models\DocumentStatus;
use App\Models\InvoiceType;
use App\Models\MailingAddress;
use App\Models\Plan;
use App\Models\Tariff;
use App\Models\Provider;
use App\Models\Service;
use App\Models\TemporaryFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DateInterval;
use DateTime;

class ContractsController extends Controller
{
    //
    public function index(Request $request)
    {
        $statuses = DocumentationStatus::all();
        $contractsCount = Contract::count();

        $contracts = Contract::with(['meter.tariff', 'client', 'documentation'])
            ->when($request->filled('nif'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('nif', 'like', '%' . $request->input('nif') . '%');
                });
            })
            ->when($request->filled('year'), function ($query) use ($request) {
                // $year = $request->input('year');
                return $query->whereRaw("YEAR(effective_at) = ?", $request->input('year'));
            })

            ->when($request->filled('cpe'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('cpe', 'like', '%' . $request->input('cpe') . '%');
                });
            })
            ->when($request->filled('status_id'), function ($query) use ($request) {
                return $query->where('documentation_status_id', $request->input('status_id'));
            })
            ->select('*', DB::raw('IF(DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE() AND DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE(), 1, 0) AS status'))
            ->paginate(20);


        $contratos = Contract::where(function ($query) {
            $query->whereRaw("DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE()")
                ->whereRaw("DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE()");
        })
            ->count();


        return view('pages.contracts.index', [
            'contracts' => $contracts,
            'statuses' => $statuses,
            'contractsCount' => $contractsCount,
            'contractsExpiringCount' => $contratos
        ]);
    }

    public function create()
    {

        $tariffs = Tariff::all();
        $districts = District::all();
        $clientTypes = ClientType::all();
        $commercials = User::whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->get();
        $backofficers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
        $providers = Provider::all();
        $services = Service::all();
        $categories = Category::all();
        $plans = Plan::all();
        $documentationStatus = DocumentationStatus::all();
        $invoiceTypes = InvoiceType::all();

        return view('pages.contracts.create', [
            'tariffs' => $tariffs,
            'districts' => $districts,
            'clientTypes' => $clientTypes,
            'commercials' => $commercials,
            'providers' => $providers,
            'backofficers' => $backofficers,
            'services' => $services,
            'categories' => $categories,
            'plans' => $plans,
            'documentationStatus' => $documentationStatus,
            'invoiceTypes' => $invoiceTypes,
        ]);
    }
    public function store(StoreContractRequest $request)
    {
        $districtId = ($request->input('district_id') !== 'Selecionar Distrito')
            ? $request->input('district_id')
            : null;

        $mailDistrictId = ($request->input('mail_district_id') !== 'Selecionar Distrito')
            ? $request->input('mail_district_id')
            : null;

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = 'adwkweqnqkne213352sddas';
        $user->save();

        $commission = new Commission();
        $commission->administrator_paid_amount = $this->formatarNumero($request->administrator_paid_amount);
        $commission->commercial_paid_amount = $this->formatarNumero($request->commercial_paid_amount);
        $commission->cvc_paid_amount =  $this->formatarNumero($request->cvc_paid_amount);

        $commission->cvc_payment_date = $request->cvc_payment_date;
        $commission->administrator_payment_date = $request->administrator_payment_date;
        $commission->commercial_payment_date = $request->commercial_payment_date;

        $commission->refund_administrator_paid_amount = $this->formatarNumero($request->refund_administrator_paid_amount);
        $commission->refund_cvc_paid_amount = $this->formatarNumero($request->refund_cvc_paid_amount);
        $commission->refund_commercial_paid_amount = $this->formatarNumero($request->refund_commercial_paid_amount);

        $commission->refund_commercial_payment_date = $request->refund_commercial_payment_date;
        $commission->refund_administrator_payment_date = $request->refund_administrator_payment_date;
        $commission->refund_cvc_payment_date = $request->refund_cvc_payment_date;

        $commission->save();

        $meter = new Meter();
        $meter->cpe = $request->cpe;
        $meter->power = $this->formatarNumero($request->power);
        $meter->nif = $request->nif;
        $meter->tariff_id = $request->tariff_id;
        $meter->flat = $request->flat;
        $meter->peak = $request->peak;
        $meter->standard = $request->standard;
        $meter->off_peak = $request->off_peak;
        $meter->super_off_peak = $request->super_off_peak;
        $meter->gas = $request->gas;
        $meter->save();

        $client = new Client();
        $client->cae = $request->cae;
        $client->administrator_name = $request->administrator_name;
        $client->condominium_administrator = $request->condominium_administrator;
        $client->name = $user->name;
        $client->address = $request->address;
        $client->floor = $request->floor;
        $client->door = $request->door;
        $client->post_code = $request->post_code;
        $client->dmp_code = $request->dmp_code;
        $client->parish_id = $request->parish_id;
        $client->municipality_id = $request->municipality_id;
        $client->district_id = $districtId;
        $client->user_id = $user->id;
        $client->save();

        $contract = new Contract();
        $contract->back_officer_id = $request->back_officer_id;
        $contract->commercial_id = $request->commercial_id;
        $contract->client_type_id = $request->client_type_id;
        $contract->service_id = $request->service_id;
        $contract->category_id = $request->category_id;
        $contract->provider_id = $request->provider_id;
        $contract->plan_id = $request->plan_id;
        $contract->documentation_status_id = $request->documentation_status_id;
        $contract->archive = $request->archive;
        $contract->client_id = $client->id;
        $contract->meter_id = $meter->id;
        $contract->commission_id = $commission->id;
        $contract->inserted_at = $request->inserted_at;
        $contract->signed_at = $request->signed_at;
        $contract->effective_at = $request->effective_at;
        $contract->renewal_at = $request->renewal_at;
        $contract->nib = $request->nib;
        $contract->invoice_type_id = $request->invoice_type_id;
        $contract->signatory_email = $request->signatory_email;
        $contract->signatory_phone = $request->signatory_phone;
        $contract->save();

        $mailingAddress = new MailingAddress();
        $mailingAddress->address = $request->mail_address;
        $mailingAddress->door = $request->mail_door;
        $mailingAddress->floor = $request->mail_floor;
        $mailingAddress->post_code = $request->mail_post_code;
        $mailingAddress->district_id = $mailDistrictId;
        $mailingAddress->municipality_id = $request->mail_municipality_id;
        $mailingAddress->parish_id = $request->mail_parish_id;
        $mailingAddress->email = $request->email;
        $mailingAddress->phone_number = $request->phone_number;
        $mailingAddress->nif = $request->mail_nif;
        $mailingAddress->client_id = $client->id;
        $mailingAddress->save();

        $monthlyComission = new MonthlyCommission();
        $monthlyComission->amount_01_12 = $this->formatarNumero($request->amount_01_12);
        $monthlyComission->amount_02_12 = $this->formatarNumero($request->amount_02_12);
        $monthlyComission->amount_03_12 = $this->formatarNumero($request->amount_03_12);
        $monthlyComission->amount_04_12 = $this->formatarNumero($request->amount_04_12);
        $monthlyComission->amount_05_12 = $this->formatarNumero($request->amount_05_12);
        $monthlyComission->amount_06_12 = $this->formatarNumero($request->amount_06_12);
        $monthlyComission->amount_07_12 = $this->formatarNumero($request->amount_07_12);
        $monthlyComission->amount_08_12 = $this->formatarNumero($request->amount_08_12);
        $monthlyComission->amount_09_12 = $this->formatarNumero($request->amount_09_12);
        $monthlyComission->amount_10_12 = $this->formatarNumero($request->amount_10_12);
        $monthlyComission->amount_11_12 = $this->formatarNumero($request->amount_11_12);
        $monthlyComission->amount_12_12 = $this->formatarNumero($request->amount_12_12);
        $monthlyComission->contract_id = $contract->id;
        $monthlyComission->save();


        $note = new Note();
        $note->text = $request->text;
        $note->contract_id = $contract->id;
        $note->back_officer_id = auth()->user()->id;
        $note->save();

        $temporaryImages = TemporaryFile::where('upload_by', auth()->id())->get();

        if ($request->filepond) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::copy('files/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->filename, 'files/' . $temporaryImage->folder . '/' . $temporaryImage->filename);

                $file = new File();

                $file->contract_id = $contract->id;
                $file->filename = $temporaryImage->filename;
                $file->original_name = 'as';
                $file->mime_type = 'mime_type';
                $file->path = $temporaryImage->folder . '/' . $temporaryImage->filename;

                $file->save();

                Storage::deleteDirectory('files/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete();
            }
        }
        return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    }

    function formatarNumero($numero)
    {
        $numero = str_replace(',', '.', $numero);
        $numeroSemEspacos = str_replace(' ', '', $numero);
        $numero_formatado = floatval($numeroSemEspacos);

        $numero_em_centimos = intval(str_replace('.', '', $numero_formatado * 100));

        return $numero_em_centimos;
    }

    public function show($id)
    {

        $roles = Auth::user()->roles;

        $columns = [];

        // foreach ($roles as $role) {
        //     if ($role->id === 1) { //Admin
        //         $columns = array_merge($columns, ['column1', 'column2']);
        //     } elseif ($role === 'manager') {
        //         $columns = array_merge($columns, ['column3', 'column4']);
        //     }
        //     // Adicione outras condições para outros papéis, se necessário
        // }


        $contract = Contract::with(
            [
                'backofficer',
                'commercial',
                // 'commercialName',
                'service',
                'category',
                'client.mailingAddress.district',
                'client.mailingAddress.municipality',
                'client.mailingAddress.parish',
                // 'solutions',
                'clientType',
                'provider',
                'documentation',
                // 'archive',
                'meter',
                'nif',
                'municipality',
                'district',
                'parish',
                'invoiceType',
                // 'commission' => function ($query) use ($columns) {
                //     $query->select($columns);
                // },
                'monthlyCommission',
                'mailingAddress'
            ]
        )->findOrFail($id);
        return view('pages.contracts.show', compact('contract'));
    }

    public function edit($id)
    {

        $contract = Contract::with(['files', 'meter', 'monthlyCommission', 'mailingAddress.district', 'mailingAddress.municipality', 'mailingAddress.parish', 'invoiceType'])->where('id', $id)->first();
        $contractsCount = Contract::count();

        $tariffs = Tariff::all();
        $districts = District::all();
        $clientTypes = ClientType::all();
        $commercials = User::whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->get();
        $backofficers = User::whereHas('roles', function ($query) {
            $query->where('role_id', 2);
        })->get();
        $providers = Provider::all();
        $services = Service::all();
        $categories = Category::all();
        $plans = Plan::all();
        $documentationStatus = DocumentationStatus::all();
        $invoiceTypes = InvoiceType::all();

        return view('pages.contracts.edit', [
            'contract' => $contract,
            'tariffs' => $tariffs,
            'districts' => $districts,
            'clientTypes' => $clientTypes,
            'commercials' => $commercials,
            'providers' => $providers,
            'backofficers' => $backofficers,
            'services' => $services,
            'categories' => $categories,
            'plans' => $plans,
            'contractsCount' => $contractsCount,
            'documentationStatus' => $documentationStatus,
            'invoiceTypes' => $invoiceTypes,
        ]);
    }

    public function update(Request $request, string $id)
    {

        try {
            $contract = Contract::findOrFail($id);
            $contract->back_officer_id = $request->back_officer_id;
            $contract->commercial_id = $request->commercial_id;
            $contract->client_type_id = $request->client_type_id;
            $contract->service_id = $request->service_id;
            $contract->category_id = $request->category_id;
            $contract->provider_id = $request->provider_id;
            $contract->plan_id = $request->plan_id;
            $contract->documentation_status_id = $request->documentation_status_id;
            $contract->archive = $request->archive;
            $contract->inserted_at = $request->inserted_at;
            $contract->signed_at = $request->signed_at;
            $contract->effective_at = $request->effective_at;
            $contract->renewal_at = $request->renewal_at;
            $contract->nib = $request->nib;
            $contract->invoice_type_id = $request->invoice_type_id;
            $contract->signatory_email = $request->signatory_email;
            $contract->signatory_phone = $request->signatory_phone;
            $contract->save();

            $meter = Meter::where('id', $contract->meter_id)->firstOrCreate();
            $meter->tariff_id = $request->tariff_id;
            $meter->nif = $request->nif;
            $meter->cpe = $request->cpe;
            $meter->power = $this->formatarNumero($request->power);
            $meter->flat = $request->flat;
            $meter->peak = $request->peak;
            $meter->standard = $request->standard;
            $meter->off_peak = $request->off_peak;
            $meter->super_off_peak = $request->super_off_peak;
            $meter->gas = $request->gas;
            $meter->save();

            $client = Client::where('id', $contract->client_id)->firstOrCreate();
            $client->cae = $request->cae;
            $client->administrator_name = $request->administrator_name;
            $client->condominium_administrator = $request->condominium_administrator;
            $client->name = $request->name;
            $client->address = $request->address;
            $client->door = $request->door;
            $client->floor = $request->floor;
            $client->post_code = $request->post_code;
            $client->dmp_code = $request->dmp_code;
            $client->parish_id = $request->parish_id;
            $client->municipality_id = $request->municipality_id;
            $client->district_id = $request->district_id;
            $client->save();

            $commission = Commission::where('id', $contract->commission_id)->firstOrCreate();
            $commission->administrator_paid_amount = $this->formatarNumero($request->administrator_paid_amount);
            $commission->commercial_paid_amount = $this->formatarNumero($request->commercial_paid_amount);
            $commission->cvc_paid_amount =  $this->formatarNumero($request->cvc_paid_amount);
            $commission->cvc_payment_date = $request->cvc_payment_date;
            $commission->administrator_payment_date = $request->administrator_payment_date;
            $commission->commercial_payment_date = $request->commercial_payment_date;
            $commission->refund_administrator_paid_amount = $this->formatarNumero($request->refund_administrator_paid_amount);
            $commission->refund_cvc_paid_amount = $this->formatarNumero($request->refund_cvc_paid_amount);
            $commission->refund_commercial_paid_amount = $this->formatarNumero($request->refund_commercial_paid_amount);
            $commission->refund_commercial_payment_date = $request->refund_commercial_payment_date;
            $commission->refund_administrator_payment_date = $request->refund_administrator_payment_date;
            $commission->refund_cvc_payment_date = $request->refund_cvc_payment_date;
            $commission->save();

            $mailingAddress = MailingAddress::where('client_id', $client->id)->firstOrCreate();
            $mailingAddress->address = $request->address;
            $mailingAddress->door = $request->door;
            $mailingAddress->post_code = $request->mail_post_code;
            $mailingAddress->district_id = $request->mail_district_id;
            $mailingAddress->municipality_id = $request->mail_municipality_id;
            $mailingAddress->parish_id = $request->mail_parish_id;
            $mailingAddress->email = $request->email;
            $mailingAddress->phone_number = $request->phone_number;
            $mailingAddress->nif = $request->nif;
            $mailingAddress->client_id = $client->id;
            $mailingAddress->save();

            $monthlyComission = MonthlyCommission::firstOrCreate(['contract_id' => $contract->id]);

            $monthlyComission->amount_01_12 = $this->formatarNumero($request->amount_01_12);
            $monthlyComission->amount_02_12 = $this->formatarNumero($request->amount_02_12);
            $monthlyComission->amount_03_12 = $this->formatarNumero($request->amount_03_12);
            $monthlyComission->amount_04_12 = $this->formatarNumero($request->amount_04_12);
            $monthlyComission->amount_05_12 = $this->formatarNumero($request->amount_05_12);
            $monthlyComission->amount_06_12 = $this->formatarNumero($request->amount_06_12);
            $monthlyComission->amount_07_12 = $this->formatarNumero($request->amount_07_12);
            $monthlyComission->amount_08_12 = $this->formatarNumero($request->amount_08_12);
            $monthlyComission->amount_09_12 = $this->formatarNumero($request->amount_09_12);
            $monthlyComission->amount_10_12 = $this->formatarNumero($request->amount_10_12);
            $monthlyComission->amount_11_12 = $this->formatarNumero($request->amount_11_12);
            $monthlyComission->amount_12_12 = $this->formatarNumero($request->amount_12_12);
            $monthlyComission->contract_id = $contract->id;
            $monthlyComission->save();

            $note = Note::where('contract_id', $contract->id)->firstOrCreate();
            $note->text = $request->text;
            $note->contract_id = $contract->id;
            $note->back_officer_id = auth()->user()->id;
            $note->save();

            $temporaryImages = TemporaryFile::where('upload_by', auth()->id())->get();

            if ($request->filepond) {
                foreach ($temporaryImages as $temporaryImage) {
                    Storage::copy('files/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->filename, 'files/' . $temporaryImage->folder . '/' . $temporaryImage->filename);

                    $file = new File();

                    $file->contract_id = $contract->id;
                    $file->filename = $temporaryImage->filename;
                    $file->original_name = '';
                    $file->mime_type = 'mime_type';
                    $file->path = $temporaryImage->folder . '/' . $temporaryImage->filename;

                    $file->save();

                    Storage::deleteDirectory('files/tmp/' . $temporaryImage->folder);
                    $temporaryImage->delete();
                }
            }
        } catch (\Exception $th) {
            dd($th);
        }

        return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    }
    public function download($id)
    {
        $userRoles = auth()->user()->roles;
        $allowedRoleIds = [1, 2, 3, 4];

        $intersect = false;

        foreach ($userRoles as $role) {
            if (in_array($role->id, $allowedRoleIds)) {
                $intersect = true;
                break;
            }
        }

        if ($intersect) {
            $file = File::findOrFail($id);
            return Storage::download('files/' . $file->path);
        }
    }

    public function delete($id)
    {
        $userRoles = auth()->user()->roles;
        $allowedRoleIds = [1, 2];

        $intersect = false;

        foreach ($userRoles as $role) {
            if (in_array($role->id, $allowedRoleIds)) {
                $intersect = true;
                break;
            }
        }

        if ($intersect && File::where('id', $id)->exists()) {
            $fileToDelete = File::where('id', $id)->first();

            $folder = explode('/', $fileToDelete->path);

            Storage::delete('files/' . $fileToDelete->path);

            // Verifique se a pasta está vazia antes de excluí-la
            $filesInFolder = Storage::files($folder[0]);
            if (empty($filesInFolder)) {
                Storage::deleteDirectory('files/' . $folder[0]);
            }

            $fileToDelete->delete();

            return response()->json(['message' => 'O arquivo foi apagado.']);
        } else {
            return response()->json(['message' => 'Não existe.']);
        }
    }

    public function fetchbycpe(Request $request)
    {
        $cpe = $request->query('cpe');

        $resultado = Contract::with(['meter', 'client'])
            ->whereHas('meter', function ($query) use ($cpe) {
                $query->where('cpe', $cpe);
            })
            ->get();

        if ($resultado->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($resultado);
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // dava erro por causa das chaves primaria e associações, solução by chatgpt (ver se é ok)
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contrato Apagado com sucesso!');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
