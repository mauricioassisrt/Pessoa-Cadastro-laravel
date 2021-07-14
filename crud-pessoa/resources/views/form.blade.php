@extends('layouts.principal')

@section('title', "{$title}")

@section('topo')
    <!--IMPORT CSS -->

@endsection
@section('content')

    @csrf
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">


            <!-- /.box-header -->
            @if (Request::is('*/editar/*'))

                {!! Form::model($pessoa, ['method' => 'PATCH', 'url' => 'pessoas/atualizar/' . $pessoa->id]) !!}
            @else
                {!! Form::open(['route' => 'pessoa.store']) !!}
            @endif
            <div class="form-group">
                @csrf
                <label>Nome da pessoa </label>
                <input type="text" class="form-control" name="nome"
                       @if (Request::is('*/editar/*')) value="{{ $pessoa->nome }}" @endif required>

            </div>

            <div class="form-group">

                <label>Nome sobrenome </label>
                <input type="text" class="form-control" name="sobre_nome"
                       @if (Request::is('*/editar/*')) value="{{ $pessoa->sobre_nome }}" @endif required>

            </div>
            <div class="form-group">

                <label>Data Nascimento </label>
                <input type="date" class="form-control" name="nascimento"
                       @if (Request::is('*/editar/*')) value="{{ $pessoa->nascimento }}" @endif required>

            </div>


            <div class="form-group">

                <label>Sexo </label>
                <input type="text" class="form-control" name="sexo"
                       @if (Request::is('*/editar/*')) value="{{ $pessoa->sexo }}" @endif required>

            </div>

        </div>
        <div class="card-footer clearfix">

            <a href="{{ route('index') }}" class="btn btn-primary">

                <i class="fas fa-arrow-left"></i> Voltar </a>

            @if (Request::is('*/editar/*'))
                <button type="submit" class="btn btn-success"><i class=" fas fa-pen-alt"></i> Alterar</button>
            @else
                <button type="submit" class="btn btn-success"><i class=" fas fa-save"></i> Salvar</button>
            @endif

        </div>
        {!! Form::close() !!}
    </div>
@stop
@section('importjs')
    <!--IMPORT js -->
@endsection
