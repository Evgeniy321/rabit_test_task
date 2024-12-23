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
                </th>
                <th>
                    username
                </th>
                <th>
                    updated date
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
                        {{ $message->updated_at }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        {{ $messages->links() }}
    </div>
@endsection
