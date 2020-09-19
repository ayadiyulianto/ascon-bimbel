<!DOCTYPE html>
<html lang="en">
  <head>

    <!-- head -->
    <?php $this->load->view('template/_head') ?>

  </head>
  <body>

    <!-- navigation -->
    <?php $this->load->view('template/_header') ?>

    <!-- CONTENT -->
    <div class="content content-fixed">
      <div class="container pd-x-0 pd-lg-x-10 pd-xl-x-0">
        <div class="row">

          <div class="col-md-3 col-xl-2 d-none d-md-block">
            <label class="tx-sans tx-10 tx-medium tx-spacing-1 tx-uppercase tx-color-03 mg-b-15">Getting Started</label>
            <ul class="nav nav-classic">
              <a href="<?=base_url('page/tentang')?>" class="nav-link <?= $this->uri->segment(2)=='tentang' ? 'active':'' ?>">Tentang Kami</a>
              <a href="<?=base_url('page/syaratketentuanlayanan')?>" class="nav-link <?= $this->uri->segment(2)=='syaratketentuanlayanan' ? 'active':'' ?>">Syarat dan Ketentuan</a>
              <a href="<?=base_url('page/privacypolicy')?>" class="nav-link <?= $this->uri->segment(2)=='privacypolicy' ? 'active':'' ?>">Kebijakan Privasi</a>
              <a href="<?=base_url('page/faq')?>" class="nav-link <?= $this->uri->segment(2)=='faq' ? 'active':'' ?>">Frequently Asked Question</a>
              <a href="<?=base_url('page/kontak')?>" class="nav-link <?= $this->uri->segment(2)=='kontak' ? 'active':'' ?>">Hubungi Kami</a>
            </ul>
          </div>

          <div class="col-md-9 col-xl-10">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1 mg-b-10">
                <li class="breadcrumb-item"><a href="<?=base_url('page/tentang')?>">Getting Started</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?=$title?></li>
              </ol>
            </nav>
            <div class="card mg-t-20">
              <div class="card-header">
                <h4 class="mg-b-0"><?=$title?></h4>
              </div>
              <div class="card-body pd-20">

                  <h5>Thank you for using Oasse Bimbel!</h5>
<p class="text-justify">Oasse Bimbel's products and services are provided by Oasse Bimbel, Inc. These Terms of Use ("Terms") govern your use of Oasse Bimbel's website, apps, and other products and services ("Services"). As some of our Services may be software that is downloaded to your computer, phone, tablet, or other device, you agree that we may automatically update this software, and that these Terms will apply to such updates. Please read these Terms carefully, and contact us if you have any questions. By using our Services, you agree to be bound by these Terms, including the policies referenced in these Terms.</p>
<h5>Using Oasse Bimbel</h5>
<h6>Who May Use our Services</h6>
<p class="text-justify">You may use our Services only if you can form a binding contract with Oasse Bimbel, and only in compliance with these Terms and all applicable laws. When you create your Oasse Bimbel account, and subsequently when you use certain features, you must provide us with accurate and complete information, and you agree to update your information to keep it accurate and complete. Any use or access by anyone under the age of 13 is prohibited, and certain regions and Content Offerings may have additional requirements and/or restrictions.</p>
<h6>Our License to You</h6>
<p class="text-justify">Subject to these Terms and our policies (including the Acceptable Use Policy, Honor Code, and course-specific eligibility requirements, and other terms), we grant you a limited, personal, non-exclusive, non-transferable, and revocable license to use our Services. You may download content from our Services only for your personal, non-commercial use, unless you obtain Oasse Bimbel's written permission to otherwise use the content. You also agree that you will create, access, and/or use only one user account, unless expressly permitted by Oasse Bimbel, and you will not share with any third party access to or access information for your account. Using our Services does not give you ownership of any intellectual property rights in our Services or the content you access.</p>
<h5>Content Offerings</h5>
<h6>Changes to Content Offerings</h6>
<p class="text-justify">Oasse Bimbel offers courses and content ("Content Offerings") from universities and other providers ("Content Providers"). While we seek to provide world-class Content Offerings from our Content Providers, unexpected events do occur. Oasse Bimbel reserves the right to cancel, interrupt, reschedule , or modify any Content Offerings, or change the point value or weight of any assignment, quiz, or other assessment. Content Offerings are subject to the Disclaimers and Limitation of Liability sections below.</p>
<h6>No Academic Credit</h6>
<p class="text-justify">Unless otherwise explicitly indicated by a credit-granting institution, participation in or completion of Content Offering does not confer any academic credit. Even if credit is awarded by one institution, there is no presumption that other institutions will accept that credit. You agree not to accept credit for completing a Content Offerings unless you have earned a Course Certificate or other equivalent documentation of your completion of the Content Offerings. Oasse Bimbel, instructors, and the associated Content Providers have no obligation to have Content Offerings recognized by any educational institution or accreditation organization.</p>
<h6>Disclaimer of Student-Partner Relationship</h6>
<p class="text-justify">Except as described in the Degree and MasterTrackTM Certificate Programs Section below, nothing in these Terms or otherwise with respect to your participation in any Content Offerings by university or company partners ("Partners") : (a) establishes any relationship between you and any Partner; (b) enrolls or registers you in any Partner institution, or in any Content Offering offered by any Partner institution; or (c) entitles you to use the resources of any Partner institution beyond participation in the Content Offering.</p>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <!-- footer -->
    <?php $this->load->view('template/_footer') ?>
    <?php $this->load->view('template/_foot') ?>

    <!-- another js -->

    <script>
      $(function(){
        'use strict'

      })
    </script>

  </body>
</html>
