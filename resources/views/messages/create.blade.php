@extends('layouts.main')
@section('content')
    <div>
        <form action = "{{ route('store') }}" method="post">
            @csrf
            <label for="exampleFormControlTextarea1" class="form-label">message text</label>
            <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3"></textarea>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
