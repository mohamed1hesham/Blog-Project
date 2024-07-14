<!DOCTYPE html>
<html>

<head>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
        integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @include('admin.css')
    <style type="text/css">
        .title_design {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .table_design {
            border: 1px solid white;
            text-align: center;
            width: 92%;
            margin-left: 70px;


        }

        .th_design {
            background-color: salmon;
            color: white;
        }

        .img_design {
            height: 100px;
            width: 100px;
            padding: 10px;
            display: inline;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->
        <div class="page-content">
            @if (session()->has('message'))
                <div class="alert alert-danger">

                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>

                    {{ session()->get('message') }}
                </div>
            @endif

            <h1 class="title_design">All Posts</h1>

            <table class="table_design">
                <tr class="th_design">
                    <th>Post title</th>
                    <th>Description</th>
                    <th>Post By</th>
                    <th>Post Status</th>
                    <th>User Type</th>
                    <th>Image</th>
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
                @foreach ($data as $data)
                    <tr class="td_design">
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->description }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->post_status }}</td>
                        <td>{{ $data->user_type }}</td>
                        <td>
                            <img class="img_design" src="postimage/{{ $data->image }}" alt="">
                        </td>
                        <td>
                            <a href="{{ route('delete_post', $data->id) }}" class="btn btn-danger"
                                onclick="confirmation(event)">Delete</a>
                        </td>
                        <td>
                            <a href="{{ route('edit_post', $data->id) }}" class="btn btn-success">
                                Edit
                            </a>
                        </td>
                    </tr>
                @endforeach



            </table>

        </div>


        @include('admin.footer')

        <script type="text/javascript">
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href')

                console.log(urlToRedirect);
                swal({
                        title: "Are you sure to delete this",
                        text: "You won't be able to revert this delete",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script>
</body>

</html>
