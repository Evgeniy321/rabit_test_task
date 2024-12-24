@extends('layouts.main')
@section('content')
    <div>
        <table class="table table-striped">
            <tr>
                <th>
                    #
                </th>
                <th>
                    message
                </th>
                <th>
                    email
                    <a href="{{ route('index', ['sort_by' => 'email', 'sort_dir' => 'asc']) }}">&darr;</a>
                    <a href="{{ route('index', ['sort_by' => 'email', 'sort_dir' => 'desc']) }}">&uarr;</a>
                </th>
                <th>
                    username
                    <a href="{{ route('index', ['sort_by' => 'name', 'sort_dir' => 'asc']) }}">&darr;</a>
                    <a href="{{ route('index', ['sort_by' => 'name', 'sort_dir' => 'desc']) }}">&uarr;</a>
                </th>
                <th>
                    craeated date
                    <a href="{{ route('index', ['sort_by' => 'created_at', 'sort_dir' => 'asc']) }}">&darr;</a>
                    <a href="{{ route('index', ['sort_by' => 'created_at', 'sort_dir' => 'desc']) }}">&uarr;</a>
                </th>
            </tr>
            @foreach ($messages as $message)
                <tr>
                    <td>
                        {{ $message->id }}
                    </td>
                    <td>
                        {{ $message->text }}
                    </td>
                    <td>
                        {{ $message->user->email }}
                    </td>
                    <td>
                        {{ $message->user->name }}
                    </td>
                    <td>
                        {{ $message->created_at }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        {{ $messages->links() }}
    </div>
@endsection
