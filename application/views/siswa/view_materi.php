<?php $this->load->view('peserta/header'); ?>
        <div class="edu-accordion-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Modul</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="admin-pro-accordion-wrap shadow-inner responsive-mg-b-30">
                            <div class="alert-title">
                                <h2>Animate bounce Accordion</h2>
                                <p>These are the Custom bootstrap Animate bounce Accordion style 1</p>
                            </div>
                            <div class="panel-group edu-custon-design" id="accordion">
                                <?php for($i=0; $i<=5; $i++){ ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading accordion-head">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $i ?>">
                                     Collapsible Group 1</a>
                                        </h4>
                                    </div>
                                    <div id="collapse<?= $i ?>" class="panel-collapse panel-ic collapse">
                                        <div class="panel-body admin-panel-content animated bounce">
                                            <p>It was popularised in the 1960s with the release of Letraset sheets of the containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions.</p>
                                            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor incididunt ut labore et dolore magna aliqua of Lorem Ipsum. Ut enim adminim veniam, quis nostrud exercitation ullamco laboris nisis ut aliquip ex ea commodo consequat consectetur adipisicing elit.</p>
                                            <button class="btn btn-custon-four btn-primary">Lihat</button>
                                        </div>
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
<?php $this->load->view('peserta/footer'); ?>