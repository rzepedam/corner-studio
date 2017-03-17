@extends('layouts.layout')

@section('title') Detalle Cliente @stop

@section('breadcrumb')
    <li><a href="{{ route('clients.index') }}">Clientes</a></li>
    <li class="active"><strong>Detalle</strong></li>
@stop

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="col-md-12">
                <div class="ibox float-e-margins">
                    <table class="table table-bordered table-striped">
                        <tbody>
                            <tr>
                                <td>Nombre</td>
                                <td class="text-center">{{ $client->full_name }}</td>
                            </tr>
                            <tr>
                                <td>Rut</td>
                                <td class="text-center">{{ $client->rut }}</td>
                            </tr>
                            <tr>
                                <td>Fecha Nacimiento</td>
                                <td class="text-capitalize text-center">{{ $client->birthday }}</td>
                            </tr>
                            <tr>
                                <td>Estado Civil</td>
                                <td class="text-center">{{ $client->maritalStatus->name }}</td>
                            </tr>
                            <tr>
                                <td>Nacionalidad</td>
                                <td class="text-center">{{ $client->country->name }}</td>
                            </tr>
                            <tr>
                                <td>Sexo</td>
                                <td class="text-center">{{ $client->is_male }}</td>
                            </tr>
                            <tr>
                                <td>Domicilio</td>
                                <td class="text-center">
                                    {{ $client->address->address }}
                                </td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="text-center">{{ $client->email }}</td>
                            </tr>
                            <tr>
                                <td>Teléfono 1</td>
                                <td class="text-center">{{ $client->address->phone1 }}</td>
                            </tr>
                            <tr>
                                <td>Teléfono 2</td>
                                <td class="text-center">{{ $client->address->phone2 }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@stop