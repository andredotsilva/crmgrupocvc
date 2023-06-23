@props(['title', 'name', 'value' => null])

<label for="{{ $name }}"
    class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">{{ $title }}</label>
<div class="mt-2">
    <input type="text" name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}"
        class="limitar-virgulas block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600 dark:text-gray-200">
</div>

<script>
    function limitarVirgulas(input) {
        let partes = input.value.split('.');

        if (partes.length > 2) {
            partes.splice(2);
            input.value = partes.join('.');
        }
    }

    let inputs = document.getElementsByClassName('limitar-virgulas');
    for (let i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener('input', function() {
            limitarVirgulas(this);
        });
    }
</script>
