@extends('auth.layouts.app')

@section('title', 'Dashboard')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1>Welcome, {{ $user->name }}!</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
</form>

<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Registration Date</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{ $user->email }}</td>
            <td>{{ $user->phone_number }}</td>
            <td>{{ $user->created_at->format('Y-m-d') }}</td>
        </tr>
    </tbody>
</table>
@endsection
