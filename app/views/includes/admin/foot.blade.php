    <script type="text/javascript" language="javascript" src="{{URL::asset('assets/assets/advanced-datatable/media/js/jquery.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.js')}}"></script>
    <script src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/assets/bootstrap-fileupload/bootstrap-fileupload.js')}}"></script>
    <script class="include" type="text/javascript" src="{{URL::asset('assets/js/jquery.dcjqaccordion.2.7.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.scrollTo.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/jquery.nicescroll.js')}}" type="text/javascript"></script>
    <script type="text/javascript" language="javascript" src="{{URL::asset('assets/assets/advanced-datatable/media/js/jquery.dataTables.js')}}"></script>
    <script src="{{URL::asset('assets/js/respond.min.js')}}" ></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.validate.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/ga.js')}}"></script>

  <!--common script for all pages-->
    <script src="{{URL::asset('assets/js/common-scripts.js')}}"></script>
    <script src="{{URL::asset('assets/js/form-validation-script.js')}}"></script>
     <script src="{{URL::asset('assets/js/clientarea.js')}}"></script>
    <!--script for this page only-->

      <script type="text/javascript" charset="utf-8">
          $(document).ready(function() {
              $('#example').dataTable( {
                  "aaSorting": [[ 4, "desc" ]]
              } );
          } );
      </script>