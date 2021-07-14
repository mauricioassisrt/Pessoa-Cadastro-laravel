@extends('layouts.principal')

@section('title', "{$title}")

@section('topo')
    <!--IMPORT CSS -->

@endsection
@section('content')
    <div class="card">

        <div class="card-header">

        </div>
        <div class="card-body">
            <div class="card-body table-responsive p-0">
                <table class="table table-striped table-bordered table-hover" style='background:#fff'>
                    <thead>
                    <th>Nome </th>

                    <th>Ações</th>
                    </thead>
                    <tbody>
                    @foreach ($pessoas as $pessoa)
                        <tr>
                            <td>{!! $pessoa->nome !!}</td>

                            <td>


                                <a href="{{  route('pessoa.edit', [$pessoa->id]) }}" class="btn btn-primary"><span
                                        class="glyphicon glyphicon-pencil">
                                        </span>
                                    <i class="fas fa-edit"></i> Editar </a>


                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                   data-bs-target="#exampleModal-{{ $pessoa->id }}">
                                        Apagar
                                </a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal-{{ $pessoa->id }}" tabindex="-1"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="modal-body">
                                                    <p>Tem certeza que deseja excluir esta pessoa
                                                        {{ $pessoa->nome }}</p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <a href="{{ route('pessoa.destroy', [$pessoa->id]) }}"
                                                   class="btn btn-danger">
                                                    <span class="glyphicon glyphicon-remove"></span> <i
                                                        class="fas fa-trash"></i>
                                                    Sim
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- /.modal-dialog -->


                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div>

        </div>
        <div class="card-footer clearfix">
            {{ $pessoas->links() }}
        </div>
    </div>




@stop
@section('importjs')
    <script>

    </script>
@endsection
