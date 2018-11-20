@extends('layouts.admin')

@section('content')

  <div class="row">

    <div class="col-md-6">
      <h2>Обратная связь</h2>
    </div>

  </div>

<br/>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Время</label>
              <input readonly="readonly" type="text" name="name" class="form-control" value="{{ $item['created_at'] }}" >
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Имя</label>
              <input readonly="readonly" type="text" name="name" class="form-control" value="{{ $item['name'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Телефон</label>
              <input readonly="readonly" type="text" name="phone" class="form-control" value="{{ $item['phone'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="name">Email</label>
              <input readonly="readonly" type="text" name="email" class="form-control" value="{{ $item['email'] }}" >
          </div>
      </div>
  </div>

  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label class="control-label" for="description">
                  Коментарий
                  <br>
              </label>
              <textarea readonly="readonly"  type="text" name="description" class="form-control" >{{ $item['comment'] }}</textarea>
          </div>
      </div>
  </div>



@endsection
