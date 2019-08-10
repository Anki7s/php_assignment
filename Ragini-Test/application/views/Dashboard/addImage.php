<?php $this->load->view('common/header');?>
<!--contact section-->
<section class="contact-section color-dark bg-gray text-center">
            <div class="container contact-section-container">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <div class="wow bounceInLeft animated" data-wow-offset="0" data-wow-delay="0.4s">
                            <div class="section-heading text-center">
                                <h2 class="h-bold">Add New Images</h2>
                                <div class="divider-header"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container form-container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form class="contactForm">
                            <div class="form-group">
                                <input type="text" name="imageName" class="form-control" id="imageName" placeholder="Your Image Name" >
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="imageTitle" id="imageTitle" placeholder="Enter Image Title" >
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="imageType" id="imageType" placeholder="Enter Image Type" >
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn btn-skin btn-lg btn-block">Send Message</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
  <?php $this->load->view('common/footer');?>
  