var form;                   // jQuery object of the form used to add/update
var tbody;                  // jQuery object of our table's tbody element
var count_span;             // jQuery object of the span inside the table footer, which contans the no. of records

jQuery(document).ready(function() {

    form        = $('#user_form');
    tbody       = $('#ajax_table tbody');
    count_span  = $('#ajax_table tfoot tr td span');

    button_bind();
    $('input.date').datepicker({

        dateFormat: 'yy-mm-dd',
        changeMonth: true,
        changeYear: true,
        yearRange: '1910:2012'

});

    // Stuff to do as soon as the DOM is ready. Use $() w/o colliding with other libs;
});


function button_bind()
{
    // Set the buttons icons and click functions

    // Give all .add buttons a nice UI icon and trigger initAdd() on click
    $('button.add').button(
    {
        icons:
        {
            primary: 'ui-icon-plusthick'
        }
    }).
    click(initAdd);

    $('.edit').button(
    {
        icons:
        {
            primary: 'ui-icon-pencil'
        },
        text: false
    }).click(initUpdate);
    // Give all .edit buttons a nice UI icon and trigger initUpdate() on click

    $('.remove').button(
    {
        icons:
        {
            primary: 'ui-icon-closethick'
        },
        text: false
    }).click(initRemove);
    // Give all .remove buttons a nice UI icon and trigger initRemove() on click
}



function showMessage(message, p_class){

    if (!$('p#notification').length)
        {
            $('body').prepend('<p id="notification"> </p>');
        };

        var paragraph = $('p#notification');
        paragraph.hide();
        paragraph.removeClass();

        //add cupplied class
        paragraph.addClass(p_class);

        //change the text inside
        paragraph.html(message);

        //fade in paragraph
        paragraph.fadeIn(fast, function(){
            //fade out again after 3 seconds
            paragraph.delay(3000).fadeOut();
        });

}

function initAdd()
{
    form.dialog('option', 'title', 'Add User');
    // Set the title of the dialog to 'Add User'

    // Now set the buttons and their functions for the dialog
    form.dialog({
    buttons:
    {
        'Cancel': function()        // create a 'Cancel' button to close the dialog
        {
            form.dialog('close');
        },

        'Add User': function()      // create the 'Add User' submit button
        {
            $('p.feedback', form).removeClass('success, error').addClass('notify').
            html('Sending details to server...').show();
            // notify the user the details are being sent to the server

            var data = {};
            var inputs = $('input[type="text"], input[type="hidden"], select', form);

            inputs.each(function(){
                var el = $(this);
                data[el.attr('name')] = el.val();
            });
            // collect the form data form inputs and select, store in an object 'data'

            $.ajax({
            type:       'POST',
            url:        'ajax/add',
            data:       data,
            dataType:   'json',
            success:    function(json)
            {
                if (json.status == "success")   // the user was added to the database
                {
                    $('tr', tbody).toggleClass('alternate');
                    // Toggle the existing rows of the table's alternate class

                    tbody.prepend(json.html);
                    // add the new row to the tbody (at the top)

                    button_bind();
                    // bind the new buttons of the user just added

                    count_span.html(parseInt(count_span.html())+1);
                    // update the user count in the footer

                    form.dialog('close');
                    // close the dialog

                    showMessage(json.message, 'success');
                    // show the success message
                }
                else                            // the user was not added
                {
                    $('p.feedback', form).removeClass('success, notify').addClass('error').html(json.message).show();
                }
            }
            });
            // send the data via AJAX to our controller
        }
    }
    });

    form.dialog('open');
    // Open the dialog
}




    form.dialog({
        width:400,          // set the width of the dialog to 400px
        autoOpen:false,     // don't want it to open automatically
        resizable:true,    // set it to not resizable
        modal:true,         // use a modal overlay background

        close: function()   // onClose
            {
                $('p.feedback', form).html('').hide();
                // clear & hide the feedback msg inside the form
                $('input[type="text"], input[type="hidden"]', form).val('');
                // clear the input values on form
            }


    });