<?php $get_template = basename(get_page_template()); ?>
    @if(($get_template == 'template-travel.blade.php') || ($get_template == 'template-thank-you.blade.php'))
      @include('partials.header-travel')
    @else
        @include('partials.header')
    @endif

    <main id="main" class="main">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif

  @include('partials.footer')