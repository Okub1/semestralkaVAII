@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if (empty($developer))
                    <h1>Add developer</h1>
                @else
                    <h1>Editing: {{$developer->name}}</h1>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (empty($developer))
                    <form method="post" action="{{action('DevelopersController@store')}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><b>meno</b></label>
                            <input type="text" name="name" class="form-control"/>

                        </div>
                        <div class="form-group">
                            <label><b>popis</b></label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label><b>adresa</b></label>
                            <input type="text" name="address" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                @else
                    <form method="post" action="{{action('DevelopersController@store', $developer->id)}}">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label><b>meno</b></label>
                            <input type="text" name="name" class="form-control" value="{{$developer->name}}"/>

                        </div>
                        <div class="form-group">
                            <label><b>popis</b></label>
                            <textarea name="description" class="form-control">{{$developer->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label><b>adresa</b></label>
                            <input type="text" name="address" class="form-control"  value="{{$developer->address}}"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
@endsection
