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
                      <th>Data Nascimento</th>
                    </tr>
                  </thead>
                 
                  <tbody>
                        @foreach($candidaturas as $candidatura)
                            <tr>
                                <td>{{ $candidatura->nome }}</td>
                                <td>{{ $candidatura->sobrenome }}</td>
                                <td>{{ $candidatura->email }}</td>
                                <td>{{ $candidatura->telefone }}</td>
                                <td>{{ $candidatura->data_nascimento }}</td>
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