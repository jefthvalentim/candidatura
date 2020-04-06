@extends('layouts.layout')

@section('content')

<div class="page-apresentation">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-md-4">
                <h4 class="font-weight-bold text-uppercase text-black">candidatura</h4>
                <h4 class="font-weight-bold text-uppercase">online</h4>
                <div class="page-description">
                    <h6 class="text-justify text-black">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    </h6>
                </div>
            </div>
            <div class="col-md-8">
                 <div class="page-apresentation-form shadow p-3">
                    <h4 class="text-uppercase font-weight-bold text-center">junte-se a <span class="text-black">nós</span></h4>
                    <form action="{{ route('candidatura.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Primeiro Nome <span class="text-danger">*</span></label>
                                <input type="text" name="first_name" class="form-control" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Sobrenome <span class="text-danger">*</span></label>
                                <input type="text" name="last_name" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Data de Nascimento <span class="text-danger">*</span></label>
                                <input type="date" name="birthday" class="form-control" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>BI/Passaporte <span class="text-danger">*</span></label>
                                <input type="text" name="bi_passaport" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email <span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Contacto Telefonico <span class="text-danger">*</span></label>
                                <input type="text" name="telephone" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="">Carta motivacional</label>
                            <textarea class="form-control" name="motivational_letter" id="" rows="5" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Escolha a Vaga <span class="text-danger">*</span></label>
                                <select class="form-control" name="vaga" id="" required="required">
                                    <option>Vaga 1</option>
                                    <option>Vaga 2</option>
                                    <option>Vaga 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Carregar CV <span class="text-danger">*</span></label>
                                <input type="file" name="cv" class="form-control" accept=".pdf" required="required">
                            </div>
                           <!-- 
                               <div class="form-group col-md-4">
                                <label for="">Carregar Certificações</label>
                                <input type="file" name="certificates" class="form-control" multiple="multiple" accept=".pdf"> 
                            </div>
                            -->
                        </div>  
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">SUBMETER CANDIDATURA</button>  
                        </div>
          
                    </form>
                </div> 
        </div>   
    </div>
</div>
@endsection
