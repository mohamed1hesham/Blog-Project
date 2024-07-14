<!DOCTYPE html>
<html>

<head>
    <base href="/public">
    @include('admin.css')
    <style>
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
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">X</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h1 class="post_title">Update Post</h1>


            <form action="{{ route('update_post', $post->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="div_center">
                    <div>
                        <label for="">Post Title</label>
                        <br>
                        <input type="text" name="title" value="{{ $post->title }}">
                    </div><br>
                    <div>
                        <label for="">Post Description</label>
                        <br>
                        <textArea name="description">{{ $post->description }}</textArea>
                    </div><br><br>
                    <div class="div_center"><label for="">Old Image</label>
                        <img style="margin: auto;" height="100px" width="150px" src="/postimage/{{ $post->image }}"
                            alt="">
                    </div>
                    <div>
                        <label for="">Update Old Image</label>
                        <input type="file" name="image">
                    </div><br>
                    <div>
                        <input type="submit" class="btn btn-primary ">
                    </div>

                </div>
            </form>

        </div>



        @include('admin.footer')
</body>

</html>
