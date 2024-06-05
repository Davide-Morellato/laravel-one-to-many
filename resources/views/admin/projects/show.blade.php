@extends('layouts.app')

@section('content')
<section class="py-5">
    <div class="container ">
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="p-2 text-primary">Name Project</th>
                        <th scope="col" class="p-2 text-primary">Type</th>
                        <th scope="col" class="p-2 text-primary">GitHub Link</th>
                        <th scope="col" class="p-2 text-primary">Description</th>
                        <th scope="col" class="p-2 text-primary">Edit</th>
                        <th scope="col" class="p-2 text-primary">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="p-3">{{$project->name_project}}</th>
                        <!-- <td class="p-3">{{optional($project->type)->name}}</td> --> <!-- MODO CONTRATTO -->
                        <td class="p-3">{{$project->type ? $project->type->name : '--'}}</td>
                        <td class="p-3">{{$project->url_github}}</td>
                        <td class="p-3">{!! $project->description !!}</td>
                        <td class="p-3">
                            <a href="{{route('admin.projects.edit', $project)}}" class="mt-4 btn btn-success text-light fw-bold px-3">Edit</a>
                        </td>
                        <td class="p-3">
                            <form action="{{route('admin.projects.destroy', $project)}}" method="POST" onsubmit="return deleteFunction()">
                                @csrf
                                @method('DELETE')

                                <button class="mt-4 btn btn-danger text-dark fw-bold">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center py-5">
            <a href="{{route('admin.projects.index', $project)}}" class="text-decoration-none text-danger fw-bold">Back to the Future</a>
        </div>
    </div>
</section>



<script>
    function deleteFunction() {

        const del = confirm("Sei sicuro?");

        if (!del) {
            return false;
        }
    }
</script>

@endsection