$('#toggleSign').click(function() {
 if ($("#formValue").val() == 1) {
    $('.modal-title').html("Sign in");  
    $('#toggleSign').html("Sign up");  
    $("#signButton").html("Sign in");
    $("#formValue").val(0);
    $("#errors-div").html(" ");
 }
 else {
    $('.modal-title').html("Sign up");  
    $('#toggleSign').html("Sign in");
    $("#signButton").html("Sign up");
    $("#formValue").val(1);
    $("#errors-div").html(" "); 
}  
})
$('#signButton').click(function() {
    $.ajax({
        type: "POST",
        url: "actions.php?action=sign",
        data: "email=" + $("#email").val() + "&password=" + $("#password").val() + "&formValue=" + $("#formValue").val(),
        success: function(res) {
            if (res == 1) {
                window.location.replace("http://localhost/twitterApp/index.php");
            }
            else {
                $("#errors-div").html(res);
            }
        }
    })      
})

$('.toggleFollow').click(function(){
    alert 
})

$('.tweetButton').click(function(){
    if($("#tweet-box").val()) {
    alert($("#tweet-box").val());
    $.ajax({
        type: "POST",
        url: "actions.php?action=PostTweet",
        data: "newTweet=" + $("#tweet-box").val(),
        success: function() {
            window.location.replace("http://localhost/twitterApp/index.php");
        }
    })
    }
    else {  
        alert("fill something");
    }
})
$('.toggleFollow').click(function(){
    let userId =$(this).attr('data-userid');
    $.ajax({
        type: "POST",
        url: "actions.php?action=FollowUser",
        data: "followingId="+userId,
        success: function() {
            window.location.replace("http://localhost/twitterApp/index.php");
        }
    })
})
$('.toggleUnfollow').click(function() {
    let userId =$(this).attr('data-userid');
    $.ajax({
        type: "POST",
        url: "actions.php?action=UnfollowUser",
        data: "unfollowingId="+userId,
        success: function() {
            window.location.reload();   
        }
    })
})
function toggleColorSwitch(x) {
    $(x).toggleClass("btn-primary");
    $(x).toggleClass("btn-danger");
}
$('.unfollow-btn').hover(function(){
    $(this).html('UNFOLLOW');
    toggleColorSwitch(this);
},function(){
    $(this).html('FOLLOWING');
    toggleColorSwitch(this);

})

$('.nav-link').hover(function(){
    $(this).animate({
        backgroundColor:'#007bff',
        color:'white'
    })
},function(){
    $(this).animate({
        backgroundColor:'white',
        color:'black'
    })
})