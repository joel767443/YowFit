<section class="wellcome_area clearfix" id="home">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md">
                <div class="wellcome-heading">
                    <p>A self driven, self starter and passionate Developer.
                        <br />I love coding and have been developing systems for over 10 years.</p>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif
                <div class="get-start-area">
                    <!-- Form Start -->
                    <form action="/" method="post" class="form-inline">
                        {{ @csrf_field() }}
                        <input type="email" name="email" class="form-control email" placeholder="email address">
                        <input type="submit" class="submit" value="Get Freebies">
                    </form>
                    <!-- Form End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Welcome thumb -->
    <div class="welcome-thumb wow fadeInDown" data-wow-delay="0.5s">
        <img id="rcorners2" src="img/me.jpeg" alt="">
    </div>
</section>
