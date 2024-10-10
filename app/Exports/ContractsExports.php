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
            "BO",
            "NOME COMERCIAL",
            "SERVIÇO",
            "SOLUÇÃO",
            "TIPO DE ADESÃO",
            "CLIENTE/ADMINISTRADOR",
            "ADM CONDOMINIO",
            "ADESÃO",
            "CAMPANHA",
            "ARQUIVO",
            "TENSAO",
            "NIF",
            "CPE",
            "POTÊNCIA",
            "SIMPLES",
            "PONTAS",
            "CHEIAS",
            "VAZIO",
            "SUPER VAZIO",
            "GAS",
            "PREÇO POTENCIA",
            "PREÇO ENERGIA",
            "INSERIDO",
            "ASSINATURA",
            "ALTA",
            "RENOVAÇÃO",
            "CAE",
            "NOME DO CLIENTE",
            "MORADA",
            "PORTA",
            "ANDAR",
            "CÓDIGO POSTAL",
            "CÓDIGO DMP",
            "FREGUESIA",
            "CONCELHO",
            "DISTRITO",
            "NIB",
            "FATURA",
            "MORADA FATURA",
            "PORTA FATURA",
            "ANDAR FATURA",
            "CP",
            "FREGUESIA FATURA",
            "CONCELHO FATURA",
            "DISTRITO FATURA",
            "EMAIL FATURA",
            "CONTACTO FATURA",
            "NIF RESPONSAVEL",
            "EMAIL ASSINATURA",
            "CONTACTO ASSINATURA",
            "VALOR PAGO AO ADMINISTRADOR",
            "Data Pagamento ao Administrador",
            "Devolução ao Administrador",
            " Data Devolução ao Administrador",
            "VALOR PAGO AO COMERCIAL",
            "Data Pagamento ao Comercial",
            "Devolução ao Comercial",
            "Data Devolução ao Comercial",
            "Valor Pago ao CVC",
            "Data Pagamento ao CVC",
            "Devolução ao CVC",
            "Data Devolução ao CVC",
            "VALOR PAGO AO CVC",
            "Data Pagamento ao CVC",
            "Devolução ao CVC",
            "Data Devolução ao CVC",
            // "OBSERVAÇÕES",
        ];
    }
}
