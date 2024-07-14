<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('home.homecss')
</head>

<body>
    <!-- header section start -->
    <div class="header_section">
        @include('home.header')
        <!-- banner section start -->
        @include('home.banner')
        <!-- banner section end -->
    </div>

    <div style="text-align: center; margin: auto"class="col-md-5">
        <div><img style="padding: 20px;" src="/postimage/{{ $post->image }}" class="services_img"></div>
        <h2>{{ $post->title }}</h2>
        <h4>{{ $post->description }}</h4>
        <p>Post by <b>{{ $post->name }}</b></p>

    </div>

    <!-- footer section start -->
    @include('home.footer')

</body>

</html>
