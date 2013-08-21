<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Cake Build + Bootstrap</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <?php
            echo $this->Html->css("bootstrap.css");
            echo $this->Html->css("bootstrap-responsive.css");
        ?>
        <style type="text/css">
            body {
                padding-top: 60px;
            }
            h3{
                color: #ffffff;
            }
            h2{
                color: #000000;
            }
            .bs-masthead {
                padding-bottom: 165px;
                padding-top: 80px;
            }
            .panel-footer{ 
                margin: 0px;
            }
        </style>
    </head>
 <body class="bs-docs-home">
        <?php echo $this->element('top-menu')?>
        <div class="bs-masthead container">
                <?php echo $this->Session->flash(); ?>
                <?php echo $content_for_layout; ?>
        </div>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <?php
   /* echo $this->Html->script("jquery");*/
    echo $this->Html->script("bootstrap");
    /*echo $this->Html->script("bootstrap-transition");
    echo $this->Html->script("bootstrap-alert");
    echo $this->Html->script("bootstrap-modal");
    echo $this->Html->script("bootstrap-dropdown");
    echo $this->Html->script("bootstrap-scrollspy");
    echo $this->Html->script("bootstrap-tab");
    echo $this->Html->script("bootstrap-tooltip");
    echo $this->Html->script("bootstrap-popover");
    echo $this->Html->script("bootstrap-button");
    echo $this->Html->script("bootstrap-collapse");
    echo $this->Html->script("bootstrap-carousel");
    echo $this->Html->script("bootstrap-typeahead");*/
    ?>
    
<script>
    $(document).ready(function(){
        $('#profile').hide();
        $('#profile_button').click(function(){
            $('#profile').toggle();
        });

    });
 </script>
   <div class="panel-footer">
    <div class="container">Copyright@ Cake Build</div>
    </div>
</body>
</html>
