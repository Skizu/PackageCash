@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Envelope</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ route('envelope.update', [$envelope->id]) }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">

                            <div class="form-group">
                                <label for="name" class="col-md-4 control-label">Name</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name"
                                           value="{{ old('name', $envelope->name) }}" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="colour" class="col-md-4 control-label">Colour</label>

                                <div class="col-md-6">
                                    <select id="colour" class="form-control" name="colour">
                                        <option>Please Select</option>
                                        @foreach(App\Envelope::$colours as $colour)
                                            <option value="{{ $colour  }}"
                                                    @if($colour == $envelope->colour)selected="selected"@endif>
                                                {{ ucwords($colour) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="package" class="col-md-4 control-label">Package</label>

                                <div class="col-md-6">
                                    <select id="package" class="form-control" name="package">
                                        <option value>None</option>
                                        @foreach($packages as $package)
                                            <option value="{{ $package->id  }}"
                                                    @if($package == $envelope->package)selected="selected"@endif>
                                                {{ ucwords($package->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection