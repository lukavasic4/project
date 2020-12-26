<?php ?>
<style>
    table, th, td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>
@if(session()->has('user'))
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
    </li>
@endif
<div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title-1 m-b-25">Users</h2>
                        <div class="table-responsive table--no-card m-b-10 m-l-10">
                            <table class="table table-striped bg-flat-color-5">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Password</th>
                                    <th>EmployeeId</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th>Login number</th>
                                    <th>Button</th>
                                </tr>
                                </thead>
                                <tbody id="galerija">
                                    @foreach($users as $u)
                                        <tr>
                                            <td>{{$u->id_user}}</td>
                                            <td>{{$u->username}}</td>
                                            <td>{{$u->password}}</td>
                                            <td>
                                                    <input type="text" value="{{$u->employee_id}}" readonly>
                                            </td>
                                            <td>{{$u->uloga}}</td>
                                            <td>{{$u->status}}</td>
                                            <td>{{$u->login_number}}</td>
                                            <td>
                                                <form action="{{url('/login')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="username" value="{{$u->username}}">
                                                    <input type="hidden" name="password" value="{{$u->password}}">
                                                <input type="submit" class="fadeIn fourth" name="LoginAs" value="Login As">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">

    </div>
    </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->
    <!-- END PAGE CONTAINER-->
    </div>

    </div>
