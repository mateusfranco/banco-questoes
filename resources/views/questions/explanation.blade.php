@extends('layouts.app')

@section('content')
    <div class=container>
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <div class="row">
                    <h1 class="mx-auto">{{$expecificQuestion->name}}</h1>
                </div>
                <div class="row">
                    <h3>
                        {{$expecificQuestion->text}}
                    </h3>
                </div>
                <div class="row my-4">
                    <div class="col-6">
                        <div class="row">
                            <h5 class="mx-2">dificuldade:</h5>
                            <h5>{{$expecificQuestion->level}}</h5>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="row">
                            <h5 class="mx-2">assunto: </h5>
                            <h5>{{$expecificQuestion->about}}</h5>
                        </div>    
                    </div>    
                </div>
                <div class="row">
                    <form action="{{route('question.select')}}" method="post">
                        @if($expecificQuestion->selected)
                            <input type="hidden" name="id" value="{{$expecificQuestion->id}}">
                        @else
                            
                        @endif
                    </form>    
                </div>
            </div>
        </div>
    </div>
@endsection