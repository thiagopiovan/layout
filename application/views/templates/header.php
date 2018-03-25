<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Css -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <title><?php echo $title; ?> | Project</title>

    <style>
        .border { 
            margin: 10px 0;
        }

        .toTop{
            position: fixed;
            bottom: 75px;
            right: 60px;
            border: none;
            color: white;
            padding: 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .morecontent span {
            display: none;
        }

        .morelink {
            display: block;
        }

        .more { 
            display: flex;
            flex-direction: column; 
        }
        
        .more a { 
            width: 100%;
            margin-top: auto; 
        }

        .container { 
            padding: 15px 15px; 
        }

        footer {
            padding: 20px 0;        
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"> </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
        $(document).ready(function() {
            // Configure/customize these variables.
            var showChar = 450;  // How many characters are shown by default
            var ellipsestext = "...";
            var moretext = "View article";     

            $('.more').each(function() {
                var content = $(this).html();
        
                if(content.length > showChar) {
        
                    var c = content.substr(0, showChar);
                    var h = content.substr(showChar, content.length - showChar);
        
                    var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="news/' + $(this).find('[name=id]').val() + '" class="morelink btn btn-primary">' + moretext + '</a></span>';
        
                    $(this).html(html);
                }        
            });

            $(".btn").click(function() {
                swal({
                    title: "Good job!",
                    text: "Your form was successfully submitted!",
                    icon: "success",
                    button: "Aww yiss!"
                }).then((value) => {
                    window.location = window.location.protocol + "//" + window.location.host + "/index.php/news";
                });
            });            
        });        
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="/">
        Project
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url('news') ?>">News</a>
        </li>
        </ul>
    </div>
    </nav>