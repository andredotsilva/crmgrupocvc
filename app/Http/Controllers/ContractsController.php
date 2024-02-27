<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Http\Requests\StoreContractRequest;
use App\Models\Appliance;
use App\Models\CAE;
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
use App\Models\PowerBracket;
use App\Models\Tariff;
use App\Models\Provider;
use App\Models\RangeAppliance;
use App\Models\Service;
use App\Models\Status;
use App\Models\TechnicalAppliance;
use App\Models\TemporaryFile;
use App\Models\Typology;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Exports\ContractsExports;
use Maatwebsite\Excel\Facades\Excel;
use DateInterval;
use DateTime;

class ContractsController extends Controller
{
    //
    public function index(Request $request)
    {
        $statuses = Status::all();
        $contractsCount = Contract::count();

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



        $contractsExpiringCount = Contract::where(function ($query) {
            $query->whereRaw("DATE_ADD(effective_at, INTERVAL 11 MONTH) <= CURRENT_DATE()")
                ->whereRaw("DATE_ADD(effective_at, INTERVAL 1 YEAR) >= CURRENT_DATE()");
        })
            ->count();


        return view('pages.contracts.index', [
            'contracts' => $contracts,
            'statuses' => $statuses,
            'contractsCount' => $contractsCount,
            'contractsExpiringCount' => $contractsExpiringCount
        ]);
    }

