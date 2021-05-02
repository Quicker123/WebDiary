<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebDiary</title>
    <link rel="stylesheet" href="./index.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/css/bootstrap.min.css" integrity="sha512-P5MgMn1jBN01asBgU0z60Qk4QxiXo86+wlFahKrsQf37c9cro517WzVSPPV1tDKzhku2iJ2FVgL67wG03SGnNA==" crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js" integrity="sha512-XKa9Hemdy1Ui3KSGgJdgMyYlUg1gM+QhL6cnlyTe2qzMCYm4nAZ1PsVerQzTTXzonUR+dmswHqgJPuwCq1MaAg==" crossorigin="anonymous"></script>
    
        <style>
            img{
                height: 100px;
            }
        </style>
</head>
<body>
    <div id="mainContainer">
        <div id ="navigation"></div>
        <div id="home"></div>
        <div id="iceCream" class="container"></div>
    </div>
</body>
<script>
    function fetcher(type){
        $.get('requests.php' + "?f=" + type, {

        }, function (data){
            if(data.status == 200){
                if(type == 'navigation'){
                    $('#navigation').html(data.html);
                }
                if(type == 'home'){
                    $('#home').html(data.html);
                }
                if(type == 'iceCream'){
                    $('#iceCream').html(data.html);
                }
                
            }else{
                // alert("something went wrong");
            }
        });}
    function cart(type, id, count){
        $.ajax({
            type: "POST",
            url: "requests.php?f=updateCart&s=" + type,
            data: {"id": id, "count": count},
            dataType: 'JSON',
            success: function(data){
                if(data.status == 200){
                    app_start();
                }
            }
            
        });
    }

        function app_start(){
            fetcher('navigation');
            fetcher('home');
            fetcher('iceCream');
        }
        window.onload = app_start;
</script>
</html>