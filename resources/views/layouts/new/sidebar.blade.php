<div class="fixed top-0 left-0 h-full w-64 bg-gradient-to-b from-gestorDark to-gestorBlue text-white shadow-lg">
     
  <div class="pt-4 px-2 text-center">  
    <img 
        src="{{ asset('img/logotipo-002.png') }}" 
        alt="Gestor - Energia do Condomínio" 
        class="h-26 w-40 mx-auto object-contain"  
    >
</div>
    
    <nav class="mt-8 space-y-2">
        <a href="{{ url('/dashboard') }}" class="flex items-center px-6 py-3 hover:bg-white/20 rounded-md transition">
            <i class="bi bi-house mr-2"></i> Início
        </a>   

        <a href="{{ url('/servicos') }}" class="flex items-center px-6 py-3 hover:bg-white/20 rounded-md transition">
            <i class="bi bi-people mr-2"></i> Serviços
        </a>
    
        <a href="{{ url('/finances') }}" class="flex items-center px-6 py-3 hover:bg-white/20 rounded-md transition">
            <i class="bi bi-file-earmark-text mr-2"></i> Finanças
        </a>

         <a href="{{ url('/users') }}" class="flex items-center px-6 py-3 hover:bg-white/20 rounded-md transition">
            <i class="bi bi-file-earmark-text mr-2"></i> Utilizadores
        </a>

    </nav>
</div>