    public function create()
    {
        $appliances = Appliance::all();
        $typologies = Typology::all();
        $technicalAppliances = TechnicalAppliance::all();
        $rangeAppliances = RangeAppliance::all();
        $tariffs = Tariff::all();
        $districts = District::all();
        $clientTypes = ClientType::all();
        $statuses = Status::all();

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
        $documentationStatuses = DocumentationStatus::all();
        $invoiceTypes = InvoiceType::all();
        $powerBrackets = PowerBracket::all();
        $caes = CAE::all();

        return view('pages.contracts.create', [
            'tariffs' => $tariffs,
            'districts' => $districts,
            'statuses' => $statuses,
            'clientTypes' => $clientTypes,
            'commercials' => $commercials,
            'providers' => $providers,
            'backofficers' => $backofficers,
            'services' => $services,
            'categories' => $categories,
            'plans' => $plans,
            'documentationStatus' => $documentationStatuses,
            'invoiceTypes' => $invoiceTypes,
            'powerBrackets' => $powerBrackets,
            'caes' => $caes,
            'appliances' => $appliances,
            'typologies' => $typologies,
            'rangeAppliances' => $rangeAppliances,
            'technicalAppliances' => $technicalAppliances

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

        $nif = $request->nif;

        $doesUserExists = Contract::with(['meter', 'client.user'])
            ->whereHas('meter', function ($query) use ($nif) {
                $query->where('nif', $nif);
            })
            ->first();

        if (!$doesUserExists) {
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = 'adwkweqnqkne213352sddas';
            $user->save();
        }

        $commission = new Commission();
        $commission->administrator_paid_amount = $this->formatarNumero($request->administrator_paid_amount);
        $commission->commercial_paid_amount = $this->formatarNumero($request->commercial_paid_amount);
        $commission->cvc_paid_amount =  $this->formatarNumero($request->cvc_paid_amount);
        $commission->energy_cvc_paid_amount =  $this->formatarNumero($request->energy_cvc_paid_amount);

        $commission->cvc_payment_date = $request->cvc_payment_date;
        $commission->administrator_payment_date = $request->administrator_payment_date;
        $commission->commercial_payment_date = $request->commercial_payment_date;
        $commission->energy_cvc_payment_date = $request->energy_cvc_payment_date;

        $commission->refund_administrator_paid_amount = $this->formatarNumero($request->refund_administrator_paid_amount);
        $commission->refund_cvc_paid_amount = $this->formatarNumero($request->refund_cvc_paid_amount);
        $commission->refund_commercial_paid_amount = $this->formatarNumero($request->refund_commercial_paid_amount);
        $commission->refund_energy_cvc_paid_amount = $this->formatarNumero($request->refund_energy_cvc_paid_amount);

        $commission->refund_commercial_payment_date = $request->refund_commercial_payment_date;
        $commission->refund_administrator_payment_date = $request->refund_administrator_payment_date;
        $commission->refund_cvc_payment_date = $request->refund_cvc_payment_date;
        $commission->refund_energy_cvc_payment_date = $request->refund_energy_cvc_payment_date;

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
        $meter->power_bracket_id = $request->power_bracket_id;
        $meter->power = $request->power;
        $meter->gas = $request->gas;
        $meter->fixed_price = $this->formatarNumero($request->fixed_price);
        $meter->energy_price = $this->formatarNumero($request->energy_price);
        $meter->save();

        $client = Client::firstOrCreate(['id' => $request->client_id]);
        $client->cae_id = $request->cae_id;
        $client->administrator_name = $request->administrator_name;
        $client->condominium_administrator = $request->condominium_administrator;
        // $client->name = $request->name;
        $client->name = $request->name;
        $client->address = $request->address;
        $client->floor = $request->floor;
        $client->door = $request->door;
        $client->post_code = $request->post_code;
        $client->dmp_code = $request->dmp_code;
        $client->parish_id = $request->parish_id;
        $client->municipality_id = $request->municipality_id;
        $client->district_id = $districtId;
        $client->user_id =  $doesUserExists->client->user->id ?? $user->id;
        $client->save();


        $contract = new Contract();
        $contract->back_officer_id = $request->back_officer_id;
        $contract->commercial_id = $request->commercial_id;
        $contract->client_type_id = $request->client_type_id;
        $contract->service_id = $request->service_id;
        $contract->category_id = $request->category_id;
        $contract->provider_id = $request->provider_id;
        $contract->plan_id = $request->plan_id;
        $contract->archive = $request->archive;
        $contract->client_id = $client->id;
        $contract->meter_id = $meter->id;
        $contract->status_id = $request->status_id;
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

        $contract->documentation()->attach($request->documentationStatuses);

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
        $mailingAddress->contract_id = $contract->id;
        $mailingAddress->save();

        $monthlyComission = new MonthlyCommission();
        $monthlyComission->amount_01_12 = $this->formatarNumero($request->amount_01_12);
        $monthlyComission->date_01_12 = $request->date_01_12;
        $monthlyComission->amount_02_12 = $this->formatarNumero($request->amount_02_12);
        $monthlyComission->date_02_12 = $request->date_02_12;
        $monthlyComission->amount_03_12 = $this->formatarNumero($request->amount_03_12);
        $monthlyComission->date_03_12 = $request->date_03_12;
        $monthlyComission->amount_04_12 = $this->formatarNumero($request->amount_04_12);
        $monthlyComission->date_04_12 = $request->date_04_12;
        $monthlyComission->amount_05_12 = $this->formatarNumero($request->amount_05_12);
        $monthlyComission->date_05_12 = $request->date_05_12;
        $monthlyComission->amount_06_12 = $this->formatarNumero($request->amount_06_12);
        $monthlyComission->date_06_12 = $request->date_06_12;
        $monthlyComission->amount_07_12 = $this->formatarNumero($request->amount_07_12);
        $monthlyComission->date_07_12 = $request->date_07_12;
        $monthlyComission->amount_08_12 = $this->formatarNumero($request->amount_08_12);
        $monthlyComission->date_08_12 = $request->date_08_12;
        $monthlyComission->amount_09_12 = $this->formatarNumero($request->amount_09_12);
        $monthlyComission->date_09_12 = $request->date_09_12;
        $monthlyComission->amount_10_12 = $this->formatarNumero($request->amount_10_12);
        $monthlyComission->date_10_12 = $request->date_10_12;
        $monthlyComission->amount_11_12 = $this->formatarNumero($request->amount_11_12);
        $monthlyComission->date_11_12 = $request->date_11_12;
        $monthlyComission->amount_12_12 = $this->formatarNumero($request->amount_12_12);
        $monthlyComission->date_12_12 = $request->date_12_12;

        $monthlyComission->contract_id = $contract->id;
        $monthlyComission->save();

        $contract->appliances()->attach($request->appliance_id);
        $contract->typologies()->attach($request->typology_id);
        $contract->rangeAppliances()->attach($request->range_appliance_id);
        $contract->technicalAppliances()->attach($request->technical_appliance_id);

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

        // $roles = Auth::user()->roles;
        $contract = Contract::with(
            [
                'backofficer',
                'mailingAddress',
                'commercial',
                'service',
                'category',
                'client.district',
                'client.municipality',
                'client.parish',
                'clientType',
                'provider',
                'documentation',
                'statuses',
                'meter.powerbracket',
                'nif',
                'municipality',
                'district',
                'parish',
                'invoiceType',
                'commission',
                'monthlyCommission',
                'mailingAddress',
                'mailingAddress.district',
                'mailingAddress.municipality',
                'mailingAddress.parish',
                'notes'
            ]
        )->where('id', $id)->first();

        return view('pages.contracts.show', compact('contract'));
    }

    public function edit($id)
    {

        $contract = Contract::with(['files', 'meter', 'monthlyCommission', 'mailingAddress', 'mailingAddress.district', 'mailingAddress.municipality', 'mailingAddress.parish', 'invoiceType', 'documentation', 'client.municipality'])->where('id', $id)->first();
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
        $statuses = Status::all();
        $invoiceTypes = InvoiceType::all();
        $powerBrackets = PowerBracket::all();

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
            'statuses' => $statuses,
            'invoiceTypes' => $invoiceTypes,
            'powerBrackets' => $powerBrackets
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
            $meter->fixed_price = $this->formatarNumero($request->fixed_price);
            $meter->energy_price = $this->formatarNumero($request->energy_price);
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
            $commission->energy_cvc_paid_amount =  $this->formatarNumero($request->energy_cvc_paid_amount);
            $commission->cvc_payment_date = $request->cvc_payment_date;
            $commission->administrator_payment_date = $request->administrator_payment_date;
            $commission->commercial_payment_date = $request->commercial_payment_date;
            $commission->energy_cvc_payment_date = $request->energy_cvc_payment_date;
            $commission->refund_administrator_paid_amount = $this->formatarNumero($request->refund_administrator_paid_amount);
            $commission->refund_cvc_paid_amount = $this->formatarNumero($request->refund_cvc_paid_amount);
            $commission->refund_commercial_paid_amount = $this->formatarNumero($request->refund_commercial_paid_amount);
            $commission->refund_energy_cvc_paid_amount = $this->formatarNumero($request->refund_energy_cvc_paid_amount);
            $commission->refund_commercial_payment_date = $request->refund_commercial_payment_date;
            $commission->refund_administrator_payment_date = $request->refund_administrator_payment_date;
            $commission->refund_cvc_payment_date = $request->refund_cvc_payment_date;
            $commission->refund_energy_cvc_payment_date = $request->refund_energy_cvc_payment_date;
            $commission->save();

            $mailingAddress = MailingAddress::where('contract_id', $contract->id)->firstOrCreate();
            $mailingAddress->address = $request->mail_address;
            // $mailingAddress->floor = $request->floor;
            $mailingAddress->door = $request->mail_door;
            $mailingAddress->post_code = $request->mail_post_code;
            $mailingAddress->district_id = $request->mail_district_id;
            $mailingAddress->municipality_id = $request->mail_municipality_id;
            $mailingAddress->parish_id = $request->mail_parish_id;
            $mailingAddress->email = $request->email;
            $mailingAddress->phone_number = $request->phone_number;
            $mailingAddress->nif = $request->nif;

            $mailingAddress->contract_id = $contract->id;
            $mailingAddress->client_id = $client->id;
            $mailingAddress->save();

            $monthlyComission = MonthlyCommission::firstOrCreate(['contract_id' => $contract->id]);

            $monthlyComission->amount_01_12 = $this->formatarNumero($request->amount_01_12);
            $monthlyComission->date_01_12 = $request->date_01_12;
            $monthlyComission->amount_02_12 = $this->formatarNumero($request->amount_02_12);
            $monthlyComission->date_02_12 = $request->date_02_12;
            $monthlyComission->amount_03_12 = $this->formatarNumero($request->amount_03_12);
            $monthlyComission->date_03_12 = $request->date_03_12;
            $monthlyComission->amount_04_12 = $this->formatarNumero($request->amount_04_12);
            $monthlyComission->date_04_12 = $request->date_04_12;
            $monthlyComission->amount_05_12 = $this->formatarNumero($request->amount_05_12);
            $monthlyComission->date_05_12 = $request->date_05_12;
            $monthlyComission->amount_06_12 = $this->formatarNumero($request->amount_06_12);
            $monthlyComission->date_06_12 = $request->date_06_12;
            $monthlyComission->amount_07_12 = $this->formatarNumero($request->amount_07_12);
            $monthlyComission->date_07_12 = $request->date_07_12;
            $monthlyComission->amount_08_12 = $this->formatarNumero($request->amount_08_12);
            $monthlyComission->date_08_12 = $request->date_08_12;
            $monthlyComission->amount_09_12 = $this->formatarNumero($request->amount_09_12);
            $monthlyComission->date_09_12 = $request->date_09_12;
            $monthlyComission->amount_10_12 = $this->formatarNumero($request->amount_10_12);
            $monthlyComission->date_10_12 = $request->date_10_12;
            $monthlyComission->amount_11_12 = $this->formatarNumero($request->amount_11_12);
            $monthlyComission->date_11_12 = $request->date_11_12;
            $monthlyComission->amount_12_12 = $this->formatarNumero($request->amount_12_12);
            $monthlyComission->date_12_12 = $request->date_12_12;
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
        }

        return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    }

    public function renew($id)
    {

        $contract = Contract::where('id', $id)->first();

        $newContract = $contract->replicate();

        $newContract->signed_at = date('Y-m-d');
        $newContract->effective_at = date('Y-m-d', strtotime($contract->effective_at . ' + 1 year'));

        $newContract->save();

        return redirect()->route('contracts.index')->with('success', 'Contrato renovado com sucesso!');
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
        $nif = $request->query('nif');

        $resultado = Contract::with(['meter', 'client.district', 'client.municipality', 'client.parish'])
            ->whereHas('meter', function ($query) use ($nif) {
                $query->where('nif', $nif);
            })
            ->get();

        if ($resultado->isEmpty()) {
            return response()->json(null);
        }

        return response()->json($resultado);
    }

    public function export(Request $request)
    {

        $contracts = Contract::with([
            'commercial',
            'service',
            'category', 'meter.powerbracket', 'client.caee', 'client.district', 'client.municipality', 'client.parish', 'notes', 'statuses'
        ])
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
            })->get();

