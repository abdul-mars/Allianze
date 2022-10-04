// profile image code to hide input field and image trigger input field click
function fileInputTrigger() {
    document.querySelector('#profilePic').click();
}
function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);

        }
        reader.readAsDataURL(e.files[0]);
    }
}

// scroll to the top code to make to buton disappear when scrolled to top
$(document).ready(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 200) {
            $('.scroll-top').fadeIn();
        } else {
            $('.scroll-top').fadeOut();
        }
    });
    // if($(this).scrollTop() > 100){
    //     $('.scroll-top').fadeIn();
    // } else {
    //     $('.scroll-top').fadeOut();
    // }
});

// tooltip code from bootstrap official site
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl)
});

// update question
// $(document).ready(function() {
//     $('.updateQuestion').click(function(){
//         var self = this;
//         var updateQuestion = $(this).data('id');

//         // send ajax request
//         $.ajax({
//             url: 'admin_operations.php?operation=update_question',
//             type: 'POST',
//             data: {data:updateQuestion},
//             success: function(response){
//                 // Removing row from HTML table
//                 if(response == 1){
//                     bootbox.alert("Question updated successfully");
//                 } else{
//                     bootbox.alert("Unable to Update Question, please try again later");
//                 }
//             }
//         });
//     })
// });

function makeAdmin() { // make admin code to pop up a corfirmation dialog
    $(document).ready(function(){
    // make admin code to pop up a corfirmation dialog
        $('.makeAdmin').click(function(){
            var el = this;
            var makeAdmin = $(this).data('id');

            // Confirm box
            bootbox.confirm("Do you really want to make this user an <b class='text-primary'>Admin?</b>", function(result){
                if(result) {
                    // AJAx Request
                    $.ajax({
                        url: 'admin_operations.php?operation=makeadmin',
                        type: 'POST',
                        data: { id:makeAdmin },
                        success: function(response){

                            // Removing row from HTML table
                            if(response == 1){
                                bootbox.alert("User is now Admin");
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function(){
                                    $(this).remove();
                                });
                            } else{
                                bootbox.alert("<p class='text-danger'>Unable to make user Admin. </p><p>Please try again later.</p> ");
                            }
                        }
                    });
                }
            });
        });
    });
}

function removeAdmin() { // remove admin code to pop up a corfirmation dialog
    $(document).ready(function(){
    // make admin code to pop up a corfirmation dialog
        $('.removeAdmin').click(function(){
            var el = this;
            var makeAdmin = $(this).data('id');

            // Confirm box
            bootbox.confirm("Do you really want to make this user an <b class='text-primary'>Admin?</b>", function(result){
                if(result) {
                    // AJAx Request
                    $.ajax({
                        url: 'admin_operations.php?operation=removeadmin',
                        type: 'POST',
                        data: { id:makeAdmin },
                        success: function(response){

                            // Removing row from HTML table
                            if(response == 1){
                                bootbox.alert("User is removed from been admin");
                                $(el).closest('tr').css('background', 'tomato');
                                $(el).closest('tr').fadeOut(800, function(){
                                    $(this).remove();
                                });
                            } else{
                                bootbox.alert("<p class='text-danger'>Unable to make user Admin. </p><p>Please try again later.</p> ");
                            }
                        }
                    });
                }
            });
        });
    });
}

 function deleteUser() { // pop up confiming delete code
    $(document).ready(function() {
     // pop up confiming delete code
        $('.delete').click(function(){
            var del = this;
            var deleteUser = $(this).data('id');

            // confirm box
            bootbox.confirm("Do You really want to <b class='text-danger'>Delete</b> this user? <br> <b class='text-danger'>This action is irriversible!</br>", function(result){
                if (result) {
                    // AJAX Reguest
                    $.ajax({
                        url: 'admin_operations.php?operation=delete',
                        type: 'POST',
                        data: { id:deleteUser },
                        success: function(response){
                            // Removing row form table
                            if (response == 1) {
                                bootbox.alert("User deleted successfully! ");
                                $(del).closest('tr').css('background', 'tomato');
                                $(del).closest('tr').fadeOut(800, function () {
                                    $(this).remove();
                                });
                            } else {
                                bootbox.alert("<b class='text-danger'>Unable Delete this user.</b><br> <b class='text-danger'>Please try again later.</b>");
                            }
                        }
                    });
                }
            });
        });
    });
 }

