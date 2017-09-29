<!DOCTYPE html>
<html lang="en">
  <head>
    @include('WelcomePageEmployer.layouts.headcontent')
  </head>

  <body>

    @include('WelcomePageEmployer.layouts.fixedNavBar')

    @section('body')
      @show

    @include('WelcomePageEmployer.layouts.footer')

    @include('WelcomePageEmployer.layouts.indexPageScript')

  </body>
</html>
