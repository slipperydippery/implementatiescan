<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Implementatiescan | {{ $title }}</title>
    <meta name="author" content="Maarten de Jager">
    <meta name="description" content="ImplementatieScan">
    <meta name="keywords" content="ImplementatieScan">
    <meta name="csrf-token" value="{{ csrf_token() }}">
    <link href="{{ URL::asset('/css/app.css') }}" rel="stylesheet">
    <link rel="shortcut icon" href="{{{ asset('img/favicon.png') }}}">
    
    {{-- This is the token Laravel requires for non-GET requests --}}
    <meta name="token" id="token" value="{{ csrf_token() }}">


    <script src="{{ URL::asset('js/modernizr.js') }}"></script>

  </head>
  
  <body>
