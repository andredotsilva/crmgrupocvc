<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContractRequest;
use App\Models\Client;
use App\Models\ClientType;
use App\Models\Commission;
use App\Models\File;
use App\Models\Meter;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Contract;
use App\Models\Contrato;
use App\Models\District;
use App\Models\MailingAddress;
use App\Models\Tariff;
use App\Models\TemporaryFile;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContractsController extends Controller
{
    //
    public function index()
    {
        // $contracts = Contrato::all();
        // $contractsCount = $contracts->count();

        return view('pages.contracts.index');
    }

    public function create()
    {

        $tariffs = Tariff::all();
        $districts = District::all();
        $clientTypes = ClientType::all();
        $comercials = User::whereHas('roles', function ($query) {
            $query->where('role_id', 3);
        })->get();


        return view('pages.contracts.create', [
            'tariffs' => $tariffs,
            'districts' => $districts,
            'clientTypes' => $clientTypes,
            'comercials' => $comercials
        ]);
    }

    // public function store(Request $request)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'contador' => 'required',
    //         'name' => 'required',
    //         'nif' => 'required',
    //         'email' => 'required|email',
    //         'cod_freguesia' => 'required',
    //         'freguesia' => 'required',
    //         'concelho' => 'required',
    //         'distrito' => 'required',
    //         'morada' => 'required',
    //         'postal' => 'required',
    //         'tensao' => 'required',
    //         'potencia' => 'required',
    //         'andar' => 'nullable',
    //     ]);

    //     if ($validator->fails()) {
    //         return response()->json(['errors' => $validator->errors()], 422);
    //     }

    //     $contrato = new Contrato();
    //     $contrato->contador = $request->contador;
    //     $contrato->name = $request->name;
    //     $contrato->nif = $request->nif;
    //     $contrato->email = $request->email;
    //     $contrato->cod_freguesia = $request->cod_freguesia;
    //     $contrato->freguesia = $request->freguesia;
    //     $contrato->concelho = $request->concelho;
    //     $contrato->distrito = $request->distrito;
    //     $contrato->morada = $request->morada;
    //     $contrato->postal = $request->postal;
    //     $contrato->tensao = $request->tensao;
    //     $contrato->potencia = $request->potencia;
    //     $contrato->andar = $request->andar;
    //     $contrato->client_id = auth()->id();
    //     $contrato->save();

    //     return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    // }

    public function store(StoreContractRequest $request)
    {
        $temporaryImages = TemporaryFile::all();

        // if (validator->fails()) {

        //     foreach ($temporaryImages as $temporaryImage) {
        //         Storage::deleteDirectory('files/tmp/' . $temporaryImage->folder);
        //         $temporaryImage->delete();
        //     }
        // }

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = 'adwkweqnqkne213352sddas';

        $user->save();

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

        dd(auth()->id());

        $contract->back_officer_id = '994729af-f5ef-463f-942e-9703883e8799';
        $contract->commercial_id = '994729af-f5ef-463f-942e-9703883e8799';
        $contract->client_type_id = 1;

        // $contract->service_id = $request->service_id;
        $contract->service_id = 1;

        // $contract->category_id = $request->category_id;
        $contract->category_id = 1;

        // $contract->provider_id = $request->provider_id;
        $contract->provider_id = 1;

        // $contract->plan_id = $request->plan_id;
        $contract->plan_id = 1;
        // $contract->documentation_status_id = $request->documentation_status_id;
        $contract->documentation_status_id = 1;

        $contract->archive = $request->archive;

        // dd($client->id);
        $contract->client_id = $client->id;

        $contract->inserted_at = $request->inserted_at;
        $contract->signed_at = $request->signed_at;
        $contract->effective_at = $request->effective_at;
        $contract->renewal_at = $request->renewal_at;

        $contract->nib = $request->nib;
        // $contract->invoice_type_id = $request->invoice_type_id;
        $contract->invoice_type_id = 1;

        $contract->signatory_email = $request->signatory_email;
        $contract->signatory_phone = $request->signatory_phone;

        $contract->save();

        $meter = new Meter();
        $meter->cpe = $request->cpe;
        $meter->power = $request->power;
        $meter->nif = $request->nif;
        // $meter->tariff_id = $request->tariff_id;
        $meter->tariff_id = 1;
        $meter->flat = $request->flat;
        $meter->peak = $request->peak;
        $meter->standard = $request->standard;
        $meter->off_peak = $request->off_peak;
        $meter->super_off_peak = $request->super_off_peak;

        $meter->save();

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

        $comission = new Commission();

        // $comission->cvc_paid_amount = $request->cvc_paid_amount;
        $comission->administrator_paid_amount = $request->administrator_paid_amount;
        $comission->commercial_paid_amount = $request->commercial_paid_amount;
        // $comission->cvc_payment_date = $request->cvc_payment_date;
        // $comission->administrator_payment_date = $request->administrator_payment_date;
        // $comission->commercial_payment_date = $request->commercial_payment_date;

        // $comission->save();

        if ($request->hasFile('filepond')) {
            foreach ($temporaryImages as $temporaryImage) {
                Storage::copy('files/tmp/' . $temporaryImage->folder . '/' . $temporaryImage->filename, 'files/' . $temporaryImage->folder . '/' . $temporaryImage->filename);

                $file = new File();

                $file->contract_id = $contract->id;
                $file->filename = $temporaryImage->filename;
                $file->path = $temporaryImage->folder . '/' . $temporaryImage->filename;

                Storage::deleteDirectory('files/tmp/' . $temporaryImage->folder);
                $temporaryImage->delete();
            }
        }

        return redirect()->route('contracts.index')->with('success', 'Contrato criado com sucesso!');
    }
}
