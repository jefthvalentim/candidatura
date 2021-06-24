@extends('layouts.app')

@section('title', 'Inserir Portfólio')
@section('content')

<div class="page-apresentation">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-md-5">               
                <div class="page-apresentation-form shadow p-3">
                    <h4 class="text-uppercase font-weight-bold text-center">Novo Projecto<span class="text-black"> do Portfólio</span><span v-html="type"></span></h4>
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label>Nome do Portfólio<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required="required">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Data de criação<span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tipo de Portfólio<span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required v-model="type">
                                    <option value="1">Imagem</option>
                                    <option value="2">Vídeo</option>
                                </select>
                            </div>
                        </div>
                      
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="">Descrição</label>
                                <textarea class="form-control" name="description" id="" rows="4" ></textarea>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Categoria<span class="text-danger">*</span></label>
                                <select name="category_id[]" class="form-control" multiple required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">Carregar Capa <span class="text-danger">*</span></label>
                                <input type="file" @change="selectedFile" name="midia" class="form-control" accept=".png, .jpg, .jpeg, .gif" required="required">
                            </div>
                            
                            <div class="form-group col-md-6" v-if="type == 1">
                                <label for="">Carregar Galeria <span class="text-danger">*</span></label>
                                <input type="file" @change="selectedFiles" multiple name="galleries[]" accept=".png, .jpg, .jpeg, .gif" class="form-control">
                            </div>

                            <div class="form-group col-md-6" v-else>
                                <label for="">Vídeo <span class="text-danger">*</span></label>
                                <input type="text" name="video" class="form-control" v-model="url">
                            </div>
                           <!-- 
                               <div class="form-group col-md-4">
                                <label for="">Carregar Certificações</label>
                                <input type="file" name="certificates" class="form-control" multiple="multiple" accept=".pdf"> 
                            </div>
                            -->
                        </div>  
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Salvar Portfólio</button>  
                        </div>
          
                    </form>
                </div> 
                @if (session()->has('success'))
                <div class="mt-3">
                    <div class="alert  alert-success alert-dismissible" role="alert">
                        {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
                @endif
            </div>
            
            <div class="col-md-5"> 
                <template>
                    <img :src="src" alt="" v-if="type_field == 'image'" class="img-fluid" style="max-height: 500px">
                </template>
            </div>
        </div>   

        <div class="row" v-if="type == 1">
            <div class="col-md-2 item my-2" v-for="(src, index) in medias">
                <template>
                    <img :src="src" alt="" class="img-fluid">
                </template>
            </div>
        </div>
        <div class="row" v-else>
            <div class="col-md-5">
                <iframe width="100%" height="350" :src="url" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