// delete self account
$(document).ready(function() {
    // pop up confiming delete code
   $('.deleteAccount').click(function(){
       var del = this;
       var deleteAccount = $(this).data('id');

       // confirm box
       bootbox.confirm("<div class='row'><div class='col'></div><div class='col'><i class='fas fa-exclamation-circle' width='200px' height='200px'></i></div></div> Do You really want to <b class='text-danger'>Delete</b> your Account? <br> <b class='text-danger'>This action is irriversible!</br> <div> <div class='col'></div> </div>",
        function(result){
           if (result) {
               // AJAX Reguest
               $.ajax({
                   url: 'operations.php?operation=delete',
                   type: 'POST',
                   data: { id:deleteAccount },
                   success: function(response){
                       // Removing row form table
                    //    if (response == 1) {
                    //        bootbox.alert("Account deleted successfully! ");
                    //        $(this).remove();
                    //    } else {
                    //        bootbox.alert("<b class='text-danger'>Unable Delete this account.</b><br> <b class='text-danger'>Please try again later.</b>");
                    //    } 
                    // alert(response);
                   }
               });
           }
       });
   });
});


// Comments ajax code
$(function(){
    function showComments() { //code to show comment
        $.ajax({ 
            url: 'comments_show.php',
            success:function(response){
                $('.showComments').html(response);
            }
        })
    }
    function clearFielld() { //fuction to clear comments field after comment is submitted
        $('.comment').val('');
    }
    showComments();
    setInterval(function(){ //function to reload the comment every ten seconds
        showComments();
    }, 10000);
    $('.submit').click(function(){ //code to add comments 
        var name = $('.name').val();
        var email = $('.email').val();
        var picture = $('.picture').val();
        var comment = $('.comment').val();
        $.ajax({
            url: 'comments_add.php',
            data: 'name='+name+'&email='+email+'&picture='+picture+'&comment='+comment,
            type: 'post',
            success:function(){
                // alert('comment submitted successfully');
                showComments();
                clearFielld();
            }
        })
    })
});


// users table pagenation
$(document).ready(function() {
    load_users();
    function load_users(pagenation) {
        $.ajax({
            url: "admin_operations.php?operation=users_table",
            method: "POST",
            data: {pagenation:pagenation},
            dataType: "text",
            success: function(data) {
                $('#usersTable').html(data);
            }
        })
    }

    $(document).on('click', '.pagenationLink', function(){
        var pagenation = $(this).attr('id');
        load_users(pagenation);
    });
});

// questions table pagenation (not yet working)
$(document).ready(function() {
    // load_questions();
    // function load_questions(pagenation) {
    //     $.ajax({
    //         url: "admin_operations.php?operation=questions_table",
    //         method: "POST",
    //         data: {pagenation:pagenation},
    //         dataType: "text",
    //         success: function(data) {
    //             $('#questionsTable').html(data);
    //         }
    //     })
    // }

    // $(document).on('click', '.pagenationLink', function(){
    //     var pagenation = $(this).attr('id');
    //     load_questions(pagenation);
    // });
});

// quiz table pagenation
$(document).ready(function() {
    load_quiz();
    function load_quiz(pagenation) {
        $.ajax({
            url: "admin_operations.php?operation=quiz_table",
            method: "POST",
            data: {pagenation:pagenation},
            dataType: "text",
            success: function(data) {
                $('#quizTable').html(data);
            }
        })
    }

    $(document).on('click', '.pagenationLink', function(){
        var pagenation = $(this).attr('id');
        load_quiz(pagenation);
    });
});


// search questions code
$(document).ready(function(){
    $('#search').keyup(function(){
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: 'admin_operations.php?operation=search_question',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#questionsTable').html(data);
                }
            });
        } else {
            $('#questionsTable').html('');
            $.ajax({
                url: 'admin_operations.php?operation=search_question',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#questionsTable').html(data);
                }
            });
        }
    });
});

