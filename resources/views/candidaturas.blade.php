@extends('layouts.app')

@section('content')

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Listagens de candidaturas</h1>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Candidatos</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>Nome</th>
                      <th>Sobrenome</th>
                      <th>Email</th>
                      <th>Telefone</th>
                      <th>BI / Passaporte</th>
                      <th>Data Nascimento</th>
                      <th>Carta motivacional</th>
                      <th>Vaga</th>
                      <th>CV</th>
                      <th></th>
                    </tr>
                  </thead>
                 
                  <tbody>
                        @foreach($candidaturas as $candidatura)
                            <tr>
                                <td>{{ $candidatura->first_name }}</td>
                                <td>{{ $candidatura->last_name }}</td>
                                <td>{{ $candidatura->email }}</td>
                                <td>{{ $candidatura->telephone }}</td>
                                <td>{{ $candidatura->bi_passaport }}</td>
                                <td>{{ $candidatura->birthday }}</td>
                                <td>{{ $candidatura->motivational_letter }}</td>
                                <td>{{ $candidatura->vaga }}</td>
                                <td><a href="{{ url('storage/cvs', $candidatura->cv) }}">Baixar Currículo</a></td>
                                <td><a href="{{ route('candidatura.destroy', $candidatura->id) }}">Apagar</a></td>
                            </tr>
                        @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
@endsection