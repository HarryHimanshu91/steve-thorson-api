@extends('layouts.main')

@section('content')
<div class="content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @can('isCommunity')
                            You are logged in with Community Role!
                        @endcan
                        @can('isAdmin')
                            You are logged in with Admin Role!
                        @endcan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
