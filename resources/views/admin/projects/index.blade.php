@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container p-2">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="p-2 text-danger">Name Project</th>
                        <th scope="col" class="p-2 text-danger">GitHub Link</th>
                        <th scope="col" class="text-danger">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row" class="py-5 text-center">{{$project->name_project}}</th>
                        <td class="py-5 text-center">{{$project->url_github}}</td>
                        <td>
                            <a href="{{route('admin.projects.show', $project)}}" class="text-decoration-none text-success fw-bold p-1" style="line-height: 100px;">Strip me</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="pt-4">
            <a href="{{route('admin.projects.create')}}" class="btn btn-light text-primary fw-bold ms-4">
                Add Project
            </a>
        </div>
    </div>
</section>
@endsection