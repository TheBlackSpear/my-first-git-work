
<?php /**
* Author:Alain KIKOUN 
**/ ?>
<br>
<div class="content">
  <div class="container">
    <div>
       <?php
          if(isset($errMSG)){
            ?>
              <div class="alert alert-danger text-center" style="margin-top:10px;">
                <span class="fa fa-info-circle"></span> <strong><?php echo $errMSG; ?></strong>
                <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
              </div>
              <?php
            }elseif(isset($successMSG)){
          ?>
            <div class="alert alert-success text-center" style="margin-top:10px;">
                  <strong><span class="fa fa-info-circle"></span> <?php echo $successMSG; ?></strong>
               <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> -->
          </div>
      <?php  } ?>
    </div> 
    <pre> <b>Super Brain</b> est un <em>creuset de savoirs !</em> </pre>
  </div>
</div>