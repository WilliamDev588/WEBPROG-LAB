@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    View profile
                </div>

                <div class="card-body">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Full Name') }}</label>
                            {{ Auth::user()->fullname }}
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

                            <div class="col-md-6">
                                {{ Auth::user()->email }}
                            </div>
                        </div>
                        @if(Auth::user()->email =='admin@gmail.com')
                            <div class="row mb-3">
                                <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    Admin
                            </div>
                            @else
                            <div class="row mb-3">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }}</label>
    
                                <div class="col-md-6">
                                    {{ Auth::user()->address }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="gender" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }}</label>
    
                                <div class="col-md-6">
                                    {{ Auth::user()->gender }}
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="Role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
    
                                <div class="col-md-6">
                                    Member
                                </div>
                            </div>
                        @endif
                        <div class="form-group row mb-0">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    Log Out
                                </button>
                            </div>
                            <div class="col-md-6">
                            @if(Auth::user()->email =='admin@gmail.com')
                                <button type="submit" class="btn btn-primary">
                                  View All User's Transaction
                                 </button>
                                @else
                                <button type="submit" class="btn btn-primary">
                                    View User's Transaction
                                </button>
                            @endif
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-primary">
                                    <a href="{{url('update_profile')}}" style="text-decoration: none; color:white">
                                    Update Profil
                                    </a>
                                </button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection