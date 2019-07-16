@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="card shadow-sm p-3 mb-5 bg-white rounded">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ID</th>
                            <th scope="col">nome</th>
                            <th scope="col">dificuldade</th>
                            <th scope="col">assunto</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($questions as $i)
                            <tr>

                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    </div>
                                </th>
                                <td>{{$i->id}}</td>
                                <td>{{$i->name}}</td>
                                <td>{{$i->level}}</td>
                                <td>{{$i->about}}</td>
                            </tr>    
                        @empty
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <button type="button" class="btn btn-primary" {{ url('questions/add', []) }}></button>

        </div>
    </div>
@endsection