// search users code
$(document).ready(function(){
    $('#search').keyup(function(){
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: 'admin_operations.php?operation=search_user',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#usersTable').html(data);
                }
            });
        } else {
            $('#usersTable').html('');
            $.ajax({
                url: 'admin_operations.php?operation=search_user',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#usersTable').html(data);
                }
            });
        }
    });
});

// user search question code
$(document).ready(function(){
    $('#search').keyup(function(){
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: 'operations.php?operation=search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#searchResult').html(data);
                }
            });
        } else {
            $('#searchResult').html('');
            $.ajax({
                url: 'operations.php?operation=search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#searchResult').html(data);
                }
            });
        }
    });
});


// admin general search code
$(document).ready(function(){
    $('#adminSearch').keyup(function(){
        var txt = $(this).val();
        if (txt != '') {
            $.ajax({
                url: 'admin_operations.php?operation=admin_general_search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#adminGeneralSearch').html(data);
                }
            });
        } else {
            $('#adminGeneralSearch').html('');
            $.ajax({
                url: 'admin_operations.php?operation=admin_general_search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#adminGeneralSearch').html(data);
                }
            });
        }
    });
});


// admin general search code When user click the search button
$(document).ready(function(){
    $('#generalSearchBtn').click(function(){
        var txt = $('#adminSearch').val();
        if (txt != '') {
            $.ajax({
                url: 'admin_operations.php?operation=admin_general_search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#adminGeneralSearch').html(data);
                }
            });
        } else {
            $('#adminGeneralSearch').html('');
            $.ajax({
                url: 'admin_operations.php?operation=admin_general_search',
                method: 'post',
                data: {search:txt},
                dataType: 'text',
                success: function(data) {
                    $('#adminGeneralSearch').html(data);
                }
            });
        }
    });
});

// count users online code
$(document).ready(function(){
    function showOnline() { //code to show comment
        $.ajax({ 
            url: 'admin_operations.php?operation=users_online',
            success:function(response){
                $('.showOnline').html(response);
            }
        })
    }
    showOnline();
    setInterval(function(){ //function to reload the comment every ten seconds
        showOnline();
    }, 1000);
})

// display number of notification
$(document).ready(function(){
    function showOnline() { //code to show comment
        $.ajax({ 
            url: 'admin_operations.php?operation=notification_count',
            success:function(response){
                $('#notificationCount').html(response);
            }
        })
    }
    showOnline();
    setInterval(function(){ //function to reload the comment every ten seconds
        showOnline();
    }, 1000);
})

// clear notification count when notification button click
$(document).ready(function(){
    $('.notification_btn').click(function(){
        var notification = $('#notificationCount').innerText;
        $.ajax({
            url: 'admin_operations.php?operation=notification_clear',
            method: 'post',
            data: {notification:notification},
            dataType: 'text',
            success: function(response){
                
            }
        })
        
    })
})




