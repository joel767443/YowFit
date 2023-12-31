<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Yo Health</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('img/core-img/favicon.ico') }}">

    <!-- Core Stylesheet -->
    <link href="{{ asset('style.css') }}" rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

</head>

<body>
<!-- Preloader Start -->
<div id="preloader">
    <div class="load"></div>
</div>

<!-- ***** Header Area Start ***** -->
@include('site.partials.header')
<!-- ***** Header Area End ***** -->

<!-- ***** Wellcome Area Start ***** -->
@include('site.partials.welcomeArea')
<!-- ***** Wellcome Area End ***** -->

<!-- ***** Special Area Start ***** -->
@include('site.about')
<!-- ***** Special Area End ***** -->

<!-- ***** Awesome Features Start ***** -->
@include('site.skills')
<!-- ***** Awesome Features End ***** -->

<!-- ***** Video Area Start ***** -->
@include('site.partials.video-section')
<!-- ***** Video Area End ***** -->

<!-- ***** Cool Facts Area Start ***** -->
@include('site.partials.facts')
<!-- ***** Cool Facts Area End ***** -->

<!-- ***** App Screenshots Area Start ***** -->
{{--@include('site.screenshots')--}}
<!-- ***** App Screenshots Area End *****====== -->

<!-- ***** Pricing Plane Area Start *****==== -->
{{--@include('site.my-process')--}}
<!-- ***** Pricing Plane Area End ***** -->

<!-- ***** Client Feedback Area Start ***** -->
@include('site.testminials')
<!-- ***** Client Feedback Area End ***** -->

<!-- ***** CTA Area Start ***** -->
{{--@include('site.partials.membership')--}}
<!-- ***** CTA Area End ***** -->

<!-- ***** Our Team Area Start ***** -->
{{--@include('site.learn')--}}
<!-- ***** Our Team Area End ***** -->

<!-- ***** Contact Us Area Start ***** -->
@include('site.contact')
<!-- ***** Contact Us Area End ***** -->

<!-- ***** Footer Area Start ***** -->
@include('site.partials.footer')
<!-- ***** Footer Area Start ***** -->

<!-- Jquery-2.2.4 JS -->
<script src="{{ asset('js/jquery-2.2.4.min.js') }}"></script>
<!-- Popper js -->
<script src="{{ asset('js/popper.min.js') }}"></script>
<!-- Bootstrap-4 Beta JS -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- All Plugins JS -->
<script src="{{ asset('js/plugins.js') }}"></script>
<!-- Slick Slider Js-->
<script src="{{ asset('js/slick.min.js') }}"></script>
<!-- Footer Reveal JS -->
<script src="{{ asset('js/footer-reveal.min.js') }}"></script>
<!-- Active JS -->
<script src="{{ asset('js/active.js') }}"></script>
</body>

</html>
