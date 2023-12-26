  <section class="ftco-section testimony-section img">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center mb-5">
        <div class="col-md-12 text-center heading-section ftco-animate">
          <span class="subheading">Testimony</span>
          <h2 class="mb-4">Happy Customer</h2>
        </div>
      </div>
      <div class="row ftco-animate justify-content-center">
        <div class="col-md-12">
          <div class="carousel-testimony owl-carousel ftco-owl">
            <?php 
              $rsfeedback = mysqli_query($link, "select * from feedback order by id desc limit 10");
              while($r=mysqli_fetch_array($rsfeedback))
              {
                $uid = $r["userId"];
                $rsuserName =  mysqli_query($link, "select * from user where id = '$uid'");
                $rowUser = mysqli_fetch_assoc($rsuserName);
                $username = $rowUser["username"];
            ?>
            <div class="item">
              <div class="testimony-wrap text-center pb-5">
                <div class="user-img mb-4" style="background-image: url(images/person_1.jpg)">
                  <span class="quote d-flex align-items-center justify-content-center">
                    <i class="icon-quote-left"></i>
                  </span>
                </div>
                <div class="text p-3">
                  <p class="mb-4"><?php echo $r["feedback"]; ?></p>
                  <p class="name"><?php echo $username; ?></p>
                  <span class="position">Customer</span>
                </div>
              </div>
            </div>
            <?php
              }
            ?>

          </div>
        </div>
      </div>
    </div>
  </section>