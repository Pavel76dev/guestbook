@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      {{ Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PATCH', 'id' => 'edit_form']) }}
      {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <p>{{ Form::textarea('body', old('body'), ['class' => 'textarea-wysiwyg', 'id' => 'form_body']) }}</p>
        <p>{{ Form::file('fileimage', ['id' => 'form_file']) }}</p>
        @if ($post->image != '')
        <img src="{{ Storage::url($post->image) }}" height="30px" />
        @endif
        <p>{{ Form::submit('Сохранить', ['name' => 'submit', 'id' => 'form_submit']) }}</p>
        <div class="print_msg" style="display:none">
        <ul class=""></ul>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection
