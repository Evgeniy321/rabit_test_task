@extends('layouts.main')
@section('content')
    <div>
        <form action = "{{ route('store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="mb-3">
                <label for="exampleInputName1" class="form-label">User name</label>
                <input type="text" name="name" class="form-control" id="exampleInputName1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">message text</label>
                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
