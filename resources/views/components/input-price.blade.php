@props(['title', 'name', 'type' => null])

<div>
    <label for="{{ $name }}"
        class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
    <div class="relative mt-2 rounded-md shadow-sm">
        <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
            @if ($type != 'power')
                <span class="text-gray-500 sm:text-sm dark:text-gray-400">$</span>
            @endif
        </div>
        <input type="text" name="{{ $name }}" id="{{ $name }}"
            class="block w-full rounded-md border-0 py-1.5 pl-7 pr-20 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:focus:border-blue-500 dark:ring-indigo-500 dark:focus:ring-blue-500"
            placeholder="0.00" oninput="formatarNumero(this)">
    </div>
</div>

<script>
    function formatarNumero(input) {
        let numero = input.value.replace(/[^\d,]/g, ''); // Remove caracteres não numéricos, exceto vírgula
        let partes = numero.split(','); // Separa a parte inteira da parte decimal

        // Remove todos os espaços da parte inteira
        partes[0] = partes[0].replace(/\s/g, '');

        // Formata a parte inteira com espaços como separador de milhares
        partes[0] = partes[0].replace(/\B(?=(\d{3})+(?!\d))/g, ' ');

        // Limita a parte decimal a dois dígitos
        if (partes.length > 1) {
            partes[1] = partes[1] ? partes[1].slice(0, 2) : ''; // Verifica se há parte decimal
        }

        // Atualiza o valor do input com o número formatado
        input.value = partes.join(',') + (partes.length > 1 ? ',' : '');

        // Limita o número de vírgulas
        limitarVirgulas(input);
    }

    function limitarVirgulas(input) {
        let partes = input.value.split(',');

        if (partes.length > 2) {
            partes.splice(2);
            input.value = partes.join(',');
        }
    }
</script>
