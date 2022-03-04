<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


<style>
.actu-js {
    text-align: center;

}

.tweet {
    margin: 40px;
    margin-bottom: 25px;
    padding: 20px;
    background: white;
    border-radius: 20px;
    box-shadow: 1px 1px 16px #1818d191;

}

.content {
    background: #1DA1F2;
}
</style>




<div class="content">


    <div class="comment" style="margin: auto;text-align: center;">
        <textarea placeholder="votre tweet" name="" id="textarea" cols="25" rows="4"></textarea>
    </div>

    <div class="">
        <button class="btn btn-primary add-tweet">Tweet</button>

    </div>






    <div id="message">




    
    </div>

    <div class="actu-js">




    </div>

</div>


<script type="text/javascript">
var actu = $(".actu-js");




window.onload = function() {
    $.ajax({
        type: "POST",
        url: "../../backend/controller/fil_actu_controller.php",
        success: function(resultat) {
            if (resultat != "") {


                var data = JSON.parse(resultat);

                console.log(data) // data[0].text_post

                for (let i = 0; i < data.length; i++) {

                    actu.append("<div class='tweet "+ i + "' >"  + data[i].text_post + "</div>");
                }



            } else {

                console.log("aucun tweet")
            }
        }
    });

}




var addtweet = $(".add-tweet");
$(addtweet).click(function(e) {
    var message = $("#message")
    var text_area = $("#textarea").val();


    e.preventDefault();

    if (text_area == "") {

    } else {



        $.ajax({
            type: "POST",
            url: "../../backend/controller/post_tweet_controller.php",
            data: {
                comment: text_area,
            },
            success: function(resultat, statut) {
                if (resultat != "success") {
                    $(message).addClass("alert alert-danger");

                    $(message).text(resultat);



                } else {


                    console.log("sucess");
                }
            }
        });
    }

});
</script>