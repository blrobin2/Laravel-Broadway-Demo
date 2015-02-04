@extends('parts::layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <h1 class="page-header">Parts</h1>
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary pull-right" data-toggle="modal" data-target="#createPartModal">Create part</a>
        </div>
    </div>

    @include('parts::partials.notifications')

    <table class="table table-hover">
        <thead>
            <th>Part uuid</th>
            <th>Manufacturer Name</th>
        </thead>
        <tbody>
            <?php foreach($parts as $part): ?>
                <tr>
                    <td>{{ $part->manufacturedPartId  }}</td>
                    <td>{{ $part->manufacturerName }}</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <div class="modal fade" id="createPartModal" tabindex="-1" role="dialog" aria-labelledby="Create a part" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create a part</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route' => 'parts.store', 'method' => 'post']) !!}
                        <div>
                            {!! Form::label('manufacturer-name', 'Manufacturer name:') !!}
                            {!! Form::text('manufacturer-name', Input::old('manufacturer-name'), ['class' => 'form-control', 'placeholder' => 'Manufacturer name']) !!}
                            {!! $errors->first('manufacturer-name', '<span class="help-block">:message</span>') !!}
                        </div>
                    {!! Form::close() !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>
    </div>
@stop