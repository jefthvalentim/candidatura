@extends('layouts.app')

@section('content')

<div class="page-apresentation">
    <div class="container">
        <div class="row pt-5 pb-5">
            <div class="col-md-8">               
                 <div class="page-apresentation-form shadow p-3">
                    <h4 class="text-uppercase font-weight-bold text-center">Actualização de portfólio</h4>
                    <form action="{{ route('portfolio.update', $portfolio->id) }}" method="POST">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Nome do Portfólio<span class="text-danger">*</span></label>
                                <input type="text" name="name" class="form-control" value="{{ $portfolio->name }}" required="required">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Categoria<span class="text-danger">*</span></label>
                                <select name="category_id" class="form-control" required>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $category->id == $portfolio->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                      
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="">Descrição</label>
                            <textarea class="form-control" name="description" id="" rows="5" > {{ $portfolio->description }}</textarea>
                            </div>
                           <!-- 
                               <div class="form-group col-md-4">
                                <label for="">Carregar Certificações</label>
                                <input type="file" name="certificates" class="form-control" multiple="multiple" accept=".pdf"> 
                            </div>
                            -->
                        </div>  
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Actualizar Portfólio</button>  
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
    </div>
</div>
@endsection
