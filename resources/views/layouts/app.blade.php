<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href='https://fonts.googleapis.com/css?family=Basic' rel='stylesheet'>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
    <script src="{{asset('js/votes.js')}}" defer></script>
    <script src="{{asset('js/question_reports.js')}}" defer></script>
    <script src="{{asset('js/add_answer.js')}}" defer></script>
    <script src="{{asset('js/answer_card.js')}}" defer></script>
    <script src="{{asset('js/read_more_questions.js')}}" defer></script>
      <script src="{{asset('js/search_script.js')}}" defer></script>
  </head>
  <body style="font-family: 'Basic';">
    <main>
      @include('partials.common.navbar')
      <section id="content">
        {{-- @include('partials.cards.flash_message') --}}
        @yield('content')
      </section>
      @include('partials.common.footer')
    </main>
  </body>
</html>
