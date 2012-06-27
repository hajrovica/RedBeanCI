<style type="text/css">
    table{
        border:1px solid #535353;
        padding: 1px;
    }
    td{background-color: #E8E8E8;}
    th{background-color: #A0A0A0;}

</style>
<?php echo $jscript_include; ?>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        // Stuff to do as soon as the DOM is ready. Use $() w/o colliding with other libs;

        $.post("<?php echo base_url(); ?>things/ajax_get_table",{ }, function(data){
        $('div#tbl_div').html(data);
            });



        $('p.pag a').live('click', function(){
            var this_url = $(this).attr('href');
            $.post(this_url,{ }, function(data){
                $('div#tbl_div').html(data);
            });


            //alert(this_url);
            return false;


        });

    });


</script>

    <div id="tbl_div">


    </div>

<?php


// echo "<pre>";
// print_r($student); ?>