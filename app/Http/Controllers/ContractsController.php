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

class ContractsController extends Controller
{
    //
    public function index()
    {
        $contracts = Contract::with(['meter.tariff', 'client'])->paginate(10);
        $contractsCount = Contract::all()->count();

        return view('pages.contracts.index', [
            'contracts' => $contracts,
            'contractsCount' => $contractsCount
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

        $comission = new Commission();

        // $convertedAdministratorPaidAmount = NumericValueConverter::convertValues([$administratorPaidAmount])[0] * 100;
        // $convertedCommercialPaidAmount = NumericValueConverter::convertValues([$commercialPaidAmount])[0] * 100;

        // dd([$request->administrator_paid_amount, $request->commercial_paid_amount]);
        // $comission->cvc_paid_amount = $request->cvc_paid_amount;
        $comission->administrator_paid_amount = $this->formatarNumero($request->administrator_paid_amount);
        $comission->commercial_paid_amount = $this->formatarNumero($request->commercial_paid_amount);
        // $comission->cvc_payment_date = $request->cvc_payment_date;
        // $comission->administrator_payment_date = $request->administrator_payment_date;
        // $comission->commercial_payment_date = $request->commercial_payment_date;

        $comission->save();

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

        $contract->back_officer_id = '994729af-f5ef-463f-942e-9703883e8799';
        $contract->commercial_id = '994729af-f5ef-463f-942e-9703883e8799';
        $contract->client_type_id = 1;

        $contract->service_id = $request->service_id;
        // $contract->service_id = 1;

        $contract->category_id = $request->category_id;
        // $contract->category_id = 1;

        $contract->provider_id = $request->provider_id;
        // $contract->provider_id = 1;

        $contract->plan_id = $request->plan_id;
        // $contract->plan_id = 1;

        $contract->documentation_status_id = $request->documentation_status_id;
        // $contract->documentation_status_id = 1;

        $contract->archive = $request->archive;

        $contract->client_id = $client->id;
        $contract->meter_id = $meter->id;

        $contract->inserted_at = $request->inserted_at;
        $contract->signed_at = $request->signed_at;
        $contract->effective_at = $request->effective_at;
        $contract->renewal_at = $request->renewal_at;

        $contract->nib = $request->nib;
        $contract->invoice_type_id = $request->invoice_type_id;
        // $contract->invoice_type_id = 1;

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

        return view('pages.contracts.index', [
            'contract' => $contract
        ]);
    }
}
