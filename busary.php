<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="jquery-2.0.3.min.js" type="text/javascript" charset="utf-8"></script>
</head>
<body>
	<div id="content"></div>
    <hr>
    <div id="contact"></div>

    <script>
        $(document).ready(function(){
            
            $.post('functions/work.php', 'action=busaries', function(ret) {
                console.log(ret);
                $.each(ret, function(index, val) {                    
                    console.log(val);
                    $('#content').append('<p><a id="iInfo" data-id="'+val.id+'">'+val.company+'</a> | '+val.field+'</p>')
                });

            },'json');

            $(document).on('click','#iInfo',function(){
                $('.contact').remove();
                var iid = $(this).attr('data-id');
                $.post('functions/work.php', 'action=busary&id='+iid, function(ret) {
                    console.log(ret);
                    //$('#contact').append('<p class="contact">'+ret+'</p>')
                    $.each(ret, function(index, val) {                        
                        console.log(val);
                        $('#contact').append('<p class="contact">'+val.start+'</p><p>'+val.closing+'</p><p>'+val.reference+'</p><p>'+val.cnumber+'</p><p>'+val.cemail+'</p>')
                    });

                },'json');
            });

            
        });
    </script>
</body>
</html>