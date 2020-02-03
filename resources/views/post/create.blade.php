@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      {{ Form::open(array('route' => 'post.store','method'=>'POST')) }}
      {{ csrf_field() }}
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <p>{{ Form::textarea('body', null, ['class' => 'textarea-wysiwyg', 'id' => 'form_body']) }}</p>
        <p>{{ Form::file('fileimage', ['id' => 'form_file']) }}</p>
        <p>{{ Form::submit('Сохранить', ['name' => 'submit', 'id' => 'form_submit']) }}</p>
        <div class="print_msg" style="display:none">
        <ul class=""></ul>
        </div>
      {{ Form::close() }}
    </div>
  </div>
</div>
@endsection