// commenting ajax code
$(document).ready(function(){
    load_comment();
    function load_comment(){
        $.ajax({
            type: "POST",
            url: 'comment_handler.php',
            data: {
                'comment_load_data': true
            },
            success: function(response){
                $('.comment-container').html('');
                // console.log(response);
                $.each(response, function(key, value){
                    $('.comment-container').
                    append('<div class="reply_box border p-2 mb-2">\
                            <h6 class="border-bottom d-inline"> '+value.user['fullname'] +' : '+value.cmt['commented_on'] +' </h6>\
                            <p class="para">'+value.cmt['msg'] +'</p>\
                            <button value="'+value.cmt['id'] +'" class="btn btn-warning reply_btn">Reply</button>\
                            <button value="'+value.cmt['id'] +'" class="btn btn-danger view_reply_btn">View Replies</button>\
                            <div class="ml-4 reply_section">\
                            </div>\
                        </div>\
                    ');
                });
            }
        });
    }

    $(document).on('click', '.reply_btn', function(){
        var thisClicked = $(this);
        var cmt_id = thisClicked;

        $('.reply_section').html('');
        thisClicked.closest('.reply_box').find('.reply_section').
        html('<input type="text" class="reply_msg form-control border border-secondary my-2" placeholder="Reply">\
            <div class="text-end">\
                <button class="btn btn-sm btn-primary reply_add_btn">Reply</button>\
                <button class="btn btn-sm btn-danger reply_cancel_btn">Cancel</button>\
            </div>\
        ');
    });

    $(document).on('click', '.reply_cancel_btn', function(){
        $('.reply_section').html('');
    })

    $(document).on('click', '.reply_add_btn', function(e){
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.closest('.reply_box').find('.reply_btn').val();
        var reply = thisClicked.closest('.reply_box').find('.reply_msg').val();

        var data = {
            'comment_id': cmt_id,
            'reply_msg': reply,
            'add_reply': true
        };
        $.ajax({
            type: 'POST',
            url: 'comment_handler.php',
            data: data,
            success: function(response){
                alert(response);
                $('.reply_section').html('');
            }
        });
    })

    $(document).on('click', '.view_reply_btn', function(e){
        e.preventDefault();

        var thisClicked = $(this);
        var cmt_id = thisClicked.val();

        $.ajax({
            type: 'POST',
            url: 'comment_handler.php',
            data: {
                'cmt_id': cmt_id,
                'view_comment_data': true
            },
            success: function(response){
                // console.log(response);
                $('.reply_section').html('');
                $.each(response, function(key, value){
                  thisClicked.closest('.reply_box').find('.reply_section').
                    append('<div class="sub_reply_box border-bottom p-2 mb-2">\
                            <input type="hidden" class="get_username" value="'+value.user['fullname'] +' ">\
                            <h6 class="border-bottom d-inline"> '+value.user['fullname'] +' : '+value.cmt['commented_on'] +' </h6>\
                            <p class="para"> '+value.cmt['reply_msg'] +' </p>\
                            <button value=" '+value.cmt['comment_id'] +'" class="badge btn-warning sub_reply_btn">Reply</button>\
                            <div class="ml-4 sub_reply_section">\
                            </div>\
                        </div>\
                    ');  
                });
            }
        });      
    });
    $(document).on('click', '.sub_reply_btn', function(e){
        e.preventDefault();
        var thisClicked = $(this);
        var cmt_id = thisClicked.val();

        var username = thisClicked.closest('.sub_reply_box').find('.get_username').val();
        $('.sub_reply_section').html('');
        thisClicked.closest('.sub_reply_box').find('.sub_reply_section').
        append('<div>\
               <input type="text" value="<b>@'+username+'</b>" class="sub_reply_msg form-control my-2" placeholder="Your Reply">\
           </div>\
           <div class="text-end">\
                <button class="btn btn-sm btn-primary text-dark sub_reply_add_btn">Reply</button>\
                <button class="btn btn-sm btn-danger text-dark sub_reply_cancel_btn">Cancel</button>\
           </div>\
        ');
    });

    $(document).on('click', '.sub_reply_add_btn', function(e){
        e.preventDefault();
        var thisClicked = $(this);
        var cmt_id = thisClicked.closest('.sub_reply_box').find('.sub_reply_btn').val();
        var reply = thisClicked.closest('.sub_reply_box').find('.sub_reply_msg').val();

        var data = {
            'cmt_id': cmt_id,
            'reply_msg': reply,
            'add_subreplies': true
        };
        $.ajax({
            type: 'POST',
            url: 'comment_handler.php',
            data: data,
            success: function(response) {
                $('.reply_section').html('');
                alert(response);
            }
        });
    });


    $(document).on('click', '.sub_reply_cancel_btn', function(e){
        e.preventDefault();
        $('.sub_reply_section').html('');
    });



    $('.submit').click(function(e) {
        e.preventDefault();
        var msg = $('.comment').val();
        // var userId = $('.userId').val();
        
        // validate
        if ($.trim(msg).length == 0) {
            error_msg = "Please type your comment";
            $('#error_status').text(error_msg);
        } else {
            error_msg = '';
            $('#error_status').text(error_msg);
        }
        if (error_msg != '') {
            return false;
        } else {
            var data = {
                'msg': msg,
                // 'userId': userId,
                'submit': true,
            };
            $.ajax({
                type: 'POST',
                url: 'comment_handler.php',
                // data: 'msg='+msg+'&userId='+userId,
                data: data,
                // dataType: 'json',
                success: function(response) {
                    alert(response);
                    $('.comment').val('');
                    $('.userId').val('');
                }
            });
        }
    });
});