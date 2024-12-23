@extends('layouts.main')
@section('content')
    <div>
        <h1>Choice message to delete</h1>
    </div>
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
                        <form action="{{ route('destory', $message->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" class="btn btn-danger" value="{{ $message->id }}">
                        </form>

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
