@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-md-6">
      @if ($edit)
        <h2>Редактировать текстовый блок</h2>
      @else
        <h2>Добавить текстовый блок</h2>
      @endif
    </div>

  </div>

<br/>

@if ($errors)
  @php
    // dd($errors);
  @endphp
@endif

<form method="POST" action="{{ $action }}">

  {{ csrf_field() }}
  {!! method_field($method) !!}

  <input type="hidden" name="id" value="{{ $item['id'] or null }}">

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">page_key</label>
              <input readonly="readonly" type="text" name="page_key" class="form-control" value="{{ $item['page_key'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">block_key</label>
              <input readonly="readonly" type="text" name="block_key" class="form-control" value="{{ $item['block_key'] }}" >
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Название страницы</label>
              <input readonly="readonly" type="text" name="page_name" class="form-control" value="{{ $item['page_name'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Название блока</label>
              <input readonly="readonly" type="text" name="block_name" class="form-control" value="{{ $item['block_name'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-8">
          <div class="form-group {{ $errors->has('text') ? ' has-danger' : '' }}">
              <label class="control-label" for="text">
                  Текст (HTML) <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('text'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('text') }}
                      </i>
                  @endif
              </label>
              <textarea rows="10" type="text" name="text" class="form-control" id="text" placeholder="Текст (HTML)">{{ old('text') ?: $item['text'] }}</textarea>
          </div>
      </div>
  </div>


  <div class="row">
    <div class="form-group col-md-4" style="margin-top:60px">
      <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
  </div>


</form>

@endsection
