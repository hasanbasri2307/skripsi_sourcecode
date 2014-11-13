$(document).ready(function(){
    $(".delete-file").click(function(){
        var data = confirm("Delete This File ?");

        if(data==true)
        {

            var id = $(this).attr('data-id');
            var url = $(this).attr('data-action');
            $.ajax({
                type:'GET',
                url:url,
                data:'id='+id,
                success:function(data) {


                    location.reload();
                }

             });
        }
    });

    $('#all').click(function() {
        var $this = $(this);

        // $this will contain a reference to the checkbox
        if ($this.is(':checked')) {
            $('#user_type').attr('disabled',true);
            $('#condition').attr('disabled',true);
        } else {
            $('#user_type').attr('disabled',false);
            $('#condition').attr('disabled',false);
        }
    });


});