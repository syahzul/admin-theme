@extends('layouts.app')

@section('page_title', 'User Manager')
@section('page_heading', 'User Manager')

@section('main-content')
    <div class="box">
        <div class="box-header">
            <h3 class="box-title">List All Users</h3>
        </div>
        <div class="box-body">
            <table id="users-index" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(function () {
            $('#users-index').DataTable();
        });
    </script>
@endsection