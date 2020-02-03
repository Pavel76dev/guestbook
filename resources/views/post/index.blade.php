@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        @forelse ($posts as $post)
        <div>
          {!! $post->body !!}
          <p>By {{ $post->user->email }}</p>
        </div>
            <span>{{$post->comments->count()}} {{ str_plural('comment', $post->comments->count()) }}</span>
            <p>By {{ $post->user->email }} on {{ $post->created_at }}</p>
            @if (Auth::check())
              <a href="{{URL::to('/')}}/post/{{ $post->id }}/edit"  class="btn btn-primary btn-xs"
                               data-toggle="tooltip" data-placement="top" title="Редактировать">Edit</a>
              <form action="{{URL::to('/')}}/post/{{ $post->id }}" method="POST">
                  {{ csrf_field() }}
                  {{ method_field('DELETE') }}
                  <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
              </form>
            @endif
        @empty
          <p>No posts</p>
        @endforelse
          {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
