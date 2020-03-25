@extends('layouts.app')

@section('title', 'sensors')

@section('content')
    <form class="form-group" method="POST" action="/sensors">
        <div class="form-group">
            <label for="">Temperatura</label>
            <input type="text" name="temperatura" class="from-control">
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
    
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
    <body>
        <p>Aqui se mostraran los datos</p>
    </body>
</html> --}}