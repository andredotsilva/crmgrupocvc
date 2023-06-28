<?php

namespace App\Http\Requests;

use App\Models\TemporaryFile;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Storage;

class StoreContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    // protected function prepareForValidation()
    // {
    //     if ($this->district_id === 'Selecionar Distrito') {
    //         $this->merge(['district_id' => null]);
    //     }
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [

            'back_officer_id' => ['nullable', 'exists:users,id'],
            'commercial_id' => ['nullable', 'exists:users,id'],
            'client_type_id' =>  ['nullable', 'exists:client_types,id'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'service_id'  => ['nullable', 'exists:services,id'],
            'documentation_status_id'  => ['nullable', 'exists:services,id'],
            'archive' => ['nullable', 'max:255'],
            'inserted_at' => ['date'],
            'signed_at'  => ['date'],
            'effective_at' => ['date'],
            'renewal_at' => ['date'],
            'nib'  => ['nullable', 'max:255'],
            'invoice_type_id'  => ['nullable', 'exists:invoice_types,id'],
            'signatory_email' => ['nullable', 'max:255'],
            'signatory_phone' => ['nullable', 'max:255'],

            //Client
            'cae'  => ['numeric'],
            'administrator_name' => ['max:255'],
            'condominium_administrator' => ['max:255'],
            'name' => ['max:255'],
            'address' => ['max:255'],
            'door' => ['max:255'],
            'floor' => ['max:255'],
            'post_code' => ['nullable', 'regex:/^\d{4}-\d{3}$/'],
            'dmp_code'  => ['nullable', 'numeric'],
            'parish_id' => ['nullable', 'exists:parishes,id'],
            'municipality_id' => ['nullable', 'exists:municipalities,id'],
            'district_id' => ['nullable', 'exists:districts,id'],

            //Meter
            'tariff_id' => ['nullable', 'exists:tariffs,id'],
            'nif'  => ['max:255'],
            'cpe' => ['max:255'],
            'power' => ['numeric'],
            'flat' => ['numeric'],
            'peak' => ['numeric'],
            'standard' => ['numeric'],
            'off_peak' => ['numeric'],
            'super_off_peak' => ['numeric'],
            'gas' => ['numeric'],

            // Mail Address         
            'mail_address' => ['nullable', 'max:255'],
            'door' => ['max:255'],
            'mail_post_code' => ['regex:/^\d{4}-\d{3}$/'],
            'mail_parish_id' => ['nullable', 'exists:parishes,id'],
            'mail_municipality_id' => ['nullable', 'exists:municipalities,id'],
            'mail_district_id' => ['nullable', 'exists:districts,id'],
            'email' => ['email', 'unique:users,email'],
            'phone_number',
            'nif',


            // Comission
            'administrator_paid_amount' => ['nullable', 'numeric'],
            'commercial_paid_amount'  => ['nullable', 'numeric'],
            'cvc_paid_amount' => ['nullable', 'numeric'],

            'administrator_payment_date' => ['date'],
            'commercial_payment_date' => ['date'],
            'cvc_payment_date' => ['date'],

            'refund_cvc_paid_ammount',
            'refund_administrator_paid_ammount',
            'refund_commercial_paid_ammount',

            'refund_cvc_payment_date',
            'refund_administrator_payment_date',
            'refund_commercial_payment_date'

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // Excluir os uploads, se necessário
        $temporaryImages = TemporaryFile::where('upload_by', auth()->id())->get();

        foreach ($temporaryImages as $temporaryImage) {
            Storage::deleteDirectory('files/tmp/' . $temporaryImage->folder);
            $temporaryImage->delete();
        }

        throw new HttpResponseException($this->redirectWithErrors());
    }

    protected function redirectWithErrors()
    {
        return redirect()->back()->withErrors($this->validator)->withInput();
    }
}
