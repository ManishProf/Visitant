<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'ADMIN';
?>

 <div class="site-index">
   <?php if(Yii::$app->session->hasFlash('successMessage')){?>
            <div class="alert alert-success">
                <?php echo Yii::$app->session->getFlash('successMessage')?>
            </div>
<?php } ?>
    <div class="jumbotron">
       <!-- <h1 style="color:orange"></h1> !-->

        <p class="lead" style="color:black;font-family:verdana;font-size:36px;color:orange">Mediology Visitor Management System</p>
        <?php echo Html::img('http://www.visitant.com/Visitant/backend/web/medo.jpeg', ['alt' => 'My logo','width'=>'50%','height'=>'50%']) ?>

        <!--<p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p> !-->
       
    </div>


 <!--   <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
               <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p> !-->
           <!-- </div>
            <div class="col-lg-4">
              <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p> !-->
            <!-- </div>
            <div class="col-lg-4">
              <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p> !-->
          <!--  </div>
        </div>

    </div> !-->
</div> 
