
$(document).ready(
    function(){
        // User registration
        $("#ajaxpost").on('submit',(function(e) {
            e.preventDefault();
           $('.firstnameerror').html("");
            $('.emailerror').html("");
            $('.passworderror').html("");
            $('.conpasserror').html("");
            
            $('.imagesizeerror').html("");
            $('.filetypeerror').html("");
            $('.messagesuccessone').html("");
            $('.messagefail').html("");

            $.ajax({
                url: "ajaxPost.php", 	// Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(res)   // A function to be called if request succeeds
                {
                  //  console.log(res);
                    if (res.Fname) {
                        $('.firstnameerror').html(res.Fname);
                    }
                    if (res.Email) {
                        $('.emailerror').html(res.Email);
                    }
                    if (res.Password) {
                        $('.passworderror').html(res.Password);
                    }
                    if (res.Password_confirm) {
                        $('.conpasserror').html(res.Password_confirm);
                    }
                   
                    if (res.Image_size) {
                        $('.imagesizeerror').html(res.Image_size);
                    }
                    if (res.Filetype) {
                        $('.filetypeerror').html(res.Filetype);
                    }
                    if (res.Success_Reg) {
                        $('.messagesuccessone').html(res.Success_Reg);
                        
                    }
                    if (res.Query_error) {
                        $('.messagefail').html(res.Query_error);
                        
                    }
                    
                    
                }
            });
        }));

        // login using ajax
        $("#loginform").on('submit',(function(e) {
            e.preventDefault();
            $('.emailerror').html("");
            $('.passworderror').html("");
            $('.emailvalid').html("");
            $('.accountError').hide();
            $('.accountSuccess').hide();
            $.ajax({
                url: "ajaxLogin.php", 	// Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(res)   // A function to be called if request succeeds
                {
                    if (res.Email) {
                        $('.emailerror').html(res.Email);
                    }
                    if (res.Password) {
                        $('.passworderror').html(res.Password);
                    }
                    if (res.Email_valid) {
                        $('.emailvalid').html(res.Email_valid);
                    }
                    if (res.Error) {
                        $('.accountError').show();
                        $('.accountError').html(res.Error);
                    }
                    if (res.Success == "Loggedin") {
                        $('.accountSuccess').show();
                        $('.accountSuccess').html("Logged in successfully!");
                        setTimeout("redirection()", 30);
                    }
                }
            });
        }));
       

        // Chat application using ajax
        $("#sendmessage").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "sendmessage.php",// Url to which the request is send
                type: "POST",             // Type of request to be send, called as method
                data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
                contentType: false,       // The content type used when sending data to the server.
                cache: false,             // To unable request pages to be cached
                processData:false,        // To send DOMDocument or non processed data file it is set to false
                success: function(res)    // A function to be called if request succeeds
                {
                    if (res.Error == null) {
                        if (res.Message) {
                            let myId = $('#myId').val();
                            if (myId == res.senderId) {
                                var holder = "mine";
                            }else{
                                var holder = "yours";
                            }
                            $('.chat').append(`
                            <div class="`+holder+` messages animated zoomInLeft">
                            <?php echo 'Post created on'.' '. $row['created_at']?>
                                <div 
                                
                                class="message last">`+res.Message+`</div>
                                <div id="likereply"> <button type="submit" class="btn btn-success" id="likebtn">Like</button>
                            <button type="submit" class="btn btn-warning" id="commentbtn">Reply</button>
                            </div>
                            </div>`
                    
                        );
                        //$('.chat').append(`
                           // <div class=""> <button type="submit" class="btn btn-success">Like</button>
                           // <button type="submit" class="btn btn-warning">Comment</button>
                           // </div>`
                    
                       // );
                            $('#textmessage').val("");
                        }
                    }
                    else{
                        alert(res.Error);
                    }
                }
            });
        }));
    }
);




function redirection(){
    window.location.href='profile.php';
}

setInterval( function(){
    var mateId = $('#mateId').val();
    var usersId = $('#myId').val();
    let data = {mateId, usersId};
    $('.chat').html("");
    $.get('getmessages.php', data, function(result){
        for (let i = 0; i < result.length; i++) {
            if (usersId == result[i].user_from) {
                var holder = "mine";
            }else{
                var holder = "yours";
            }
            $('.chat').append(`
            <?php
            <div class="`+holder+` messages">
            <form action="profile.php" method="get">
                <div class="message last">`+result[i].message+`</div>
                <div class=""><button type="submit" class="btn btn-success" id="likebtn">Like</button>
            <button type="submit" class="btn btn-warning" id="replybtn">Reply</button>
            </div>
            </form>
            </div>
            ?>`);
            //$('.chat').append(`
            //<div class=""><button type="submit" class="btn btn-success">Like</button>
            //<button type="submit" class="btn btn-warning">Comment</button>
            //</div>`);
        }
    });
}, 500000000000000);

getusers();
function getusers(){
    $.get('getusers.php', function(result){
        for (let i = 0; i < result.length; i++) {
            $('.alluserslist').append(`<div id="`+result[i].id+`" class="card-body">
            <img class="rounded-circle" src="images/`+result[i].avatar+`" width="50">`+result[i].firstname+`
        </div>`);
        }
    });
}

$(document).on('click','.card-body',function() {
    $('#mateId').val(this.id);
});
// for (let i = 0; i <= 5; i++) {
//     console.log(i);   
// }

$('#test1').click(function(){
    let fname = $('#firstname').val();
    let pass = $('#password').val();
    let email = $('#email').val();
    console.log(fname+' '+pass+' '+email);
});

//hidding and showing elements
$('#hidediv').click(function(){
    this.hide();
    $('#nmb1').hide(5000);
    $('#nmb2').show(2000);
});

//adding text to the document
$('#addtext').click(function(){
    // $('#nmb1').html('A dynamically added text');
    $('.sidemenu').append(`<ul class="list-group text-dark">
    <li class="list-group-item">1</li>
    <li class="list-group-item">2</li>
    <li class="list-group-item">3</li>
</ul>`);
});


//fake chat
$('#fakechat').click(function(){
    let fname = $('#firstname').val();
    if (fname == '') {
        alert('Please type the first name');
    }else{
        $('.listchat').append(`
            <li class="list-group-item">`+fname+`</li>
        `);
        $('#firstname').val('');
    }
});