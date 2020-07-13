@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Users') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif




                            <table class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">#</thscope>
                                    <th scope="col">name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Roles</th>
                                    <th scope="col">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            {{
                                               implode(',', $user->roles()->get()->pluck('name')->toArray() )

                                             }}</td>
                                        <td>
                                            @can('edit-users')
                                            <a href="{{route('admin.users.edit',$user->id)}}">
                                               <button type="button" class="btn btn-primary float-left">Edit</button>
                                            </a>
                                            @endcan

                                            @can('delete-users')
                                              <a href="{{route('admin.users.destroy',$user->id)}}">
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                    @csrf
                                                    {{ method_field('DELETE')}}
                                                    <button type="submit" class="btn btn-warning float-left">Delete</button>
                                                </form>
                                              </a>
                                             @endcan
                                        </td>
                                    </tr>
                                @endforeach

                                </tbody>
                            </table>





                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
