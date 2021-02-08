<div class="row">
    <div class="col-md-12">
        <div class="copyright">
            <p>&copy; Ashabul Kahfi 2020</p>

        </div>
    </div>
</div>
</div>
</div>
</div>
<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>

</div>


<!-- Jquery JS-->
<script src="{{asset('admins/vendor/jquery-3.2.1.min.js')}}"></script>
<!-- Bootstrap JS-->

<!-- Vendor JS       -->
<script src="{{asset('admins/vendor/slick/slick.min.js')}}">
</script>
<script src="{{asset('admins/vendor/wow/wow.min.js')}}"></script>
<script src="{{asset('admins/vendor/animsition/animsition.min.js')}}"></script>
<script src="{{asset('admins/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
</script>
<script src="{{asset('admins/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('admins/vendor/counter-up/jquery.counterup.min.js')}}">
</script>
<script src="{{asset('admins/vendor/circle-progress/circle-progress.min.js')}}"></script>
<script src="{{asset('admins/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
<script src="{{asset('admins/vendor/chartjs/Chart.bundle.min.js')}}"></script>
<script src="{{asset('admins/vendor/select2/select2.min.js')}}">
</script>
<script src="{{asset('admins/vendor/bootstrap-4.1/popper.min.js')}}"></script>
<script src="{{asset('admins/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
<script src="{{asset('admins/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('js/popper.js')}}"></script>--}}
{{--<script src="{{asset('admins/js/jquery.js')}}"></script>--}}

<script src="{{asset('admins/js/main.js')}}"></script>
<script src="{{asset('admins/js/summernote.js')}}"></script>
<script src="{{asset('admins/js/jquery-datatable.js')}}"></script>
<script src="{{asset('admins/js/datatable-boostrap.js')}}"></script>
<script src="{{asset('admins/js/main.js')}}"></script>
<script src="{{asset('js/diagram.js')}}"></script>

<!-- Main JS-->
<script>
    $(document).ready(function() {
        $('#table').DataTable({
            "lengthMenu"  : [ 9, 18, 27, 36, 45 ]
        });
    } );
</script>

</body>
@yield('script')

</html>
<!-- end document-->
