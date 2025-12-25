<?php

namespace App\Http\Requests;

use App\Models\TemporaryFile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;
use Termwind\Components\Dd;

class StoreContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation()
    {
        $districtId =
            $this->input("district_id") !== "Selecionar Distrito"
                ? $this->input("district_id")
                : null;

        $mailDistrictId =
            $this->input("mail_district_id") !== "Selecionar Distrito"
                ? $this->input("mail_district_id")
                : null;

        $this->merge([
            "district_id" => $districtId,
            "mail_district_id" => $mailDistrictId,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "back_officer_id" => ["nullable", "exists:users,id"],
            "commercial_id" => ["nullable", "exists:users,id"],
            "client_type_id" => ["nullable", "exists:client_types,id"],
            "category_id" => ["nullable", "exists:categories,id"],
            "service_id" => ["nullable", "exists:services,id"],
            "status_id" => ["nullable", "exists:status,id"],
            "archive" => ["nullable", "max:255"],
            "inserted_at" => ["nullable", "date"],
            "signed_at" => ["nullable", "date"],
            "effective_at" => ["nullable", "date"],
            "renewal_at" => ["nullable", "date"],
            "nib" => ["nullable", "max:21"],
            "invoice_type_id" => ["nullable", "exists:invoice_types,id"],
            "signatory_email" => ["nullable", "max:255"],
            "signatory_phone" => ["nullable", "max:255"],

            //Client
            "cae" => ["nullable", "numeric"],
            "administrator_name" => ["nullable", "max:255"],
            "condominium_administrator" => ["nullable", "max:255"],
            "name" => ["nullable", "max:255"],
            "address" => ["nullable", "max:255"],
            "door" => ["nullable", "max:255"],
            "floor" => ["nullable", "max:255"],
            "post_code" => ["nullable", 'regex:/^\d{4}-\d{3}$/'],
            "dmp_code" => ["nullable", "numeric"],
            "parish_id" => ["nullable", "exists:parishes,id"],
            "municipality_id" => ["nullable", "exists:municipalities,id"],
            "district_id" => ["nullable", "exists:districts,id"],

            //Meter
            "tariff_id" => ["nullable", "exists:tariffs,id"],
            "nif" => ["nullable", "max:255"],
            "cpe" => ["nullable", "max:255"],
            "power" => ["nullable", "numeric"],
            "flat" => ["nullable", "numeric"],
            "peak" => ["nullable", "numeric"],
            "standard" => ["nullable", "numeric"],
            "off_peak" => ["nullable", "numeric"],
            "super_off_peak" => ["nullable", "numeric"],
            'energy_price_standard' => 'nullable|numeric',
            'energy_price_off_peak' => 'nullable|numeric',
            'energy_price_super_off_peak' => 'nullable|numeric',
            'energy_price' => 'nullable|numeric',
            "gas" => ["nullable", "numeric"],
            "power_bracket_id" => ["nullable", "exists:power_brackets,id"],

            // Mail Address
            "mail_address" => ["nullable", "max:255"],
            "mail_door" => ["nullable", "max:255"],
            "mail_floor" => ["nullable", "max:255"],
            "mail_post_code" => ["nullable", 'regex:/^\d{4}-\d{3}$/'],
            "mail_parish_id" => ["nullable", "exists:parishes,id"],
            "mail_municipality_id" => ["nullable", "exists:municipalities,id"],
            "mail_district_id" => ["nullable", "exists:districts,id"],
            "email" => ["email"],
            "phone_number" => ["nullable", "max:255"],
            "mail_nif" => ["nullable", "max:255"],

            // Comission
            "administrator_paid_amount" => ["nullable", "numeric"],
            "commercial_paid_amount" => ["nullable", "numeric"],
            "cvc_paid_amount" => ["nullable", "numeric"],
            "energy_cvc_paid_amount" => ["nullable", "numeric"],

            "administrator_payment_date" => ["nullable", "date"],
            "commercial_payment_date" => ["nullable", "date"],
            "cvc_payment_date" => ["nullable", "date"],
            "energy_cvc_payment_date" => ["nullable", "date"],

            "refund_cvc_paid_ammount" => ["nullable", "numeric"],
            "refund_administrator_paid_ammount" => ["nullable", "numeric"],
            "refund_commercial_paid_ammount" => ["nullable", "numeric"],
            "refund_energy_cvc_paid_ammount" => ["nullable", "numeric"],

            "refund_cvc_payment_date" => ["nullable", "date"],
            "refund_administrator_payment_date" => ["nullable", "date"],
            "refund_commercial_payment_date" => ["nullable", "date"],
            "refund_energy_cvc_payment_date" => ["nullable", "date"],

            "amount_01_12" => ["nullable", "numeric"],
            "date_01_12" => ["nullable", "date"],
            "amount_02_12" => ["nullable", "numeric"],
            "date_02_12" => ["nullable", "date"],
            "amount_03_12" => ["nullable", "numeric"],
            "date_03_12" => ["nullable", "date"],
            "amount_04_12" => ["nullable", "numeric"],
            "date_04_12" => ["nullable", "date"],
            "amount_05_12" => ["nullable", "numeric"],
            "date_05_12" => ["nullable", "date"],
            "amount_06_12" => ["nullable", "numeric"],
            "date_06_12" => ["nullable", "date"],
            "amount_07_12" => ["nullable", "numeric"],
            "date_07_12" => ["nullable", "date"],
            "amount_08_12" => ["nullable", "numeric"],
            "date_08_12" => ["nullable", "date"],
            "amount_09_12" => ["nullable", "numeric"],
            "date_09_12" => ["nullable", "date"],
            "amount_10_12" => ["nullable", "numeric"],
            "date_10_12" => ["nullable", "date"],
            "amount_11_12" => ["nullable", "numeric"],
            "date_11_12" => ["nullable", "date"],
            "amount_12_12" => ["nullable", "numeric"],
            "date_12_12" => ["nullable", "date"],

            "text" => ["nullable"],
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors()->all();
        // Dd($errors);

        $temporaryImages = TemporaryFile::where(
            "upload_by",
            auth()->id()
        )->get();

        foreach ($temporaryImages as $temporaryImage) {
            Storage::deleteDirectory("files/tmp/" . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        throw new HttpResponseException($this->redirectWithErrors());
    }

    protected function redirectWithErrors()
    {
        return redirect()
            ->back()
            ->withErrors($this->validator)
            ->withInput();
    }
}
