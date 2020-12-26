<?php ?>
@if(session()->has('user'))
    <li class="nav-item">
        <a class="nav-link" href="{{ url('/logout') }}">Logout</a>
    </li>
    <h1>Hello <?= session('user')->username ?> user !</h1>
@endif

