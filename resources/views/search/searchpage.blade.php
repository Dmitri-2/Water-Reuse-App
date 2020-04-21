@extends("layouts.master")

@section('body')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"><h3>Search for Location </h3></div>
                    <div class="card-body">

                        <h3>You are:
                            @if(Auth::check())
                                Logged In!
                            @else
                                Not Logged In!
                            @endif
                        </h3>

                        {{--<form  method="POST" class="form-inline mt-3" action={{route('searchResults')}}>--}}

                            <form  method="POST" class="form-inline mt-3">
                        
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label for="search">Address</label>
                                <input type="text" class="form-control" id="search" placeholder="Address...">
                            </div>
                            <button type="submit" class="btn btn-primary"> Search </button>
                        </form>
                        <br>
                  
                        <br><br>
                        <hr>
                        <form>
                            <div class="form-group row">
                                <label for="stateSelect" class="col-md-4 col-form-label"> State </label>
                                <div class="col-md-6">

                                    {{--Here in the select, we can generate the initial set of states with PHP --}}

                                    <select id="stateSelect" class="form-control">
                                        <option value="" disabled selected>Select a state</option>
                                        @foreach($states as $state)
                                            <option value="{{$state->state_id}}">{{$state->stateName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>

                        <div class="card">
                            <div id="stateOutput" class="card-body">
                                Select A county
                            </div>
                        </div>

                        <select id="countySelect" class="form-control">
                            <option value="" disabled selected>Select a state first</option>
                        </select>


                        

                        <div class="card">
                            <div id="stateOutput" class="card-body">
                                Select A Cityy
                            </div>
                        </div>


                        <select id="citySelect" class="form-control">
                            <option value="" disabled selected>Select a County first</option>
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push("js")
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script>
        $( "#stateSelect" ).change(function() {
            console.log(stateSelect.value);
            axios.get("{{route("counties-api")}}"+"/"+stateSelect.value)
                .then(function (response) {
                    console.log("Response: " + response);
                    console.log(response.data);
                    $("#countySelect").html(response.data.map(obj => "<option value='"+obj.county_id+"'>"+obj.countyName+"</option>").join("\n"));
                })
                .catch(function (error) {
                    console.log(error);
                })
        });

        $( "#countySelect" ).change(function() {
            axios.get("{{route("cities-api")}}"+"/"+countySelect.value)
                .then(function (response) {
                    console.log("Response: " + response);
                    console.log(response.data);
                    $("#citySelect").html(response.data.map(obj => "<option value='"+obj.city_id+"'>"+obj.cityName+"</option>").join("\n"));
                })
                .catch(function (error) {
                    console.log(error);
                })
        });
    </script>
@endpush

