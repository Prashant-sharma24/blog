@extends('layouts.navbar')

@section('content')
    <div class="container " style="margin-top: 150px; ">
        {{-- <h2>Success!</h2>
        <p>Your information has been uploaded successfully. Click the button below to view your data:</p> --}}
        {{-- <a href="{{ $url }}" class="btn btn-primary">View Data</a> --}}
<!-- user/view.blade.php -->
@if (isset($url))
    <p>View your blog post <a href="{{ $url }}" target="_blank">here</a></p>
@endif

    </div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Sign Up Form by Colorlib</title>

        <!-- Font Icon -->
        <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

        <!-- Main css -->
        <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">

    </head>

    <body>

        <div class="main">

            <!-- Sign up form -->
            <section class="signup">
                <div class="container containercreate">
                    <div class="signup-content">
                        <div class="signup-form">
                            <h2 class="form-title">Enter the Details</h2>
                            <form action="{{ route('user.update', ['identifier' => $blogPost->unique_identifier]) }}" method="post"  enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group">

                                    <label for="title"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                    <input type="text" name="title" value="{{ old('title') }}" id="title"
                                        placeholder="Title Here" required />
                                </div>
                                <div class="form-group">
                                    <label for="description"><i class="zmdi zmdi-email"></i></label>
                                    <input name="description" value="{{ old('description') }}" id="description"
                                        placeholder="description" required />
                                </div>

                                <div class="form-group">
                                    <label for="image"><i class="zmdi zmdi-lock"></i></label>
                                    <input type="file" name="image" id="image" placeholder="image" accept="image/*" onchange="displayImage()"  required />
                                </div>
                                <div class="form-group">
                                    <label for="url"><i class="zmdi zmdi-lock-outline"></i></label>
                                    <input type="text" name="url" value="{{ old('url') }}" id="url"
                                        placeholder="enter your url" required/>
                                </div>
                                {{-- <div class="form-group">
                                <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div> --}}
                                {{-- <div class=" form-button"> --}}
                                <input type="submit" class="form-submit" value="Update" />
                                {{-- </div> --}}
                            </form>
                        </div>
                        <div class="signup-image">
                            <figure>
                                    <img id="uploadedImage" src="#" alt="Uploaded Image"  style="border-radius: 20px;" /></figure>
                            {{-- <a href="#" class="signup-image-link">I am already member</a> --}}
                        </div>
                    </div>
                </div>
            </section>

        </div>
     <!-- JS -->
     @section('scripts')
<script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ url('assets/js/main.js') }}"></script>
<script>
    // Add this code inside the <head> section
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    $(document).ready(function() {
        $('#submitForm').submit(function(e) {
            e.preventDefault();

            var formData = new FormData(this);

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request header
                },
                success: function(response) {
                    // Log the response for debugging
                    console.log(response);

                    // Redirect to the success URL received in the response
                    window.location.href = response.url;
                },
                error: function(xhr, status, error) {
                    // Log the error for debugging
                    console.error(error);
                }
            });
        });
    });
</script>
<script>
    function displayImage() {
        var input = document.getElementById("image");
        var image = document.getElementById("uploadedImage");

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                image.src = e.target.result;
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>



        <!-- JS -->

        <script src="{{ url('vendor/jquery/jquery.min.js') }}"></script>
        {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

        <script src="{{ url('assets/js/main.js') }}"></script>
    </body><!-- This templates was made by Colorlib (https://colorlib.com) -->

    </html>
@endsection
