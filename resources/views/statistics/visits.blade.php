@extends('app')
@section('content')
    <table class="table table-borderless">
        <thead>
        <tr>
            <th scope="col">Browser</th>
            <th scope="col">Devise</th>
            <th scope="col">Client IP</th>
            <th scope="col">Platform</th>
        </tr>
        </thead>
        <tbody>
        @foreach($sessions as $session)
            <tr>
                <td>{{$session->agent->browser . ' - ' . $session->agent->browser_version}}</td>
                <td>{{$session->device->kind . ' - ' . $session->device->platform}}</td>
                <td>{{$session->client_ip}}</td>
                <td>{{$session->device->platform }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

