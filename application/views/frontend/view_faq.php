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
                <div class="accordion accordion-style1">
                  <h6 class="accordion-title">What does royalty free mean?</h6>
                  <div class="accordion-body">Royalty free means you just need to pay for rights to use the item once per end product. You don't need to pay additional or ongoing fees for each person who sees or uses it.</div>
                  <h6 class="accordion-title">What do you mean by item and end product?</h6>
                  <div class="accordion-body">The item is what you purchase from Envato Market. The end product is what you build with that item. For example, the item is a business card template; the end product is the finalized business card. The item is a button graphic; the end product is an app using the button graphic in the app's interface. </div>
                  <h6 class="accordion-title">What are some examples of permitted end products?</h6>
                  <div class="accordion-body">You can buy a web template, add your text and images, and use it as your website. You can buy an HTML site template, convert it to WordPress, and use it as your website (but not as a stock template for sale. You can buy a flyer template, modify the text, print a flyer, and hand it out. You can buy a game starter kit, compile it, and put the game on an app store. You can buy a music track and use it in your radio or TV ad.</div>
                </div><!-- az-accordion -->
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
