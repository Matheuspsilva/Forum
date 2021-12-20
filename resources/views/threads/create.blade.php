@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Criar Tópico</h2>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('threads.store')}}" method="post">
                @csrf

                <div class="form-group">
                    <label>Título Tópico</label>
                    <input type="text" class="form-control @error('title') is-invalid  @enderror" name="title" >
                    @error('title')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Conteúdo Tópico</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control @error('body') is-invalid  @enderror"></textarea>
                    @error('body')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-lg btn-success">Criar Tópico</button>
            </form>
        </div>
    </div>
@endsection