        $filteredData = $contracts->map(function ($contract) {
            // dd($contract->client);
            return [
                'bo' => $contract->backofficer->name ?? '',
                'commercial' => $contract->commercial->name ?? '',
                'service' => $contract->service->title ?? '',
                'category' => $contract->category->title ?? '',
                'client_type' => $contract->clientType->title ?? '',
                'client' => $contract->client->administrator_name,
                'administracao' => $contract->client->condominium_administrator,
                'adesao' => $contract->provider->title ?? '',
                'campanha' => $contract->plan->title ?? '',
                'arquivo' => $contract->archive,
                'tensao' => $contract->nif->powerbracket->title ?? '',
                'nif' => $contract->nif->nif,
                'cpe' => $contract->nif->cpe,
                'potencia' => $contract->nif->power,
                'simples' => $contract->nif->flat,
                'pontas' => $contract->nif->peak,
                'cheias' => $contract->nif->standard,
                'vazio' => $contract->nif->off_peak,
                'super_vazio' => $contract->nif->super_off_peak,
                'inserido' => $contract->inserted_at ?? '',
                'assinado' => $contract->signed_at ?? '',
                'efetivo' => $contract->effective_at ?? '',
                'renovacao' => $contract->renewal_at ?? '',
                'cae' => $contract->client->caee ? $contract->client->caee->code : '',
                'nome' => $contract->client->name ?? '',
                'morada' => $contract->client->address ?? '',
                'porta' => $contract->client->door ?? '',
                'andar' => $contract->client->floor ?? '',
                'codigo_postal' => $contract->client->post_code ?? '',
                'codigo_dmp' => $contract->client->dmp_code,
                'freguesia' => $contract->client->parish->title ?? '',
                'municipality' => $contract->client->municipality->title ?? '',
                'district' => $contract->client->district->title ?? '',
                'nib' => $contract->nib ?? '',
                'tipo_fatura' => $contract->invoiceType->title ?? '',
                'morada' => $contract->mailingAddress->address ?? '',
                'porta' => $contract->mailingAddress->door ?? '',
                'codigo_postal' => $contract->mailingAddress->post_code ?? '',
                'freguesia' => $contract->mailingAddress->parish->title ?? '',
                'municipality' => $contract->mailingAddress->municipality->title ?? '',
                'district' => $contract->mailingAddress->district->title ?? '',
                'email' => $contract->mailingAddress->email ?? '',
                'telefone' => $contract->mailingAddress->phone_number ?? '',
                'nif' => $contract->mailingAddress->nif ?? '',
                'email' => $contract->signatory_email ?? '',
                'telefone' => $contract->signatory_phone ?? '',
                'comissao_administrador' => $contract->commission->administrator_paid_amount ?? '',
                'data_comissao_administrador' => $contract->commission->administrator_payment_date ?? '',
                'comissao_comercial' => $contract->commission->commercial_paid_amount ?? '',
                'data_comissao_comercial' => $contract->commission->commercial_payment_date ?? '',
                'status' => $contract->statuses->title ?? '',
                'status_title' => $contract->status_title ?? '',
            ];
        });

        return Excel::download(new ContractsExports($filteredData), 'contracts.xlsx');
    }

    public function destroy($id)
    {
        $contract = Contract::findOrFail($id);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        // dava erro por causa das chaves primaria e associações, solução by chatgpt (ver se é ok)
        // diogo: não esta ok ahah temos de ver isso
        $contract->delete();
        return redirect()->route('contracts.index')->with('success', 'Contrato Apagado com sucesso!');

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
