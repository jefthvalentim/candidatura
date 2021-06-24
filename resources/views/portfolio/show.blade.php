@extends('layouts.app')

@section('title', 'Detalhe do Portfólio')
@section('content')
<style>
    .item { position: absolute; text-align: center; font-size: 1.5em; line-height: 1.5em; }
</style>
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-2 text-gray-800">Listagens de Galeria</h1> 
                <a href="{{ route('portfolio.index') }}" class="btn btn-primary">Voltar</a>
            </div>

            <h6 class="m-0 font-weight-bold text-primary">{{ $portfolio->name }} - 
                @foreach($portfolio->categories as $category)
                    {{ $category->category->name }}
                @endforeach
            </h6>
           
            <!-- DataTales Example -->
            <div class="row">
                
                @foreach($portfolio->gallery as $gallery)
                    <div class="col-md-4">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja efectuar esta operação?')) document.getElementById('gallery-{{$gallery->id}}').submit();">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <img src="{{ url('storage/portfolios/' . $portfolio->id, $gallery->image) }}" style="width: 100%;" />
                            </div>
                            
                            <form action="{{ route('portfolio.gallery.destroy', $gallery->id) }}" method="post" id="gallery-{{$gallery->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
        <!-- /.container-fluid -->
        
        <!-- /.container-fluid -->
@endsection