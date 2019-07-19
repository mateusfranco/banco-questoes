@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">nome</th>
                            <th scope="col">dificuldade</th>
                            <th scope="col">assunto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $i)
                            <tr>
                                <td name="id">{{$i->id}}</td>
                                <td><a class="btn btn-link" href="{{route('question.explain',$i->id)}}">{{$i->name}}</a></td>
                                <td>{{$i->level}}</td>
                                <td>{{$i->about}}</td>
                            </tr>    
                        @empty
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    {{$questions->links()}}
                    <form action="{{route('question.select.reset')}}" method="post">
                        @csrf
                        <button class="mx-3 btn btn-danger" type="submit">reset</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card-body">
                @if (Session::get('selecteds'))
                    @foreach (Session::get('selecteds') as $i)
                        @if ($i['selected'])
                            <div class="row">
                                <h5>questao {{ $i['id'] }} selecionada </h5>
                            </div>    
                        @endif     
                    @endforeach    
                @endif
            </div>
        </div>
        <div class="row">
            <a href="{{route('questions.add')}}" class="btn btn-primary"> adicionar questoes</a>
            <a href="#" class="btn btn-primary mx-3"> imprimir pdf </a>
        </div>
    </div>
@endsection