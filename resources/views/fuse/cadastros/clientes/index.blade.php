@extends('fuse.template.master')

@section('content')
<div class="block-header">
    <ol class="breadcrumb breadcrumb-bg-blue">
        <li><a href="javascript:void(0);"><i class="material-icons">home</i> Home</a></li>
        <li><a href="javascript:void(0);"><i class="material-icons">add_circle</i> Cadastros</a></li>
        <li class="active"><i class="material-icons">account_circle</i> Clientes</li>
    </ol>
</div>

@if ($message = Session::get('success'))
    <div class="alert bg-green alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <p>{{ $message }}</p>
    </div>
@endif

@if(count($errors) > 0)
    <ul>
        @foreach($errors->all() as $error)
            <li>
                <div class="alert bg-red alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <p>{{$error}}</p>
                </div>
            </li>
        @endforeach
    </ul>
@endif

<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    CLIENTES
                </h2>
            </div>

            <div class="body">

                <a class="btn btn-success waves-effect" href="{{ route('clientes.create') }}">CADASTRAR</a>

                <div class="table-responsive">
                    <table id="example" class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>CLIENTE</th>
                                <th>CPF</th>
                                <th>CELULAR</th>
                                <th width="28%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($clientes as $cliente)
                                <tr>
                                    <th scope="row">{{ $cliente->id }}</th>
                                    <td>{{ $cliente->nome }}</td>
                                    <td>{{ $cliente->cpf }}</td>
                                    <td>{{ $cliente->telefone1 }}</td>
                                    <td class="text-center">
                                        <a class="btn btn-info waves-effect" 
                                        href="{{ route('clientes.show', $cliente) }}">DETALHAR</a>
                                        <a class="btn btn-primary waves-effect" 
                                        href="{{ route('clientes.edit', $cliente) }}">EDITAR</a>
                                        <a class="btn btn-danger waves-effect"
                                        data-toggle="modal" data-target="#modalCliente{{$cliente->id}}">DELETAR</a>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modalCliente{{$cliente->id}}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content modal-col-red">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="defaultModalLabel">EXCLUSÃO</h4>
                                            </div>
                                            <div class="modal-body">
                                                Deseja Realmente Excluir o Cliente <b>{{$cliente->nome}}</b>?
                                            </div>
                                            <div class="modal-footer">
                                                <form style="display: inline;" 
                                                action="{{ route('clientes.destroy', $cliente->id) }}" method="POST">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-link waves-effect">CONFIRMAR</button>
                                                </form>
                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">FECHAR</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
