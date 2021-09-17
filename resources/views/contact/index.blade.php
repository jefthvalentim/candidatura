@extends('layouts.app')

@section('title', 'Mensagens')
@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="d-flex justify-content-between">
                <h1 class="h3 mb-2 text-gray-800">Listagens de mensagens do site</h1> 
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
            
                @foreach($messages as $message)
                    <div class="col-md-4 item">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Mensagem de {{ $message->name }} </h6>
                                <div class="dropdown no-arrow">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                        <div class="dropdown-header">Acções:</div>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('message-view-{{$message->id}}').submit();">Marcar como visto</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); if(confirm('Tem certeza que deseja efectuar esta operação?')) document.getElementById('message-{{$message->id}}').submit();">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body {{ $message->read_at == null ? 'alert-primary' : '' }}">
                                <div class="row pt-2 pb-4">
                                    <div class="col-md-6"><a href="tel:{{ $message->phone}}">{{ $message->phone}}</a></div>
                                    <div class="col-md-6"><a href="mailto:{{ $message->email}}">{{ $message->email }}</a></div>
                                </div>
                                {{ $message->message }}
                            </div>
                            <form action="{{ route('message.edit', $message->id) }}" method="post" id="message-view-{{$message->id}}">
                                @csrf
                                @method('put')
                            </form>
                            <form action="{{ route('message.destroy', $message->id) }}" method="post" id="message-{{$message->id}}">
                                @csrf
                                @method('delete')
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
            {{$messages->links()}}
        </div>

        <!-- /.container-fluid -->
@endsection