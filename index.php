<?php
function __autoload($str_class){
    require 'app/'.$str_class.'.php';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Textarea with CKEDITOR | PHP OOP</title>
    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body{
            font-family: 'Calibri';
        }
        p, h1, h2, h3, h4, h5, h6{
            color: #333;
        }
        .col-lg-5, .col-md-5{
            margin: 15px 0 0 0;
        }
        .content-list{
            margin: 0 0 15px 0;
        }
    </style>

</head>
<body>

<!-- container -->
<div class="container">

    <?php $text = new Info(); ?>

    <div class="col-lg-5 col-md-5" style="float: none;margin: auto">
        <h3>Textarea personal | CKEDITOR</h3>
        <hr>
        <div class="center">
            <form method="post" id="form-insert">
                <p>Title:</p>
                <input type="text" name="title" class="form-control">
                <br/>
                <p>Describe yourself or others, and then send form:</p>
                <textarea class="ckeditor" name="content" id="content"></textarea>
                <br>
                <button type="submit" name="btn-save" class="btn btn-primary" style="border-radius: 0px">Save</button>
            </form>
            <?php

            if(isset($_POST['btn-save'])){

                $title = $_POST['title'];
                $content = $_POST['content'];

                if(empty($title) || empty($content)){

                    echo "<p class='alert alert-warning'><strong>Oops!</strong> All fields are required.</p>";

                }else{

                    $text->setTitle($title);
                    $text->setContent($content);

                    if($text->create()){

                        echo "<p class='alert alert-success'><strong>Success!</strong> The form was sended.</p>";

                    }else{

                        echo "<p class='alert alert-danger'><strong>Error!</strong> Ocurred an intern error.</p>";

                    }

                }
            }

            ?>

            <br/>

            <h3>Register's list | CKEDITOR</h3>
            <hr>
            <form method="post" id="form-delete">
                <?php if($text->getAll() == null || count($text->getAll()) <= 0): ?>
                    <p style="font-size: 120%;font-weight: bold;padding: 4px;border: 1px solid #CCC;background: #EEE">No match results!</p>
                <?php else: ?>
                    <?php foreach($text->getAll() as $key => $value): ;?>
                        <div class="content-list">
                            <p><span style="margin: 0 5px 0 5px;color: #FFF;background: #333;width: 10px;height: 10px;border-radius: 200px;padding: 10px"><?php echo $value->id.'&#176;';?></span>Title: <?php echo $value->title;?></p>
                            <div class="content-intern">
                                <?php $describe = $value->content;
                                echo $describe;
                                ?>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $value->id;?>">
                            <button type="submit" name="btn-del" class="btn btn-danger" style="border-radius: 0px">Delete</button>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </form>
            <?php

            if(isset($_POST['btn-del'])){

                $id = $_POST['id'];

                if($text->delete($id)){

                    echo "<p class='alert alert-success'><strong>Success!</strong> The text was deleted.</p>";
                    header('Location: index.php');

                }else{

                    echo "<p class='alert alert-danger'><strong>Error!</strong> Ocurred an intern error.</p>";

                }

            }

            ?>
        </div>
    </div>

</div>
<!-- end container -->

<!-- jQuery 3.3.1 -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="ckeditor/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>

</body>
</html>
