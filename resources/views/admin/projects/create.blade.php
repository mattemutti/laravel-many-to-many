@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row py-2">
            <h1>CREATE PROJECT</h1>
        </div>
        @include('partials.validation-errors')

        <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title"
                    aria-describedby="titleHelper" placeholder="project" value="{{ old('title') }}" />
                <small id="titleHelper" class="form-text text-muted">Type a title for this project</small>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="cover_image" class="form-label">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" aria-describedby="cover_imageeHelper" placeholder="project"
                    value="{{ old('cover_image') }}" />
                <small id="cover_imageHelper" class="form-text text-muted">Type a image for this project</small>
                @error('cover_image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="type_id" class="form-label">Type</label>
                <select class="form-select form-select-lg" name="type_id" id="type_id">
                    <option selected disabled>Select a type</option>
                    @foreach ($types as $type)
                        <option value="{{ $type->id }}" {{ $type->id == old('type_id') ? 'selected' : '' }}>
                            {{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="create_data" class="form-label">Date</label>
                <input type="text" class="form-control @error('create_data') is-invalid @enderror" name="create_data"
                    id="create_data" aria-describedby="create_dataHelper" placeholder="project date"
                    value="{{ old('create_date') }}" />
                <small id="create_dataHelper" class="form-text text-muted">Type a date for this project</small>
                @error('create_data')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="repo" class="form-label">Repo</label>
                <input type="text" class="form-control @error('repo') is-invalid @enderror" name="repo" id="repo"
                    aria-describedby="repoHelper" placeholder="project date" value="{{ old('repo') }}" />
                <small id="repoHelper" class="form-text text-muted">Type link the repo for this project</small>
                @error('repo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="code" class="form-label">Code</label>
                <input type="text" class="form-control" name="code" id="code" aria-describedby="codeHelper"
                    placeholder="project date" @error('code') is-invalid @enderror value="{{ old('code') }}" />
                <small id="codeHelper" class="form-text text-muted">Type link the code for this project</small>
                @error('code')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="form-label">Video</label>
                <input type="text" class="form-control @error('video') is-invalid @enderror" name="video"
                    id="video" aria-describedby="videoHelper" placeholder="project date" value="{{ old('video') }}" />
                <small id="videoHelper" class="form-text text-muted">Type link the video for this project</small>
                @error('video')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="video" class="form-label">Description</label>
                <div class="form-floating">
                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                        placeholder="Leave a comment here"style="height: 100px">{{ old('description') }}</textarea>
                    <label for="floatingTextarea">
                        @error('description')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </label>

                </div>
            </div>

            <button type="submit" class="btn btn-secondary">Create</button>


        </form>
    </div>
@endsection
