@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container w-50 m-auto">
        <form action="{{route('admin.projects.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name_project" class="form-label fw-bold">Name Project</label>
                <input type="text" name="name_project" class="form-control" id="name_project" placeholder="Insert the name project" value="{{old('name_project')}}">
            </div>
            <div class="mb-3">
                <label for="url_github" class="form-label fw-bold">Link Git</label>
                <input type="text" name="url_github" class="form-control" id="url_github" placeholder="Insert the url git" value="{{old('url_github')}}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea type="text" name="description" class="form-control" id="description" placeholder="Describe your project" rows="8" value="{{old('description')}}">
            </textarea>
            </div>
            <div class="d-flex justify-content-evenly pt-3">
                <button type="submit" class="btn btn-primary fw-bold">Create</button>
                <a href="{{route('admin.projects.index')}}" class="btn btn-warning text-primary fw-bold">Back to the Future</a>
            </div>

        </form>


        <div class="my-4 centered w-25">
            @if ( $errors->any() )
            <div class="alert alert-danger op-90">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
</section>

@endsection