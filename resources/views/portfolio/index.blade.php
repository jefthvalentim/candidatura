@extends('layouts.app')

@section('content')
        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-2 text-gray-800">Listagens de Portfólios</h1> 
                <a href="{{ route('portfolio.create') }}" class="btn btn-primary my-3">Inserir Portfólio</a>
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
            <!-- DataTales Example -->
            <div class="row default">
            
                @foreach($portfolios as $portfolio)
                    <div class="col-md-3 item">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">{{ $portfolio->name }} - 
                                @foreach($portfolio->categories as $category)
                                    «{{ $category->category->name }}» 
                                @endforeach
                                </h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Acções:</div>
                                        <a class="dropdown-item" href="{{ route('portfolio.show', $portfolio->id) }}">Detalhes</a>
                                        <a class="dropdown-item" href="{{ route('portfolio.edit', $portfolio->id) }}">Editar</a>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('portfolio-highlight-{{$portfolio->id}}').submit();">Destacar</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja efectuar esta operação?')) document.getElementById('portfolio-{{$portfolio->id}}').submit();">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <img src="{{ url('storage/portfolios/' . $portfolio->id, $portfolio->midia) }}" style="max-width: 100%" />
                            </div>
                            <form action="{{ route('portfolio.highlight', $portfolio->id) }}" method="post" id="portfolio-highlight-{{$portfolio->id}}">
                                @csrf
                                @method('put')
                            </form>
                            <form action="{{ route('portfolio.destroy', $portfolio->id) }}" method="post" id="portfolio-{{$portfolio->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$portfolios->links()}}
        </div>

@endsection