<?php

namespace App\Http\Controllers;

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
        $contracts = Contract::with(['meter.tariff', 'client'])
            ->when($request->filled('nif'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('nif', 'like', '%' . $request->input('nif') . '%');
                });
            })
            ->when($request->filled('year'), function ($query) use ($request) {
                return $query->where('effective_at', $request->input('year'));
            })
            ->when($request->filled('cpe'), function ($query) use ($request) {
                $query->whereHas('meter', function ($q) use ($request) {
                    $q->where('cpe', 'like', '%' . $request->input('cpe') . '%');
                });
            })
            ->paginate(10);

        $contractsExpiringCount = 0;
        foreach ($contracts as $contract) {
            $effective_at = new DateTime($contract->effective_at);
            $oneMonthFromExpiring = $effective_at->add(new DateInterval('P1Y'))->sub(new DateInterval('P1M'));
            $expiringDate = clone $effective_at;
            $expiringDate->add(new DateInterval('P12M'));

            $today = new DateTime();

            if (($today >= $oneMonthFromExpiring && $today <= $expiringDate)) {
                $contractsExpiringCount++;
                $contract->status = 1;
            } else {
                $contract->status = 0;
            }
        }

        return view('pages.contracts.index', [
            'contracts' => $contracts,
            'contractsCount' => $contractsExpiringCount
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

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = 'adwkweqnqkne213352sddas';

        $user->save();

        $commission = new Commission();

        $commission->cvc_paid_amount =  $this->formatarNumero($request->cvc_paid_amount);
        $commission->administrator_paid_amount = $this->formatarNumero($request->administrator_paid_amount);
        $commission->commercial_paid_amount = $this->formatarNumero($request->commercial_paid_amount);

        $commission->cvc_payment_date = $request->cvc_payment_date;
        $commission->administrator_payment_date = $request->administrator_payment_date;
        $commission->commercial_payment_date = $request->commercial_payment_date;

        $commission->save();

        $meter = new Meter();
        $meter->cpe = $request->cpe;
        $meter->power = $request->power;
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
        $client->post_code = $request->post_code;
        $client->dmp_code = $request->dmp_code;
        $client->parish_id = $request->parish_id;
        $client->municipality_id = $request->municipality_id;
        $client->district_id = $request->district_id;

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

        $mailingAddress->address = $request->address;
        $mailingAddress->door = $request->door;
        $mailingAddress->post_code = $request->mail_post_code;

        // $mailingAddress->parish_id = $request->mail_parish_id;
        $mailingAddress->parish_id = 1;

        // $mailingAddress->municipality_id = $request->mail_municipality_id;
        $mailingAddress->municipality_id = 1;

        // $mailingAddress->district_id = $request->mail_district_id;
        $mailingAddress->district_id = 1;

        $mailingAddress->email = $request->email;
        $mailingAddress->phone_number = $request->phone_number;
        $mailingAddress->nif = $request->nif;

        $mailingAddress->client_id = $client->id;

        $mailingAddress->save();


        $monthlyComission = new MonthlyCommission();

        $monthlyComission->amount_01_12 = $request->amount_01_12;
        $monthlyComission->amount_02_12 = $request->amount_02_12;
        $monthlyComission->amount_03_12 = $request->amount_03_12;
        $monthlyComission->amount_04_12 = $request->amount_04_12;
        $monthlyComission->amount_05_12 = $request->amount_05_12;
        $monthlyComission->amount_06_12 = $request->amount_06_12;
        $monthlyComission->amount_07_12 = $request->amount_07_12;
        $monthlyComission->amount_08_12 = $request->amount_08_12;
        $monthlyComission->amount_09_12 = $request->amount_09_12;
        $monthlyComission->amount_10_12 = $request->amount_10_12;
        $monthlyComission->amount_11_12 = $request->amount_11_12;
        $monthlyComission->amount_12_12 = $request->amount_12_12;

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
                $file->size = 'dsd';
                $file->mime_type = 'dssd';
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

        $contract = Contract::with('files')->where('id', $id)->first();

        // $file = File::where('contract_id', '01h2qc2tvbwmqmkjnpxfq78b0e')->first();
        // return Storage::download('files/' . $file->path);

        // $files = Storage::allFiles('/files');
        // d

        // $filepath = storage_path($file->path);
        // return response()->file($files);

        // dd($contract->files[0]);
        // if (Storage::existe($f) {
        //     dd('ok');
        // }


        // $path = Storage::disk('local')->path('files/6485fac1f3101-1686502081/' . $file->filename);
        // $content = file_get_contents($path);

        return view('pages.contracts.teste', [
            'contract' => $contract,
        ]);
    }

    public function download($id)
    {
        $file = File::where('id', $id)->first();
        return Storage::download('files/' . $file->path);
    }

    // public function show($id, $filename)
    // {
    //     $path = storage_path('app/public/files/' . $id . '/' . $filename);

    //     if (!Storage::exists($path)) {
    //         abort(404);
    //     }

    //     $file = Storage::get($path);
    //     $type = Storage::mimeType($path);

    //     return response($file, 200)->header('Content-Type', $type);
    // }
}
