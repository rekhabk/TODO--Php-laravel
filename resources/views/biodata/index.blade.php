@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-10">

            <h3>This is Biodata</h3>

        </div>
        <div class="col-sm-2">

            <a class="btn btn-sm btn-success" href="{{route('biodata.create')}}">
            Create New BioData
            </a>
        </div> 
    </div>

        @if($message=Session::get('success'))
            <div class="alert alert-primary">
                <p>{{$message}}</p>
        </div>
        @endif

        <table class="table table-hover table-sm">

            <tr>
                <th width="50px">
                    <b>No.</b>
                </th>

                <th width="300px">
                    <b>Person</b>
                </th>

                <th>
                    <b>Details</b>
                </th>
                <th width="180px"> Action</th>
            </tr>
        
        @foreach($biodatas as $biodata)
            <tr>
                <td>  
                      <b> {{++$i}}.</b>
                      <td>{{$biodata->name}}</td>
                      <td>{{$biodata->content}}</td>    

                </td>
                <td>
                <form action="{{route('biodata.destroy',$biodata->id)}}" method="post">
                    
                    
                    <a class="btn btn-sm btn-success" href="{{route('biodata.show', $biodata->id)}}">SHOW </a>
                     
                    <a class="btn btn-sm btn-warning" href="{{route('biodata.edit', $biodata->id)}}">EDIT </a>
                     
                    
                    @csrf 
                        
                    
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" name="button">DELETE</button>
                </form>
            </td>
            </tr>

        @endforeach
        </table>
        {!! $biodatas->links() !!}
</div>
        @endsection