@extends('admin.layout')

@section('title')

    Awaiting approval

@endsection

@section('content')
    @auth('admin')
        <div class="container">
            <div class="row">
                <div class="col col-9">
                    @if($awaitingApproval->count() == 0)
                        <h2>There are no jokes awaiting approval</h2>
                    @endif
                    @foreach($awaitingApproval as $waiting)
                        <form class="approval-form" method="post" action="{{route('admin.edit')}}">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="approval">Awaiting Approval</label>
                                <textarea class="form-control" name="body" id="approval"
                                          rows="8">{{$waiting->body}}</textarea>
                            </div>
                            <input type="hidden" name="id" value="{{$waiting->id}}">

                            <button type="submit" class="btn btn-warning">Edit</button>
                            <a href="/admin/delete/{{$waiting->id}}">
                        </form>
                        <a href="{{route('admin.approve',$waiting->id)}}">
                            <button class="btn btn-success">Approve</button>
                        </a>
                        <a href="{{route('admin.delete',$waiting->id)}}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <hr>
                    @endforeach
                    {{$awaitingApproval->links('vendor/pagination/bootstrap-4')}}
                </div>

            </div>
        </div>

    @endauth

@endsection