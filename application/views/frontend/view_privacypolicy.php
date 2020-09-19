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
<h5>Purpose and who we are</h5>
<p class="text-justify">The purpose of this Privacy Notice is to describe how Oasse Bimbel, Inc., our subsidiaries, and our international branches, ("Oasse Bimbel," "us," "we," or "our") collects, uses, and shares information about you through our online interfaces (e.g., websites and mobile applications) owned and controlled by us, including but not limited to oassebimbel.org and rhyme.com (collectively referred to herein as the "Site"). Please read this Privacy Notice carefully to understand what we do. If you do not understand any aspects of our Privacy Notice, please feel free to contact us at privacy@oassebimbel.org. Your use of our Site is also governed by our Terms of Use..Terms used but not defined in this Privacy Notice can be found in our Terms of Use. Oasse Bimbel, Inc. is a Delaware corporation with a principal place of business at 381 E. Evelyn Ave., Mountain View, CA 94041. If you reside or are located in the European Economic Area ("EEA") Oasse Bimbel is the data controller of all Personally Identifiable Information (as defined below) collected via the Site and of certain Personally Identifiable Information collected from third parties, as set out in this Privacy Notice.</p>
<h5>What Information this Privacy Notice Covers</h5>
<p class="text-justify">This Privacy Notice covers information we collect from you through our Site. Some of our Site’s functionality can be used without revealing any Personally Identifiable Information, though for features or Services related to the Content Offerings, Personally Identifiable Information is required. In order to access certain features and benefits on our Site, you may need to submit, or we may collect,
"Personally Identifiable Information" (i.e., information that can be used to identify you)(may also be referred to as “personal data” or “personal information”). Personally Identifiable Information can include information such as your name, email address, IP address, and device identifier, among other things. You are responsible for ensuring the accuracy of the Personally Identifiable Information you submit to Oasse Bimbel. Inaccurate information may affect your ability to use the Site, the information you receive when using the Site, and our ability to contact you. For example, your email address should be kept current because that is one of the primary manners in which we communicate with you.</p>
<h5>What You Agree to by Using Our Site</h5>
<p class="text-justify">We consider that the legal bases for using your personal information as set out in this Privacy Notice are as follows:
  <ul>
<li>our use of your personal information is necessary to perform our obligations under any contract with you (for example, to comply with the Terms of Use of our Site which you accept by browsing our website and/or to comply with our contract to provide Services to you); or
our use of your personal information is necessary for complying with our legal obligations; or</li>
<li>use of your personal information is necessary for our legitimate interests or the legitimate interests of others. Our legitimate interests are to:</li>
<li>consent, to send you certain communications or where you submit certain information to us.</li>
</ul>
<p class="text-justify">Which legal basis applies to a specific processing activity will depend on the type of personal information processed and the context in which it is processed. If we rely on our (or another person's) legitimate interests for using your personal information, we will undertake a balancing test to ensure that our (or the other person's) legitimate interests are not outweighed by your interests or fundamental rights and freedoms which require protection of the personal information. We may process your personal information in some cases for marketing purposes on the basis of your consent (which you may withdraw at any time as described below). If we rely on your consent for us to use your personal information in a particular way, but you later change your mind, you may withdraw your consent by visiting your profile page and clicking the box to remove consent or delete your account and we will stop doing so. However, if you withdraw your consent, this may impact the ability for us to be able to provide our Services to you.</p>
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
