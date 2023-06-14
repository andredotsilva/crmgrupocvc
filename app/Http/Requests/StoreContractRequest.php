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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'cae' => ['required'],
            'email' => ['email', 'unique:users,email'],
            'power' => ['required'],

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
