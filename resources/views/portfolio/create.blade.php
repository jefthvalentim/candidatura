@extends('layouts.app')

@section('content')

<div class="page-apresentation">
    <div class="container-fluid">
        <div class="row pt-5 pb-5">
            <div class="col-md-5">               
                <div class="page-apresentation-form shadow p-3">
                    <h4 class="text-uppercase font-weight-bold text-center">Novo Projecto<span class="text-black"> do Portfólio</span></h4>
                    <form action="{{ route('portfolio.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nome do Portfólio<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Tipo de Portfólio<span class="text-danger">*</span></label>
                                <select name="type" class="form-control" required>
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
                                <input type="file" @change="selectedFile" name="midia" class="form-control" accept=".png, .jpg, .mp4, .jpeg" required="required">
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label for="">Carregar Galeria <span class="text-danger">*</span></label>
                                <input type="file" @change="selectedFiles" multiple name="galleries[]" accept=".png, .jpg, .mp4, .jpeg" class="form-control">
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
                    <img :src="src" alt="" v-if="type == 'image'" class="img-fluid" style="max-height: 500px">
                    <video :src="src" controls v-if="type == 'video'" class="img-fluid"></video>
                </template>
            </div>
        </div>   

        <div class="row">
            <div class="col-md-2 item my-2" v-for="(src, index) in medias" @click="deleteMedia(index)">
                <template>
                    <img :src="src" alt="" v-if="type == 'image'" class="img-fluid">
                    <video :src="src" controls v-if="type == 'video'" class="img-fluid"></video>
                </template>
            </div>
        </div>
    </div>
</div>
@endsection
