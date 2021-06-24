@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <a href="{{ route('portfolio.index') }}">
                                    <div class="card-body">
                                        {{ $portfolios }} Portfólios
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <a href="{{ route('message.index') }}">
                                    <div class="card-body">
                                        {{ $mensagens}} Mensagens
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center my-2">
                        <div class="col-md-6">
                            <div class="card">
                                <a href="{{ route('message.read') }}">
                                    <div class="card-body">
                                        {{ $mensagens_lidas}} Mensagens lidas
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <a href="{{ route('message.not_read') }}">
                                    <div class="card-body">
                                        {{ $mensagens_n_lidas}} Mensagens não lidas
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
