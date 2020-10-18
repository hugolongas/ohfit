<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta name="_token" content="{{ csrf_token() }}">
  @yield('meta')
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link rel="stylesheet" href="/css/main.min.css">
  @yield('css')
  <title>@yield('title')</title>
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="20">
  <main id="main" class="warpper">
    @include('partials.navbar')
    @if(Request::is('/'))
    @include('partials.dotsMenu')
    @endif
    <div id="content" class="@yield('bodyClass')">
      @yield('content')
    </div>
    @include('partials.footer')
    @include('partials.modal')
  </main>
</body>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
<script src="/js/contact.js"></script>
<script src="/js/trainingForms.js"></script>
<script src="/js/main.js"></script>
@stack('scripts')
@yield('js')

</html>