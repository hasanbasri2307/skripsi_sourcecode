<!DOCTYPE html>
<html lang="en">
 @include('includes.admin.head')

  <body>

  <section id="container" >
      <!--header start-->
      @include('includes.admin.nav_header')
      <!--header end-->
      <!--sidebar start-->
      @include('includes.admin.sidebar')
      <!--sidebar end-->
      <!--main content start-->
      <section id="main-content">
          @yield('content')
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          @include('includes.admin.footer')
      </footer>
      <!--footer end-->
  </section>

    @include('includes.admin.foot')

  </body>
</html>
