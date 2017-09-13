@extends('admin.layout')

@section('title')

    Admin Dashboard

@endsection

@section('content')
    @auth('admin')

        <div class="container">
            <div class="row">
                <div class="col col-md-9 col-sm-pull-3 ">
                    <h1>PokeaJoke Admin</h1>
                    <p class="lead">Lets face it Paul no one else is going to come to this part of the site so I am not presumptuous in calling you Paul.</p>
                    <p class="lead">I'm going to take the piss now I guess this is early days on this site as I had hardly anything to process!!</p>
                    <p class="lead">Usually  you have me dipping in and out of databases and checking this and that I'm usually worn out. This site.. Nothing!!</p>
                </div>

                <div class="col col-md-3 col-sm-push-3">
                    <ul class="list-group">
                        <li class="list-group-item justify-content-between">
                            <a href="{{route('admin.awaiting.approval')}}">Awaiting approval</a>
                            <span class="badge badge-pill badge-dark" style="float: right">{{$count}}</span>
                        </li>

                        <li class="list-group-item justify-content-between">
                            <a href="#">Jokes</a>
                            <span class="badge badge-pill badge-dark" style="float: right">{{$countJokes}}</span>
                        </li>

                        <li class="list-group-item justify-content-between">
                            <a href="#">Link</a>
                            <span class="badge badge-pill badge-dark" style="float: right">0</span>
                        </li>

                        <li class="list-group-item justify-content-between">
                            <a href="#">Tasks</a>
                            <span class="badge badge-pill badge-dark" style="float: right">0</span>
                        </li>

                        <li class="list-group-item justify-content-between">
                            <a href="#">Tags</a>
                            <span class="badge badge-pill badge-dark" style="float: right">0</span>
                        </li>

                        <li class="list-group-item justify-content-between">
                            <a href="#">Users</a>
                            <span class="badge badge-pill badge-dark" style="float: right">{{$countUsers}}</span>
                        </li>

                    </ul>

                </div>


            </div>

        </div><!-- /.container -->

    @endauth

@endsection
