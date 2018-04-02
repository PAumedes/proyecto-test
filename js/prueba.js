$(document).ready(function () {

    // $(".login-btn").on("click", function () {
    //     $(".login").toggleClass("show");
    // });

    // $(".register-btn").on("click", function () {
    //     $(".register").toggleClass("show");
    // });

    $(".login-btn").click(function(){
        $(".login").toggle("slow");
        $(".register").hide("slow");
    });
    $(".register-btn").click(function(){
        $(".register").toggle("slow");
        $(".login").hide("slow");
    });

});