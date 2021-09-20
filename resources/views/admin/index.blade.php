@extends('layouts.clovis')

@section('content')
    <div class="container">
       <div class="card-header">
           <h3>Administrator</h3>
       </div>
       <table class="table">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>First Name</th>
                   <th>last Name</th>
                   <th>Email</th>
               </tr>
           </thead>
           <tbody>
               <tr>
                <td>{{ $loggedUserInfo['id'] }}</td>
                 <td>{{ $loggedUserInfo['fname'] }}</td>
                 <td>{{ $loggedUserInfo['lname'] }}</td>
                 <td>{{ $loggedUserInfo['email'] }}</td>
                 <td><a href="{{ route('clovis.logout') }}">logout</a></td>
               </tr>
           </tbody>
       </table>
    </div>
@endsection
