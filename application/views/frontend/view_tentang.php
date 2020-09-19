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
                <p class="text-justify">
                  <h6>The standard Lorem Ipsum passage, used since the 1500s</h6>
"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."
<br><br>
<h6>Section 1.10.32 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC</h6>
"Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?"
<br><br>
<h6>1914 translation by H. Rackham</h6>
"But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?"
                </p>
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
