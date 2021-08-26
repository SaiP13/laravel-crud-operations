@extends('layouts.app')
@section('title','users')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 col-md-offset-3">
            <div class="panel panel-default">
                @if (session('success'))
                      <center> <b style="color:rgb(10, 247, 10)" >{{ session('success') }}</b></center>
                      <center> <b style="color:red" >{{ session('error') }}</b></center>
                @endif
                <div class="panel-heading"><a href="{{ url('/') }}"> HOME </a>| USERS <p style="float: right"><a href="{{ url('/addUser') }}"><button> ADD NEW </button> </a></p></div>
                
                <div class="panel-body" style="color:red;">
                    <table >
                        <thead>
                            <tr>
                            <th width='100px'>UserID </th>
                            <th width='100px'>Name</th>
                            <th  width='200px'>Email</th>
                            <th  width='200px'>Date</th>
                            <th  width='100px'>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $i=0; @endphp
                            @foreach ($userData as $item)
                            @php $i++; @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ ucfirst($item->name) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ date('d-m-Y h:i a' ,strtotime($item->created_at)) }}</td>
                                <td><a href="{{route('editUser',$item->id) }}">Edit</a> | 
                                    <a href="{{route('deleteUser',$item->id)}}" onclick="return confirm('Are you sure');"> Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </thead>
                    </table>
                    <div style="float:right;">
                        {!! $userData->links() !!}
                    </div>
                </div>
                
                {{-- <div style="float:right">
                    {!! $userData->total() !!}
                </div> --}}
               
            </div>
        </div>
    </div>
    
</div>
@endsection
