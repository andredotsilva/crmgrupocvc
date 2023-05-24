<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Dashboard - Inserir Novo Contrato') }}
      </h2>
  </x-slot>

  <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <form action="{{ route('contracts.store') }}" method="POST">
          @csrf
          <div class="space-y-12">
            
              <div class="border-b border-gray-900/10 pb-12">

                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 bg-white p-6 rounded-2xl dark:bg-gray-800">
                    <h1 class="text-lg pb-4 dark:text-gray-200">Back Office</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">BO</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Código Comerciante</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome Comercial</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Serviço</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Soluções</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Tipo de Adesão</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Cliente / Administrador</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Administração de Condominio</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS DA ORGANIZAÇÃO</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Adesão</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Campanha</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>Energia Verde</option>
                                    <option>Teste</option>
                                    <option>Teste</option>
                                    <option>Teste</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Documentação</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Arquivo do Cliente</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>

                <!--Dados Contador-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">DADOS Contador</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Tenção</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>BTN</option>
                                    <option>BTE</option>
                                    <option>ME</option>
                                </select>
                            </div>
                        </div>

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CPE</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Potência</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Dados Contador-->

                <!--Consumos-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Consumos</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Simples</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Pontas</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Cheias</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Vazio</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Super Vazio</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Consumos-->

                <!--Dados Cliente-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados Cliente</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CAE</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome Cliente</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada De Fornecimento</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Andar/Fração</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Codigo Postal</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>4000-011</option>
                                    <option>4000-211</option>
                                    <option>4000-445</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Codigo Freguesia</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Freguesia</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>Foz do Douro</option>
                                    <option>Massarelos</option>
                                    <option>Bomfim</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Conselho</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Distrito</label>
                            <div class="mt-2">
                                <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Dados Cliente-->

                <!--Forma Pagamento-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Forma de Pagamento</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIB</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Fatura</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>Eletronica</option>
                                    <option>Papel</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Forma Pagamento-->

                <!--Dados Correspondência-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Dados de Correspondência</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Morada</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nº Porta</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Codigo Postal</label>
                            <div class="mt-2">
                                <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                    <option>4040-123</option>
                                    <option>4000-022</option>
                                </select>
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Freguesia</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Conselho</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Distrito</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Email</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Contacto Telefónico</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">NIF Responsável</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Dados Correspondência-->

                <!--Assinatura-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Assinatura</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Email Assinatura</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Contacto Assinatura</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Assinatura-->

                <!--Comissões-->
                <div class="mt-10 gap-x-6 gap-y-8 sm:grid-cols-6 p-6 rounded-2xl bg-white dark:bg-gray-800" >
                    <h1 class="text-lg pb-4 dark:text-gray-200">Comissões e Data de Pagamento</h1>
                    <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Valor Pago ao Administrador</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Valor Pago ao Comercial</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Data Pagamento ao Administrador</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Data Pagamento ao Comercial</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                        <div class="sm:col-span-2">
                            <label for="nif" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Onservações</label>
                            <div class="mt-2">
                                <input type="nif" name="nif" id="nif" autocomplete="nif"
                                    class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                            </div>
                        </div>
                    </div>
                </div>
                <!--END Comissões-->
            
                  <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6 bg-slate-200 p-6 rounded-2xl dark:bg-gray-800">
                      <div class="sm:col-span-2">
                          <label for="cod-contador" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">CPE</label>
                          <div class="mt-2">
                              <input type="text" name="contador" id="cod-contador" autocomplete="given-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6 dark:bg-gray-600">
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="name" class="block text-sm font-medium leading-6 text-gray-900 dark:text-gray-200">Nome</label>
                          <div class="mt-2">
                              <input type="text" name="name" id="name" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="nif" class="block text-sm font-medium leading-6 text-gray-900">NIF</label>
                          <div class="mt-2">
                              <input type="text" name="nif" id="nif" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="email" class="block text-sm font-medium leading-6 text-gray-900">Email</label>
                          <div class="mt-2">
                              <input id="email" name="email" type="email" autocomplete="email"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="cod_freguesia" class="block text-sm font-medium leading-6 text-gray-900">COD
                              Freguesia</label>
                          <div class="mt-2">
                              <input type="text" name="cod_freguesia" id="cod_freguesia" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="desc-freguesia" class="block text-sm font-medium leading-6 text-gray-900">Designação
                              Freguesia</label>
                          <div class="mt-2">
                              <input type="text" name="freguesia" id="desc-freguesia" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="conselho" class="block text-sm font-medium leading-6 text-gray-900">Conselho</label>
                          <div class="mt-2">
                              <input type="text" name="concelho" id="conselho" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="distrito" class="block text-sm font-medium leading-6 text-gray-900">Distrito</label>
                          <div class="mt-2">
                              <input type="text" name="distrito" id="distrito" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="morada" class="block text-sm font-medium leading-6 text-gray-900">Rua e
                              Porta</label>
                          <div class="mt-2">
                              <input type="text" name="morada" id="morada" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                      <div class="sm:col-span-2">
                          <label for="postal-code" class="block text-sm font-medium leading-6 text-gray-900">Cod
                              Postal</label>
                          <div class="mt-2">
                              <input type="text" name="postal" id="postal-code" autocomplete="family-name"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
  
  
                      <div class="sm:col-span-2">
                          <label for="nivel-tensao" class="block text-sm font-medium leading-6 text-gray-900">Nível de
                              Tensão</label>
                          <div class="mt-2">
                              <select id="nivel-tensao" name="tensao" autocomplete="nivel-tensao"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 ">
                                  <option>RPE-MT</option>
                                  <option>RPE-AT</option>
                                  <option>RPE-BTN</option>
                                  <option>RPE-BTE</option>
                              </select>
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="potencia-contratada"
                              class="block text-sm font-medium leading-6 text-gray-900">Potência Contratada</label>
                          <div class="mt-2">
                              <input type="text" name="potencia" id="potencia-contratada"
                                  autocomplete="potencia-contratada"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
  
                      <div class="sm:col-span-2">
                          <label for="andar-fracao"
                              class="block text-sm font-medium leading-6 text-gray-900">Andar/Fração</label>
                          <div class="mt-2">
                              <input type="text" name="andar" id="andar-fracao" autocomplete="andar-fracao"
                                  class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6">
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  
          <div class="mt-6 flex items-center justify-end gap-x-6">
              <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancelar</button>
              <button type="submit"
                  class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Guardar</button>
          </div>
      </form>
      </div>
  </div>


</x-app-layout>