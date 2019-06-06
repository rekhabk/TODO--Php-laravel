@extends('layouts.app')
@section('content')
    
<div class="container">
<div class="row">
    <div class="col-md-12">

        <h3>Details </h3>
        <hr>

    </div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>
                Name:
            </strong>
            {{$biodata->name}}
        </div>
    </div>

    <div class="col-md-12">
            <div class="form-group">
                <strong>
                    Content:
                </strong>
                {{$biodata->content}}
            </div>

        </div>

        <div class="col-md-12">
            <a href="{{route('biodata.index')}}" class="btn btn-sm btn-success">Back</a>
            
        </div>
</div>
</div>

</div>
@endsection