@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('questions.add')}}" method="post" class="was-validated ">
            @csrf
            
            <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                <div class="card-body">
                    

                    <div class="row">
                            <p class="text-center">Questao</p>
                    </div>
                        

                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <label for="name">nome da questao</label>
                            <input name="name" type="text">
                        </div>
                    </div>

                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <label for="text">Texto da questao</label>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-6">
                                        <textarea name="text" class="form-control is-invalid" id="validationTextarea" placeholder="texto pergunta" required></textarea>
                                        <div class="invalid-feedback">
                                            escreva a pergunta
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                    
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                                    
                            <div class="row">
                                <p class="text-center">imagens necessarias</p>
                            </div>
                            <div class="row">
                                <div class="custom-file">
                                    <input name="file" type="file" class="custom-file-input" id="customFile">
                                    <label class="form-control custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <label for="">dificuldade da questao:</label>
                                    <select name="level" id="" class="custom-select" required>
                                        <option value="">0 - --Nada selecionado-- </option>
                                        <option value="1">1 - impossivel nao saber </option>
                                        <option value="2">2 - aquela para nao zerar</option>
                                        <option value="3">3 - facil</option>
                                        <option value="4">4 - facil que precisa estudar</option>
                                        <option value="5">5 - media </option>
                                        <option value="6">6 - dificil</option>
                                        <option value="7">7 - muito complicada</option>
                                        <option value="8">8 - pensa o dia inteiro</option>
                                        <option value="9">9 - impossivel acertar</option>
                                    </select>
                                </div>
                                <div class="col-6">
                                    <label for="">assunto da questao:</label>
                                    <select name="about" id="" class="custom-select" required>
                                        <option value="">0 - --Nada selecionado-- </option>
                                        <option value="1">1 - logica de programacao</option>
                                        <option value="2">2 - paradigmas de programacao</option>
                                        <option value="3">3 - matematica</option>
                                        <option value="4">4 - arquitetura e SO</option>
                                        <option value="5">6 - algoritmos diversos </option>
                                        <option value="6">5 - Engenharia de software </option>
                                        <option value="7">7 - diagramas</option>
                                        <option value="8">8 - gerencia de software</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card shadow-sm p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <div class="row">
                                    <p class="text-center">Resposta</p>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-6">
                                        <textarea name="awnser" class="form-control is-invalid" id="validationTextarea" placeholder="resposta" required></textarea>
                                        <div class="invalid-feedback">
                                            escreva uma explicacao sobre a resposta da questao
                                        </div>
                                    </div>
                                </div>
                            </div>        
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">enviar questao</button>
                        
                </div>
            </div>
        </form>
    </div>
@endsection