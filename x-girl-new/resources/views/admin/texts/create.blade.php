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
          <div class="form-group {{ $errors->has('page_key') ? ' has-danger' : '' }}">
              <label class="control-label" for="page_key">
                  page_key <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('page_key'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('page_key') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="page_key" class="form-control" id="page_key"
                     value="{{ old('page_key') ?: $item['page_key'] }}" placeholder="page_key">
          </div>
      </div>

  </div>
  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('block_key') ? ' has-danger' : '' }}">
              <label class="control-label" for="block_key">
                  block_key <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('block_key'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('block_key') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="block_key" class="form-control" id="block_key"
                     value="{{ old('block_key') ?: $item['block_key'] }}" placeholder="block_key">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('page_name') ? ' has-danger' : '' }}">
              <label class="control-label" for="page_name">
                  Назва страницы <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('page_name'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('key') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="page_name" class="form-control" id="page"
                     value="{{ old('page_name') ?: $item['page_name'] }}" placeholder="page_name">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('block_name') ? ' has-danger' : '' }}">
              <label class="control-label" for="block_name">
                  Назва блок <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('block_name'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('key') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="block_name" class="form-control" id="block_name"
                     value="{{ old('block_name') ?: $item['block_name'] }}" placeholder="Блок">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
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
              <textarea type="text" name="text" class="form-control" id="text" placeholder="Текст (HTML)">{{ old('text') ?: $item['text'] }}</textarea>
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
