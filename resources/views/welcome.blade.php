<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <title>Wallex</title>
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
    <style>
        
        .content{
            text-align: center;
            margin-top: 20%;
        }

        .content .title{
             margin: auto;
             border-bottom: solid .75px #aaa;
             width: 20%;
             color: #bbb;
             padding-bottom: 20px;
         }
        .content .links{
            margin: auto;
            width: 50%;
            color: #555;
            padding-top: 20px;
        }
        .content .links a{
            color: #761b18;
            padding: 20px;
        }
    </style>

            <div class="content">
                <div class="title">
                   <h1>Wallex Project</h1>
                </div>

                <div class="links">
                    <a href="{{route('add_post')}}">Send Post</a>
                    <a href="{{route('add_comment')}}">Send Comment</a>
                </div>
            </div>
    </body>
</html>
