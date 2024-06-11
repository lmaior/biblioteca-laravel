@php
    $currentpage= '';
@endphp

@extends('layouts.main')

@section('title', "Cadastro")

@section('content')
<div class="container mt-5">
    <script>
        function buscarEndereco(zipcode) {
            if (zipcode.length === 8) {
                // Realize a solicitação para a API ViaCEP
                fetch(`https://viacep.com.br/ws/${zipcode}/json/`)
                    .then(response => response.json())
                    .then(data => {
                        if (!data.erro) {
                            // Preencha os campos com os dados de endereço
                            document.getElementById('cepError').style.display = 'none';
                            document.getElementById('address').value = data.logradouro;
                            document.getElementById('neighborhood').value = data.bairro;
                            document.getElementById('city').value = data.localidade;
                            document.getElementById('state').value = data.uf;


                            // Adicione outros campos se necessário
                        } else {
                            // Trate o caso de CEP não encontrado ou erro na API
                           document.getElementById('cepError').style.display = 'block';
                           document.getElementById('address').value = null;
                            document.getElementById('neighborhood').value = null;
                            document.getElementById('city').value = null;
                            document.getElementById('state').value = null;
                        }
                    })
                    .catch(error => {
                        // Trate erros de conexão ou problemas na solicitação
                        alert('Erro ao buscar o endereço:', error);
                    });
            }
        }
        </script>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="padding: 20px;">{{ __('Cadastro') }}</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('storeUser') }}">
                        @csrf
                        {{-- Campos para usuário --}}
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nome') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" id="name" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>
                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Senha') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirme a Senha') }}</label>
                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" id="password-confirm" required>
                            </div>
                        </div>

                        {{-- Campos para endereço --}}

                                             <div class="form-group row mb-3">
                                                    <label for="zipcode" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>
                                                    <div class="col-md-6">
                                                        <input type="number" class="form-control" name="zipcode" placeholder='Somente números'  id="zipcode" oninput="buscarEndereco(this.value)" required>
                                                    <div id="cepError" style="display: none;" class="invalid-feedback">
                                                        CEP não encontrado
                                                    </div>
                                                </div>
                                                </div>

                                                <div class="form-group row mb-3">
                                                    <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>
                                                    <div class="col-md-6 readonly-wrapper">
                                                        <input type="text" class="form-control" name="state" id="state" readonly>
                                                        <div class="readonly-overlay"></div>
                                                    </div>
                                                </div>

                                             <div class="form-group row mb-3 ">
                                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>
                                                <div class="col-md-6 readonly-wrapper">
                                                    <input type="text" class="form-control" name="city" id="city" readonly>
                                                    <div class="readonly-overlay"></div>
                                                </div>
                                            </div>
                        <div class="form-group row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Endereço') }}</label>
                            <div class="col-md-6 readonly-wrapper">
                                <input type="text" class="form-control" name="address" id="address" readonly>
                                <div class="readonly-overlay"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="neighborhood" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>
                            <div class="col-md-6 readonly-wrapper">
                                <input type="text" class="form-control" name="neighborhood" id="neighborhood" readonly>
                                <div class="readonly-overlay"></div>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>
                            <div class="col-md-6">
                                <input type="number" class="form-control" name="number" id="number" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4 text-center">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

