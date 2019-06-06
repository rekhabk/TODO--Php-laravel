@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h3>Edit Biodata </h3>
      </div>
    </div>

    @if ($errors->any())
      <div class="alert alert-danger">
        <strong>Whoops! </strong> there where some problems with your input.<br>
        <ul>
          @foreach ($errors as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{route('biodata.update',$biodata->id)}}" method="post">
      @csrf
      @method('PUT')
      <div class="row">
        <div class="col-md-12">
          <strong>Nama  :</strong>
          <input type="text" name="name" class="form-control" value="{{$biodata->name}}">
        </div>
        <div class="col-md-12">
          <strong>Content :</strong>
          <textarea class="form-control" name="content" rows="8" cols="80">{{$biodata->content}}</textarea>
        </div>

        <div class="col-md-12">
          <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
          <button type="submit" class="btn btn-sm btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
@endsection