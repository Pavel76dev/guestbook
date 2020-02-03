@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @forelse ($posts as $post)
        <div>
        <hr />
        @if ($post->image != '')
        <img src="{{ Storage::url($post->image) }}" height="50px" />
        @endif
        {!! $post->body !!}
          <p style="font-weight: bold;">
          {{ $post->user->email }}: {{ $post->created_at }}</p>
        </div>
        @if (Auth::check())
            <button
            name="{{ $post->id }}"
            class="btn btn-success btn-xs add_comment"
            title="Ответить">Ответить
            </button>
              @if ($post->comments->count() == 0)
              <a href="{{URL::to('/')}}/post/{{ $post->id }}/edit"
              class="btn btn-primary btn-xs"
              title="Редактировать">Редактировать
              </a>
              @endif
              {{ Form::model($post, ['route' => ['comment.update', $post->id], 'method' => 'PATCH']) }}
              <div style="display:none" id="add_comment_{{ $post->id }}">
              <p>{{ Form::textarea('body', '', ['class' => 'textarea', 'autocomplete' => 'off']) }}</p>
        <p>{{ Form::submit('Сохранить', ['name' => 'submit', 'class' => 'btn btn-success btn-xs']) }}</p>
        </div>
      {{ Form::close() }}
            @endif
            @forelse ($post->comments as $comment)
            <div class="col-md-offset-1">
            <hr />
          {!! $comment->body !!}
          <p style="font-weight: bold;"> 
          {{ App\User::find(1)->where('id', '=', $comment->user_id)->first()->email }}: {{ $comment->created_at }}</p>
        </div>        
        @empty
            @endforelse
        @empty
          <p>No posts</p>
        @endforelse
          {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
