@extends('backend.layouts.master')

@section('main_content')
    {{-- success message --}}
    @include('backend.layouts.includes.message')


    <div class="container">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="col-md-1">SN</th>
                                <th class="col-md-2">User Name</th>
                                <th class="col-md-2">Role Name</th>

                                <th class="col-md-2">Actions</th>


                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $sn = 1
                            @endphp
                            @foreach ($users as $user)


                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ roleName($user->role_id) }}</td>
                                    <td>
                                        <button class="btn btn-sm btn-outline-dark">UPDATE ROLE </button>
                                    </td>

                            @endforeach                    
                                
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
@endsection