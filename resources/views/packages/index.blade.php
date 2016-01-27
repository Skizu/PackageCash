@extends('app')

@section('content')
    <div class="page container">
        <div class="header">
            <h3>Packages</h3>
        </div>
        <div class="content">
            <table class="table content">
                <thead>
                <tr>
                    <th>Package</th>
                    <th class="text-right">Balance</th>
                </tr>
                </thead>
                <tbody>
                @foreach(Auth::user()->packages as $package)
                    <tr class="clickable" data-toggle="collapse" data-target="#package_{{ $package->id }}"
                        aria-expanded="false" aria-controls="package_{{ $package->id }}">
                        <td>{{ $package->name }}</td>
                        <td class="text-right">{{ $package->formatMoney('amount') }}</td>
                    </tr>
                    <tr class="collapse" id="package_{{ $package->id }}">
                        <td colspan="2">
                            @include('packages.package')
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection