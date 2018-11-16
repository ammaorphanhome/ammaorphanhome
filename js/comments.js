$(document).ready(function(){
    // When user clicks on submit comment to add comment under post
    $(document).on('click', '#submit_comment', function(e) {
        e.preventDefault();
        var comment_text = $('#comment_text').val();
        var name = $('#name').val();
        var email = $('#email').val();

        var url = $('#comment_form').attr('action');

        $('form[id^="comment_reply_form_"]').css('display','none');
        // Stop executing if not value is entered

        if(!validInputs(name, email, comment_text, '#error_comment')){
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: {
                comment_text: comment_text,
                name: name,
                email: email,
                comment_posted: 1
            },
            success: function(data){
                var response = JSON.parse(data);
                if (data === "error") {
                    alert('There was an error adding comment. Please try again');
                } else {
                    $('#comments-wrapper').prepend(response.comment)
                    $('#comments_count').text(response.comments_count);
                    $('#comment_text').val('');
                    $('#name').val('');
                    $('#email').val('');
                }
            }
        });
    });
    
    // When user clicks on submit comment to add comment under post
    $(document).on('click', '#submit_comment_index', function(e) {
        e.preventDefault();
        var comment_text = $('#comment_text').val();
        var name = $('#name').val();
        var email = $('#email').val();

        var url = $('#comment_form').attr('action');

        if(!validInputs(name, email, comment_text, '#error_comment')){
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: {
                comment_text: comment_text,
                name: name,
                email: email,
                submit_comment_index: 1
            },
            success: function(data){
                var response = JSON.parse(data);
                if (data === "error") {
                    alert('There was an error adding comment. Please try again');
                } else {
                	if(response.comments_count >= 2){
                		$('#comments-wrapper').children().last().remove();
                		$('#comments-wrapper').prepend(response.comment)
                	} else {
                		$('#comments-wrapper').prepend(response.comment)
                	}
                    $('#comments_count').text(response.comments_count);
                    $('#comment_text').val('');
                    $('#name').val('');
                    $('#email').val('');
                }
            }
        });
    });
});

function validInputs(name, email, comment_text, id){

    if (comment_text === "" || email === "" || name === "" ){
        if (comment_text === "" && email === "" && name === "" ){
            $(id).text("Please enter Full Name, Email and Comment fields!");
            $(id).show();
            return false;
        } else  if (comment_text === "" && email === "") {
            $(id).text("Please enter Email and Comment fields!");
            $(id).show();
            return false;
        } else if (name === "" && email === "") {
            $(id).text("Please enter Full Name and Email fields!");
            $(id).show();
            return false;
        } else if (name === "" && comment_text === "") {
            $(id).text("Please enter Full Name and Comment fields!");
            $(id).show();
            return false;
        } else if (name === "") {
            $(id).text("Please enter Full Name");
            $(id).show();
            return false;
        } else if (email === "") {
            $(id).text("Please enter an Email");
            $(id).show();
            return false;
        } else if (comment_text === "") {
            $(id).text("Please enter Comment field!");
            $(id).show();
            return false;
        } else {
            $(id).text("Invalid Inputs to Comment");
            $(id).show();
            return false;
        }
    }  else if (!validEmail(email)) {
        $(id).text("Please enter a valid Email");
        $(id).show();
        return false;
    } else{
        $(id).text("");
        $(id).hide();
        return true;
    }
}


function validEmail(email) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)){
        return (true)
    }
    return (false);
}

// When user clicks on submit reply to add reply under comment
$(document).on('click', '.reply-btn', function(e){
    e.preventDefault();

    // Get the comment id from the reply button's data-id attribute
    var comment_id = $(this).data('id');
    $('#error_comment').text("");
    $('#error_comment').hide();

    // Hide all the reply div's
    var replyFormId = 'comment_reply_form_' + comment_id;
    $('form[id^="comment_reply_form_"]').not('form[id=' + replyFormId + ']') .css('display','none');

    var comment_reply_form_to_show_hide = $(this).parent().parent().siblings('form#comment_reply_form_' + comment_id);
    comment_reply_form_to_show_hide.toggle(500);
    var replies_div =  $('.replies_wrapper_' + comment_id);

    $('#' + comment_id).on('click', function(e) {
        e.preventDefault();

        // submit more than once return false
        var reply_textarea = $(this).siblings('textarea'); // reply textarea element
        var reply_name = $(this).siblings('input')[0]; // reply name element
        var reply_email = $(this).siblings('input')[1]; // reply email element

        var name = $(this).siblings('input')[0].value;
        var email = $(this).siblings('input')[1].value;
        var reply_text = $(this).siblings('textarea').val();
        var url = $(this).parent().parent().parent().attr('action');

        // Stop executing if not value is entered
        $('#error_comment').text("");
        $('#error_comment').hide();

        if(!validInputs(name, email, reply_text, '#error_reply_' + comment_id)){
            return;
        }

        $.ajax({
            url: url,
            type: "POST",
            data: {
                name: name,
                email: email,
                comment_id: comment_id,
                reply_text: reply_text,
                reply_posted: 1
            },
            success: function(data){
                if (data.trim() === "duplicate"){
                    // do nothing
                } else  if (data === "error") {
                    alert('There was an error adding reply. Please try again');
                } else {
                    reply_textarea.val('');
                    reply_name.value = '';
                    reply_email.value = '';

                    replies_div.prepend(data);
                    comment_reply_form_to_show_hide.toggle(500);
                }
            }
        });
    });
});
