<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<style>
    .user_date{
        font-size: 10px;
    }
.body {
    text-align: left;
    margin: 15px;
    padding: 4px;
}
.comment_tweet {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    border-top: 1px solid #c3babab3;
}

.text-area {
    margin: 5px;
    margin-bottom: 25px;
    padding: 20px;
    background: white;
    border-radius: 20px;
    box-shadow: 1px 1px 16px #1818d191;
}
.actu-js {
    margin: 55px;
    text-align: center;
}
.user_info {
    margin-left: -45px;
}
.img_profil_photo {
    height: 50px;
    width: 50px;
    border-radius: 100%;
    margin-right: -15px;
}
.add-tweet {
    width: 59%;
    border: none;
    margin-top: -15px;
    /* margin: 5px; */
    margin-bottom: 25px;
    padding: 20px;
    background: #eceeefa6;
    border-radius: 20px;
    box-shadow: 1px 1px 16px #1818d191;
    padding: 13px 15px;
}
.add-tweet:active {
    box-shadow: 1px 1px 16px inset #1818d191;
}
.tweet {
    margin: 5px;
    margin-bottom: 25px;
    padding: 20px;
    background: white;
    border-radius: 20px;
    box-shadow: 1px 1px 16px #1818d191;
}
.img_profil {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    justify-content: center;
    align-content: center;
    align-items: center;
}
.content {
    height: 100%;
    background: #1DA1F2;
}
.btn_comment {
    width: 405px;
    text-align: center;
}
.comment {
    padding-top: 100px;
}

</style>

<div class="content">
    <div class="comment" style="margin: auto;text-align: center;">
        <textarea class="text-area" placeholder="votre tweet" name="" id="textarea" cols="25" rows="2"></textarea>
    </div>

    <div class="btn_comment">
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

                    actu.append("<div class='tweet " + i + "' ></div>");

                    $("." + i).append("<div class='img_profil select_" + i +
                        "   '> <img class='img_profil_photo' src='../backend/userpp/" + data[i].pseudo +".png'></div>");

                    $(".select_" + i).append("<div class='user_info' >" + data[i].pseudo + "</div>")
                    $(".select_" + i).append("<div class='user_date' >" + data[i].date_post + "</div>")

                    $("." + i).append("<div class='body' >" + data[i].text_post + "</div>");

                    $("." + i).append("<div class='comment_tweet' > <p class='btn retweet'> <ion-icon name='heart-outline'></ion-icon>  <p class='btn retweet'> <ion-icon name='code-outline'></ion-icon>  </p>  <p class='btn retweet'> <ion-icon name='share-outline'></ion-icon>  </p></div>");
                   
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