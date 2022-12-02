<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Edit Post - Tutorial CRUD Laravel 8 @ qadrlabs.com</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- include summernote css -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">

                <!-- Notifikasi menggunakan flash session data -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('post.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="name">Name Project</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name', $post->name) }}" required>

                                <!-- error message -->
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="client">Client Name</label>
                                <input type="text" class="form-control @error('client') is-invalid @enderror"
                                    name="client" value="{{ old('client', $post->client) }}" required>

                                <!-- error message -->
                                @error('client')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="leader">Leader Name</label>
                                <input type="text" class="form-control @error('leader') is-invalid @enderror"
                                    name="leader" value="{{ old('leader', $post->leader) }}" required>

                                <!-- error message -->
                                @error('leader')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Client Name</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email', $post->email) }}" required>

                                <!-- error message -->
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start">Start Date</label>
                                <input type="date" class="form-control @error('start') is-invalid @enderror"
                                    name="start" value="{{ old('start', $post->start) }}" required>

                                <!-- error message -->
                                @error('start')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end">Start Date</label>
                                <input type="date" class="form-control @error('end') is-invalid @enderror"
                                    name="end" value="{{ old('end', $post->end) }}" required>

                                <!-- error message -->
                                @error('end')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="status">Publish Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="100" {{ $post->status == 100 ? 'selected' : '' }}>100%</option>
                                    <option value="90" {{ $post->status == 90 ? 'selected' : '' }}>90%</option>
                                    <option value="80" {{ $post->status == 80 ? 'selected' : '' }}>80%</option>
                                    <option value="70" {{ $post->status == 70 ? 'selected' : '' }}>70%</option>
                                    <option value="60" {{ $post->status == 60 ? 'selected' : '' }}>60%</option>
                                    <option value="50" {{ $post->status == 50 ? 'selected' : '' }}>50%</option>
                                    <option value="40" {{ $post->status == 40 ? 'selected' : '' }}>40%</option>
                                    <option value="30" {{ $post->status == 30 ? 'selected' : '' }}>30%</option>
                                    <option value="20" {{ $post->status == 20 ? 'selected' : '' }}>20%</option>
                                    <option value="10" {{ $post->status == 10 ? 'selected' : '' }}>10%</option>
                                    <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>0%</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-md btn-primary">Update</button>
                            <a href="{{ route('post.index') }}" class="btn btn-md btn-secondary">back</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- include summernote js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                height: 250, //set editable area's height
            });
        })
    </script>
</body>

</html>
