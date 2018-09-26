<!doctype html>
<html lang="en">
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="Authorization" content="<?=session_id()?>">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">


        <link rel="stylesheet" href="/public/assets/css/style.css">
        <?php if(file_exists('public/assets/css/'.$this->page.".css")):?>
            <link rel="stylesheet" href="/public/assets/css/<?=$this->page?>.css">
        <?php endif;?>

        <title>Agenda</title>
    </head>
    <body>
    <?php include_once "App/Views/Templates/default/menu.php"; ?>

    <?=$this->content($data)?>

    <div class="modal fade" id="Loading" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" align="center">
                    <img src="/public/assets/img/loader.gif" align="center" width="300">
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalError" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" align="center">
                    <span id="error_status_code"></span>
                    <span id="error_message"></span>
                </div>
            </div>
        </div>
    </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <script src="/public/assets/js/lib/app.min.js"></script>
    <script src="/public/assets/js/helper-min.js"></script>

    <?php if(file_exists('public/assets/js/'.$this->page.".js")):?>
        <script src="/public/assets/js/<?=$this->page?>-min.js"></script>
    <?php endif;?>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'Authorization': $('meta[name="Authorization"]')[0].content
                },
                statusCode: {
                    500: function() {
                        $("#Loading").modal('hide');
                        $('#error_status_code').html('500');
                        $('#error_message').html('Internal server error');
                        $('#ModalError').modal('show');
                    },
                    406: function() {
                        $("#Loading").modal('hide');
                        $('#error_status_code').html('406');
                        $('#error_message').html('Yout already have this contact');
                        $('#ModalError').modal('show');
                    },
                    404: function() {
                        $("#Loading").modal('hide');
                        $('#error_status_code').html('404');
                        $('#error_message').html('Contact not found');
                        $('#ModalError').modal('show');
                    },
                    401: function() {
                        $("#Loading").modal('hide');
                        $('#error_status_code').html('401');
                        $('#error_message').html('Unauthorized');
                        $('#ModalError').modal('show');
                    },
                    400: function() {
                        $("#Loading").modal('hide');
                        $('#error_status_code').html('400');
                        $('#error_message').html('Bad request');
                        $('#ModalError').modal('show');
                    }
                }
            });

            $('.phone').mask('(99) 99999-9999');

            $(document).ajaxStart(function() {
                $("#Loading").modal('show');
            });
            $(document).ajaxStop(function() {
                setTimeout(function(){$("#Loading").modal('hide')}, 350);
            });
        });
    </script>
</html>