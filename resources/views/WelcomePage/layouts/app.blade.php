<!DOCTYPE html>
<html lang="en">
  <head>
    @include('WelcomePage.layouts.headcontent')
  </head>

  <body>

    @include('WelcomePage.layouts.fixedNavBar')

    @section('body')
      @show

    @include('WelcomePage.layouts.footer')

    @include('WelcomePage.layouts.indexPageScript')

  </body>
</html>
