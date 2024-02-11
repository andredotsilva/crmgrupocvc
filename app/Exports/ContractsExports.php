<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class ContractsExports implements FromCollection, WithHeadings, ShouldAutoSize
{
    protected $data;

    public function __construct(Collection $data)
    {
       
        $this->data = $data;
    }

    public function collection()
    {
        // dd($this->data);
        return $this->data;
    }

    public function headings(): array
    {
        return [
            'BO',
            'NOME COMERCIAL',
            'SERVIÇO',
            'SOLUÇÃO',
            'TIPO DE ADESÃO',
            'CLIENTE/ADMINISTRADOR',
            'ADM CONDOMINIO',
            'ADESÃO',
            'CAMPANHA',
            'ARQUIVO',
            'TENSAO',
            'NIF',
            'CPE',
            'POTÊNCIA',
            'SIMPLES',
            'PONTAS',
            'CHEIAS',
            'VAZIO',
            'SUPER VAZIO',
            'INSERIDO',
            'ASSINATURA',
            'ALTA',
            'RENOVAÇÃO',
            'CAE',
            'NOME DO CLIENTE',
            'MORADA',
            'PORTA',
            'ANDAR',
            'CÓDIGO POSTAL',
            'CÓDIGO DMP',
            'FREGUESIA',
            'CONCELHO',
            'DISTRITO',
            'NIB',
            'FATURA',
            'MORADA',
            'PORTA',
            'CP',
            'FREGUESIA',
            'CONCELHO',
            'DISTRITO',
            'EMAIL',
            'CONTACTO',
            'NIF RESPONSAVEL',
            'EMAIL ASSINATURA',
            'CONTACTO ASSINATURA',
            'VALOR PAGO AO ADMINISTRADOR',
            'VALOR PAGO AO COMERCIAL',
            'DATA PAGAMENTO ADMINISTRADOR',
            'DATA PAGAMENTO COMERCIAL',
            'OBSERVAÇÕES'


                
        ];
    }
}
