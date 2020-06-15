<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <div class="content">
        <div class="title m-b-md" style="text-align: center;margin-top: 5%;color: #4e555b">
            <h3>
                Send New Comment 
            </h3>
        </div>
        <div class="alert alert-danger print-error-msg" style="display:none">
            
        </div>
    <form id="form" style="width: 50%;margin: auto;margin-top: 5%">
            {{csrf_field()}}
            <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Enter Your Name">
            </div>
            <div class="form-group">
                <label>Content</label>
                <input type="text" class="form-control" id="content" placeholder="Content">
            </div>
            <label>Choose Post</label>
            <select class="form-control" name="post_id" id="post_id" style="margin-bottom: 15px;">
                {{$posts = \App\Post::all()}}
                @foreach($posts as $post)
                    <option value="{{$post->id}}">
                        {{$post->title}}
                    </option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary" style="width: 100%">send</button>
        </form>
    </div>
</body>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script>
       $(document).ready(function () {
            $('#form').on('submit', function (e) {
                e.preventDefault();
                let name = $('#name').val();
                let content = $('#content').val();
                let post_id = $('#post_id').val();
                let _token = $('input[name="_token"]').val();
                let formData = new FormData();
                formData.append('name',name);
                formData.append('content',content);
                formData.append('post_id',post_id);

                $.ajax({
                    method: 'POST',
                    url: '/insertComment',
                    data : formData,
                    contentType : false,
                    processData : false,
                    headers : {
                        'X-CSRF-TOKEN' : _token
                    },
                    success: function(data) {
                        if($.isEmptyObject(data.error)){
                            console.log(data);
                            location.reload();
                        }else{
                            printErrorMsg(data.error);
                        }

                    }
                })
                function printErrorMsg (msg) {
                        
                    $(".print-error-msg").find("ul").html('');

                    $(".print-error-msg").css('display','block');

                    $.each( msg, function( key, value ) {

                        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

                    });

                }

            });

        });
    </script>
</html>
