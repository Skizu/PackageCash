@extends('app')
@section('content')
    <div class="page container">
        <div class="header">
            <h3>{{ $package->name }}</h3>
            <h6>Created: {{ $package->created_at->format('m/d/Y g:iA') }}</h6>
        </div>
        <div class="content">
            @include('packages.package')
        </div>
    </div>
@endsection