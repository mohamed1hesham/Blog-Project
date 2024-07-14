<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.homecss')
    <style type="text/css">
        .div_design {
            text-align: center;
        }

        .title_design {
            font-size: 30px;
            font-weight: bold;
            color: white;
            margin: 50px
        }

        label {
            display: inline-block;
            width: 200px;
            color: white;
            font-size: 18px;
            font-weight: bold;
        }

        .field_design {
            padding: 30px;
        }
    </style>
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')


        <div class="div_design">
            @if (session()->has('message'))
                <div class="alert alert-success ">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        X
                    </button>
                    {{ session()->get('message') }}
                </div>
            @endif
            <h3 class="title_design">Add Post</h3>
            <form action="{{ route('user_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <div class="field_design">
                        <label for="">Title</label>
                        <input type="text" name="title">
                    </div>

                    <div class="field_design">
                        <label for="">Description</label>
                        <input type="text" name="description">
                    </div>

                    <div class="field_design">
                        <label for="">Add Image</label>
                        <input type="file" name="image">
                    </div>


                    <div class="field_design">
                        <input type="submit" name="" value="Add Post" class="btn btn-outline-secondary ">
                    </div>
                </div>
            </form>
        </div>
        @include('home.footer')
    </div>
    <!-- footer section start -->


</body>

</html>
