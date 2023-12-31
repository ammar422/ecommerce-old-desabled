@extends('layouts.admin.admin')
@section('content')
    @include('includes.sidebars.adminSidebar')
    @include('includes.navbars.adminNavbar')


    {{ $langs }}

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">

            <div class="col-12">
                <div class="bg-secondary rounded h-100 p-4">
                    <h6 class="mb-4">Languages</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Abbr</th>
                                    <th scope="col">Local</th>
                                    <th scope="col">Direction</th>
                                    <th scope="col">Active</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($langs  as $lang)
                                <tr>
                                    <th scope="row">{{ $lang->id }}</th>
                                    <td>{{ $lang->name }}</td>
                                    <td>{{ $lang->abbr }}</td>
                                    <td>{{ $lang->local }}</td>
                                    <td>{{ $lang->direction }}</td>
                                    <td>{{ $lang->active}}</td> 
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->
@endsection
