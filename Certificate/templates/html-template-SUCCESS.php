<html>
  <body>

    <section>
      
      <div id="logo-box">
        <img src="<?php echo $data["logo"]; ?>">
      </div>

      <div class="mt-1 box-center w-100">
        <div class="box-center">
          <p class="p p1 black">This is to certify that</p>
          <div  class="box-center w-100 font-style-darkblue darkblue">
            <div  class="textbox black p3">
              <?php echo $data["name"]; ?>
            </div>
          </div>
        </div>
      </div>
  
      <div class="mt-1 box-center w-100">
        <div class="box-center">
          <p class="p p1 black">passed</p>
          <div class="mt-0 box-center w-100 title cyan">
            <?php echo $data["zertifikat"];?>
          </div> 
        </div>
      </div>
   
      <div class="mt-2">
        <div class="box-left w-50">
          <p class="p p2 grey">with a score of</p>
          <div class="box-left w-100 font-style-darkblue darkblue">
            <?php echo $data["scoreNumber"]; ?> of <?php echo $data["scoreMax"]; ?>
          </div>
      </div>
  
      <div class="box-right w-50">
          <p class="p p2 grey">spent time</p>
          <div class="box-right w-100 font-style-darkblue darkblue">
            <?php echo $data["time"]; ?></div>
          </div>
      </div>
 
      <div class="box-center">
        <div class="box-center mt-0">
          <p class="mt-0 p p2 grey">on</p>
          <div  class="box-center w-100 font-style-darkblue darkblue">
            <?php echo $data ["date"]; ?>
          </div>  
        </div>
      </div>


  
      <div class="box-center mt-1">
        <div class="box-center">
          <p class="mt-0 box-center p p2 grey">Signature</p>
          <div id="signature-box" class="mt-0 box-center">
          </div>
        </div>
      </div>

    </section>
     
  </body>
</html>