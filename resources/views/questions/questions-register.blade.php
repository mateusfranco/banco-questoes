@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="" method="post">
            @csrf
            <label for="text">Question</label>
            <input type="text" name="text" id="text">
        </form>
    </div>
@endsection