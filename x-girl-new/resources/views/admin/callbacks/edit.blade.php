@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-md-6">
      <h2>Обратная связь</h2>
    </div>

  </div>

<br/>

@if ($errors)
  @php
    // dd($errors);
  @endphp
@endif

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">

  {{ csrf_field() }}
  {!! method_field($method) !!}

  <input type="hidden" name="id" value="{{ $item['id'] or null }}">

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
              <label class="control-label" for="name">
                  Название <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('name'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('name') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="name" class="form-control" id="name"
                     value="{{ old('name') ?: $item['name'] }}" placeholder="Название">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('description') ? ' has-danger' : '' }}">
              <label class="control-label" for="description">
                  Описание <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('description'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('description') }}
                      </i>
                  @endif
              </label>
              <textarea type="text" name="description" class="form-control" id="description" placeholder="Описание">{{ old('description') ?: $item['description'] }}</textarea>
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('picture') ? ' has-danger' : '' }}">
              <label class="control-label" for="picture">
                  Изображение <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('picture'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('picture') }}
                      </i>
                  @endif
              </label>
              <input type="file" name="picture" class="form-control" id="picture" placeholder="Изображение">
          </div>
      </div>
  </div>

  @if ($edit && $item->picture)
  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="picture">
                  Текущее изображение
                  <br>
                  @if ($errors->has('picture'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('picture') }}
                      </i>
                  @endif
              </label>

               <img src="{{ $picture }}" style="max-width:350px"/>
          </div>
      </div>
  </div>
  @endif

  <div class="row">
    <div class="form-group col-md-4" style="margin-top:60px">
      <button type="submit" class="btn btn-success">Сохранить</button>
    </div>
  </div>


</form>

@endsection
