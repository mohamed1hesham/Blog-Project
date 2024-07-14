<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style type="text/css">
        .post_title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 30px;
            color: white;
        }

        .div_center {
            text-align: center;
            padding: 30px;
        }

        label {
            display: inline-block;
            width: 200px;
            font-weight: bold;
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
                <div class="alert alert-success ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title">Add Post</h1>
            @if ($errors->any())
                <br><br>
                <div style="margin: 20px" class="alert alert-danger">

                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>

                </div>
            @endif
            <div>
                <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_center">
                        <div>
                            <label for="">Post Title</label>
                            <br>
                            <input type="text" name="title">
                        </div><br>
                        <div>
                            <label for="">Post Description</label>
                            <br>
                            <textArea name="description"></textArea>
                        </div><br><br>
                        <div>
                            <label for="">Add Image</label>

                            <input type="file" name="image">
                        </div><br>
                        <div>
                            <input type="submit" class="btn btn-primary ">
                        </div>

                    </div>

                </form>
            </div>
        </div>


        @include('admin.footer')
</body>

</html>
