@extends('layouts.app')
@section('content')
<a class="text-light" href="{{route('employees.index')}}">Go Home</a>

        <div class="card">
            <div class="card-body">
                <p style="font-size:20px; font-weight:bold;">Create New Employee</p>
                <form action="{{route('employees.store')}}" class="was-validated" method="POST" novalidate>
                    @csrf
                    <div class="form-group has-validation">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control {{$errors->has('name')?'is-invalid':''}}" required>
                        @if($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('name')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control{{$errors->has('email')?'is-invalid':''}}" required>
                        @if($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('email')}}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="form-group has-validation">
                        <label for="joining_date">Joining date</label>
                        <input type="date" name="joining_date" id="joining_date" class="form-control{{$errors->has('joining_date')?'is-invalid':''}}" required>
                        @if($errors->has('joining_date'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('joining_date')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="salary">salary</label>
                        <input type="number" name="salary" id="salary" class="form-control{{$errors->has('salary')?'is-invalid':''}}" required>
                        @if($errors->has('salary'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('salary')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group has-validation">
                        <label for="is_active">Active</label><br>
                        <input type="checkbox" name="is_active" id="is_active" value="1" required>
                        <span class="invalid-feedback">
                            <strong>Error</strong>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Employee</button>
                </form>
            </div>
        </div>
@endsection
