<x-guest-layout>
    <div class="flex items-center justify-center min-h-screen">
        <div class="max-w-md mx-auto p-8 bg-white shadow-md rounded-lg text-center">
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Verifique o seu email</h1>

            <p class="text-gray-600 mb-6">
                Obrigado por se registar! Antes de continuar, confirme o seu endereço de email
                clicando no link que acabámos de lhe enviar.
            </p>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-green-600 font-semibold">
                    Um novo link de verificação foi enviado para o seu endereço de email.
                </div>
            @endif

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition duration-200">
                    Reenviar email de verificação
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button type="submit" class="text-sm text-gray-500 hover:text-gray-700 underline">
                    Terminar sessão
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
