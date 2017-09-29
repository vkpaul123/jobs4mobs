<!-- jQuery 3 -->
<script src="{{asset('assets/userPage/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('assets/userPage/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{asset('assets/userPage/plugins/iCheck/icheck.min.js')}}"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-yellow',
      radioClass: 'iradio_square-yellow',
      increaseArea: '20%' // optional
    });
  });
</script>