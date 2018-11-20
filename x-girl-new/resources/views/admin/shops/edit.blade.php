@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-md-6">
      @if ($edit)
        <h2>Редактировать магазин</h2>
      @else
        <h2>Добавить магазин</h2>
      @endif
    </div>

  </div>

<br/>

@if ($errors)
  @php
    //dd($errors);
  @endphp
@endif

<form method="POST" action="{{ $action }}" enctype="multipart/form-data">

  {{ csrf_field() }}
  {!! method_field($method) !!}

  <input type="hidden" name="id" value="{{ $item['id'] or null }}">

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('city') ? ' has-danger' : '' }}">
              <label class="control-label" for="city">
                  Город <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('city'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('city') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="city" class="form-control" id="city"
                     value="{{ old('city') ?: $item['city'] }}" placeholder="Город">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('street') ? ' has-danger' : '' }}">
              <label class="control-label" for="street">
                  Улица <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('street'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('street') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="street" class="form-control" id="street"
                     value="{{ old('street') ?: $item['street'] }}" placeholder="Улица">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
              <label class="control-label" for="phone">
                  Телефон <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('phone'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('phone') }}
                      </i>
                  @endif
              </label>
              <input type="text" name="phone" class="form-control" id="phone"
                     value="{{ old('phone') ?: $item['phone'] }}" placeholder="Телефон">
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group {{ $errors->has('map_iframe') ? ' has-danger' : '' }}">
              <label class="control-label" for="map_iframe">
                  iframe код карты <span class="text-danger">*</span>
                  <br>
                  @if ($errors->has('map_iframe'))
                      <i class="fa fa-times-circle-o text-danger">
                        {{ $errors->first('map_iframe') }}
                      </i>
                  @endif
              </label>
              <textarea type="text" name="map_iframe" class="form-control" id="description" placeholder="Описание">{{ old('map_iframe') ?: $item['map_iframe'] }}</textarea>
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
