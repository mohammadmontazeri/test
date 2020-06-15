<!doctype html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</head>
<body>
            <div class="content">
                <div class="title m-b-md" style="text-align: center;margin-top: 5%;color: #4e555b">
                        <h3>
                            Send New Post
                        </h3>
                </div>
                <div class="alert alert-danger print-error-msg" style="display:none">

                    <ul></ul>

                </div>
                <form id="form" style="width: 50%;margin: auto;margin-top: 5%">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label>Title</label>
                        <input type="text" class="form-control" id="title" aria-describedby="emailHelp" placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label>Content</label>
                        <input type="text" class="form-control" id="content" placeholder="Content">
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%">send</button>
                </form>
            </div>

</html>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#form').on('submit',function (e) {
            e.preventDefault();
           let  title = $('#title').val();
           let content = $('#content').val();
           let _token = $('input[name="_token"]').val();
           let formData = new FormData();
           formData.append('title',title);
           formData.append('content',content);

            $.ajax({
                method : 'POST',
                url : 'insertPost',
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
