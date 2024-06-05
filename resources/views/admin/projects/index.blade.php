@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="text-danger">Name Project</th>
                        <!-- <th scope="col" class="text-danger">Type ID</th> -->
                        <th scope="col" class="text-danger">Type</th>
                        <th scope="col" class="text-danger">GitHub Link</th>
                        <th scope="col" class="text-danger">Details</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <th scope="row" class="py-3 text-center">{{$project->name_project}}</th>
                        <!-- <td class="py-3 text-center">{{$project->type_id}}</td> -->
                        <td class="py-3 text-center">{{$project->type ? $project->type->name : ''}}</td> <!-- TERNARIO PERCHE' QUANDO E' NULL DA ERRORE -->
                        <td class="py-3 text-center">{{$project->url_github}}</td>
                        <td class="py-3 text-center">
                            <a href="{{route('admin.projects.show', $project)}}" class="text-decoration-none text-success fw-bold">Strip me</a>
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