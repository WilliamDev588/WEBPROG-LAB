@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Home') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if (Auth::check())
                        <h2>Welcome, {{Auth::user()->name}}</h2>
                    @else
                        <h2>Welcome guest</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
