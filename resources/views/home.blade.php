@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @role('admin')
                    <p>This is visibe to users with the admin role, Gets translated to \Larateust::hasRole(Admin)</p>
                    @endrole

                    @role('pengguna')
                    <p>This is visibe to users with the admin role, Gets translated to \Larateust::hasRole(Pengguna)</p>
                    @endrole
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
