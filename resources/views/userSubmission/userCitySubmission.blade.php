@extends('layouts.master')

@section('body')
    <div class="container">
    <div class="row my-3">
            <a href="{{route("userSubmission2")}}" class="btn btn-primary col-md-2"> <i class="fas fa-arrow-circle-left"></i> User Submissions </a>
        </div>
        <h2 class="text-center"> City Submissions </h2>
        <table class="table w-75 mt-4 mx-auto">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">user</th>
                    <th scope="col">Source</th>
                    <th scope="col">Destination</th>
                    <th scope="col">View</th>
                    <th scope="col">Action</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citySubmissions as $city)
                    <tr>
                        <th scope="row">{{$loop->index+1}}</th>
                        <td>{{$city->user->name}}</td>
                        <td> {{$city->source->node_name}}</td>
                        <td>{{$city->destination->node_name}}</td>
                        <td>
                            <a href="{{route('userCitySubmissionItem')."/".$city->id}}" class="btn btn-primary"> View </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('cityDelete') }}">
                                {{ csrf_field() }}
                                <input id="delete" name="delete" value="delete" hidden>
                                <input id="cityId-{{$city->id}}" name="id" value="{{$city->id}}" hidden>
                                <button type="submit" class="btn btn-danger">Decline</button>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('addCityMergeSubmit') }}">
                                {{ csrf_field() }}
                                <input id="cityId-{{$city->id}}" name="id" value="{{$city->id}}" hidden>
                                <button type="submit" class="btn btn-success">Approve</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
