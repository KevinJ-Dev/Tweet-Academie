

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<style>
    .mainContainer {
        height: 100%;

        display: grid;
        grid-template-columns: 1fr 1fr 1fr;

    }
    .left_view { 
        background: blue;
        height: 100%;

    }
    .center_view{
        background: yellow;
        height: 100%;

       
    }
    .right_view { 
        height: 100%;

        background: blue;
    
    }
</style>
<div class="mainContainer">


<div class="left_view">
    
<?php include "../left_view.php"; ?>

</div>

<div class="center_view">

<?php include "../center_view.php"; ?>


</div>

<div class="right_view">

<?php include "../right_view.php"; ?>

</div>



</div>




</body>
</html>





