<!doctype html>
<html {!! get_language_attributes() !!}>
  @include('partials.head')
  <body @php body_class() @endphp>

    @include('partials.mobile-menu')

    @php do_action('get_header') @endphp
    @include('partials.header')
    
      @if (!(is_single() || is_page('news')))
        @include('partials.hero')
      @endif
    
      @yield('content')
        
    @php do_action('get_footer') @endphp
    @include('partials.footer')
    @php wp_footer() @endphp
  </body>
</html>
