<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top:25%; max-width:500px; width:100%">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="exampleModalLabel">Login</h2>
                </div>
                <div class="modal-body">
                    <form class="form-signin" action='./login_post.php' method="post">
                        <br>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Id:</label>
                            <input type="text" name="id" class="form-control" placeholder="Id">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Password:</label>
                            <input type="password" name="pw" class="form-control" placeholder="Password">
                            <br>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 text-center">
                        <input class="btn btn-primary" type="submit" value="Login">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="signupModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="top:10%; width:100%; max-width:500px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h2 class="modal-title" id="exampleModalLabel">Sign up</h2>
                </div>
                <div class="modal-body">
                    <form class="form-signin" action='./signup_post.php' method="post">
                        <br>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Id:</label>
                            <input type="text" name="id" class="form-control" placeholder="Id">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Password:</label>
                            <input type="password" name="pw" class="form-control" placeholder="Password">
                            <br>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Name:</label>
                            <input type="text" name="name" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group" style="text-align:center; margin-bottom:0px;">
                            <div class="btn-group">
                                <label class="btn btn-primary">
                                    <input type="radio" name="sex" autocomplete="off" value="M">남자
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="sex" autocomplete="off" value="F">여자
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="control-label">Email:</label>
                            <input type="text" name="email" class="form-control" placeholder="Email">
                            <br>
                        </div>
                </div>
                <div class="modal-footer">
                    <div class="col-md-12 text-center">
                        <input class="btn btn-primary" type="submit" value="회원 가입">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>