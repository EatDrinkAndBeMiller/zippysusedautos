<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Zippy's Used Cars</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css" />
</head>

<body>
<main class="container">
    <div class="row justify-content-md-center login-screen">
        <div class="col-lg-6">

            <p class="text-danger h6 text-center"><?php if(isset($login_message)) {
                echo $login_message;
                }?></p>
        </div>
    </div>

    <div class="row justify-content-md-center login-screen">
        <div class="col-lg-6">
        <form action="." method="POST">
            <input type="hidden" name="action" value="login">
            <fieldset >
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" id="username" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" id="password" required>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </fieldset>
        </form>
        </div>
    </div>

    <div class="row justify-content-md-center login-screen">
        <div class="col-lg-6">
            <h4><a href="../index.php">Return to the public site</a></h4>
        </div>
    </div>
</main>
</body>
</html>