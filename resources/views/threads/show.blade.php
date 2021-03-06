@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>{{ $thread->title }}</h2>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                   <small>Criado por: {{ $thread->user->name}} | {{ $thread->created_at->diffForHumans() }}</small>
                </div>
                <div class="card-body">{{ $thread->body }}</div>
                <div class="card-footer">
                    <a href="{{ route('threads.edit', $thread->slug)}}" class="btn btn-sm btn-primary">Editar</a>
                    <a class="btn btn-sm btn-danger" href="{{ route('threads.destroy', $thread->slug)}}"
                        onclick="event.preventDefault();
                        document.getElementById('delete-form').submit();">
                        {{ __('Remover') }}
                    </a>

                 <form id="delete-form" action="{{ route('threads.destroy', $thread->slug)}}" method="POST" class="d-none">
                     @csrf
                     @method('DELETE')
                 </form>

                </div>
            </div>
            <hr>
        </div>

        @if ($thread->replies->count())
            <div class="col-12">
                <h5>Respostas</h5>
                <hr>
                @foreach ( $thread->replies as $reply )
                    <div class="card mt-3">
                        <div class="card-body">
                            {{ $reply->reply}}
                        </div>
                        <div class="card-footer">
                            <small>Respondido por: {{ $reply->user->name}} | {{ $reply->created_at->diffForHumans() }}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif


        <div class="col-12">
            <hr>
            <form action="{{route('replies.store')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="hidden" name="thread_id" value="{{ $thread->id }}">
                    <label for="">Responder</label>
                    <textarea name="reply" cols="30" rows="5" class="form-control @error('reply') is-invalid @enderror">{{ old('reply') }}</textarea>
                    @error('reply')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-success">Responder</button>
            </form>

        </div>

    </div>
@endsection
