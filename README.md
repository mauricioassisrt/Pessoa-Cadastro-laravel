# Pessoa-Cadastro-laravel
 Crud de cadastro de pessoa completo com laravel 

vamos rodar o comando composer update para atualizar as dependencias 

 vamos copiar o arquivo .env.example com o comando abaixo

copy .env.example .env

vamos configurar o banco de dados 



DB_CONNECTION=mysql

acima define o tipo de conexão 

DB_HOST=127.0.0.1

tipo de host se for externo colocar URL 

DB_PORT=3306

porta do banco de dados


DB_DATABASE=laravel

nome do banco da dados 

DB_USERNAME=root

DB_PASSWORD=

user e senha 

após isso rodar o comando 
php artisan key:generate
para gerar uma nova chave secreta, cada projeto possui a sua, ela fica declarada dentro do arquivo env

após isso feito só basta rodar o comando php artisan serve


agora vamos  o modelo controler e migration

 php artisan make:model Pessoa -mcr
 
 M = Model
 
 C= Controller 
 
 R= Resource ROUTE 
 

agora vamos criar os atributos que terá na tabela pessoa 

 // os tipos é definidos aqui é criados no banco ele cria no plural <br>
        Schema::create('pessoas', function (Blueprint $table) { <br>
            $table->id();<br>
            $table->string("nome");<br>
            $table->string("sobre_nome");<br>
            $table->date("nascimento");<br>
            $table->char("sexo");<br>
            $table->timestamps();<br>
        });<br>
        <br>
 após isso rodar o comando php artisan migrate 
 
 agora vamos na model e vamos definir os atributos 
 
 // na model vamos definir as fillable que serve para utilizar ao salvar o objeto pessoa ou recuperar-lo
     protected $fillable = [
         'nome', 'sobre_nome', 'nascimento', 'sexo',
     ];
     
   //
   
agora vamos criar as routes


//rotas autenticadas
Route::group(['middleware' => 'auth'], function () {

});

// o name serve para definir o route por exemplo da forma que está aqui posso alterar 
a URI pessoas sem afetar o funcionamento do sistema 

Route::get('pessoas', "PessoaController@index")->name('index');
Route::get('pessoas/cadastrar', 'PessoaController@create')->name('pessoa.create');
Route::post('pessoas/novo', 'PessoaController@store')->name('pessoa.store');
Route::get('pessoas/editar/{pessoa}', 'PessoaController@edit')->name('pessoa.edit');
Route::patch('pessoas/atualizar/{id}', 'PessoaController@update')->name('pessoa.update');
Route::get('pessoas/apagar/{user}', 'PessoaController@destroy')->name('pessoa.destroy');
Route::get('pessoas/visualizar/{user}', 'PessoaController@show')->name('pessoa.show');

 agora após isso vamos criar o layout 
 
 <!doctype html>
 <html lang="pt">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport"
           content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
     <title>App - @yield('title')</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
           integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     @yield('topo')
 </head>
 <body>
 @section('sidebar')
     <nav class="navbar navbar-expand-lg navbar-light bg-light">
         <div class="container-fluid">
             <a class="navbar-brand" href="#">Crud pessoa</a>
             <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                     aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                 <span class="navbar-toggler-icon"></span>
             </button>
             <div class="collapse navbar-collapse" id="navbarNav">
                 <ul class="navbar-nav">
                     <li class="nav-item">
                         <a class="nav-link active" aria-current="page" href="#">Novo </a>
                     </li>
                     <li class="nav-item">
                         <a class="nav-link" href="#">Pessoas </a>
                     </li>
 
                 </ul>
             </div>
         </div>
     </nav>
 @show
 <div class="container">
     @yield('content')
 </div>
 </body>
 <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
         integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
         crossorigin="anonymous"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
         integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
         crossorigin="anonymous"></script>
 @yield('importjs')
 </html>

 
 INDEX 
 
 
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
     <!--IMPORT js -->
 @endsection

form

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

CONTROLLER 


/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "PESSOAS INDEX ";
        $pessoas = Pessoa::paginate(20);
        return view('index', compact('title', 'pessoas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "PESSOAS INDEX ";
        return view('form', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pessoa::create($request->all());
        return redirect('pessoas');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function edit(Pessoa $pessoa)
    {
        $title = "Editar";
        return view('form', compact('title', 'pessoa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $pessoaUpdate = Pessoa::findOrFail($id);

            $pessoaUpdate->update($request->all());

            return redirect('pessoas');
        } catch (\Throwable $th) {
            dd($th);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Pessoa $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
    }


 