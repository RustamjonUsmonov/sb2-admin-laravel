@extends('layouts.sb2')
@section('title')
    Users Management
@endsection
@section('content')
    <div class="card shadow col-12">
        <div class="row">
            <div
                class="col-lg-12 margin-tb  card-header d-flex justify-content-between m-0 font-weight-bold text-primary">
                <div>
                    Users Management
                </div>
                <div>
                    @can('role-create')
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
                    @endcan
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover text-center">
                <thead>
                <th>No</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Roles</th>
                <th width="280px">Action</th>
                </thead>
                @foreach ($users as $key => $user)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <td class="text-primary font-weight-bold">{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>
                            @forelse($user->roles as $value)
                                <label class="badge badge-success">{{ $value->name }}</label>
                            @empty
                                <label class="badge badge-info">No Roles</label>
                            @endforelse
                        </td>
                        <td class="d-flex justify-content-around">
                            <a href="{{ route('users.show',$user->id) }}" class="btn btn-info">
                                <i class="fas fa-info-circle icon text-white-50"></i>
                            </a>
                            @can('role-edit')
                                <a class="btn btn-primary mx-1"
                                   href="{{ route('users.edit',$user->id) }}">
                                    <i class="fas fa-pen icon text-white-50"></i></a>
                            @endcan
                            @can('role-delete')
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn badge-danger " type="submit">
                                        <i class="fas fa-trash-alt icon text-white-50"></i>
                                    </button>
                                </form>
                            @endcan
                        </td>

                    </tr>
                @endforeach
            </table>
            {!! $users->links() !!}
        </div>
    </div>
@endsection
