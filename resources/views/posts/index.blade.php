<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Post List - Tutorial CRUD Laravel 8 @ qadrlabs.com</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body style="background-color: #DBEAFE">

    <div class="container-fluid mt-5">
        <div class="row">
            <div class="col-md-12">

                <div class="text-center">
                    <h5 class="font-weight-bold">
                        Project Monitoring
                    </h5>
                </div>

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

                <div class="card border-0 shadow rounded mt-4">
                    <div class="card-body">

                        <table class="table mt-1 table-borderless">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col" style="width:  14%">Name</th>
                                    <th scope="col" style="width:  14%">Client</th>
                                    <th scope="col" style="width:  22%">Leader</th>
                                    <th scope="col" style="width:  10%">Start Date</th>
                                    <th scope="col" style="width:  10%">End Date</th>
                                    <th scope="col" style="width:  20%">Progress</th>
                                    <th scope="col" style="width:  10%">Action</th>
                                </tr>
                            </thead>
                            <tbody style="color: #899bbd">
                                @forelse ($posts as $post)
                                    <tr style="padding-top: 5rem">
                                        <td>{{ $post->name }}</td>
                                        <td>{{ $post->client }}</td>
                                        <td>
                                            <div>
                                                <img src="{{ asset('storage/post-images/' . $post->image) }}"
                                                    class="rounded-circle float-left" alt="{{ $post->image }}"
                                                    width="50rem" height="50rem" style="margin-right: 1rem">
                                            </div>
                                            <div class="font-weight-bold text-dark">{{ $post->leader }}</div>
                                            <div>{{ $post->email }}</div>
                                        </td>
                                        <td>{{ date('d M Y', strtotime($post->start)) }}</td>
                                        <td>{{ date('d M Y', strtotime($post->end)) }}</td>



                                        <td class="row">
                                            <div class="col-8" style="padding-top: 0.4rem">
                                                <div class="progress">

                                                    @if ($post->status == 100)
                                                        <div class="progress-bar bg-success" role="progressbar"
                                                            style="width: {{ $post->status }}%" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @else
                                                        <div class="progress-bar bg-primary" role="progressbar"
                                                            style="width: {{ $post->status }}%" aria-valuenow="0"
                                                            aria-valuemin="0" aria-valuemax="100"></div>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="col-4 font-weight-bold text-dark" style="padding: 0%">
                                                {{ $post->status }}%
                                            </div>

                                        </td>
                                        <td class="justifi-content-center">
                                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                action="{{ route('post.destroy', $post->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="material-icons">&#xe872;</i></button>
                                                <a href="{{ route('post.edit', $post->id) }}"
                                                    class="btn btn-sm btn-success"><i
                                                        class="material-icons">&#xE254;</i></a>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td class="text-center text-mute" colspan="4">Data post tidak tersedia</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <a href="{{ route('post.create') }}" class="btn btn-md btn-primary mb-2 mt-2 float-right">New
                    Post</a>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>
