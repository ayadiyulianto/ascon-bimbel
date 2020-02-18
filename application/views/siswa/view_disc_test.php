<?php $this->load->view('siswa/header_main'); ?>
        
        <div class="data-table-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Test Kepribadian DISC</h1>
                                    <span>Tes Kepribadian DISC membagi kepribadian manusia menjadi 4 macam: Dominance, Influence, Steadiness dan Compliance.</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="courses-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <form action="<?= base_url('siswa/disc/simpan') ?>" method="post">
                    <?php foreach($soal->result() as $row){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 mg-b-15">
                        <div class="white-box">
                            <?php $discOrder = 'd'.$row->id.',i'.$row->id.',s'.$row->id.',c'.$row->id?>
                            <input type="hidden" id="discOrder<?= $row->id ?>" name="discOrder<?= $row->id ?>" value="<?= $discOrder ?>" />
                            <ul id="sortable<?= $row->id ?>" class="basic-list">
                                <li id="d<?= $row->id ?>"><?= $row->soal_d ?> <span class="pull-right label-danger label-1 label"><i class="fa fa-sort"></i></span></li>
                                <li id="i<?= $row->id ?>"><?= $row->soal_i ?> <span class="pull-right label-danger label-1 label"><i class="fa fa-sort"></i></span></li>
                                <li id="s<?= $row->id ?>"><?= $row->soal_s ?> <span class="pull-right label-danger label-1 label"><i class="fa fa-sort"></i></span></li>
                                <li id="c<?= $row->id ?>"><?= $row->soal_c ?> <span class="pull-right label-danger label-1 label"><i class="fa fa-sort"></i></span></li>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="white-box">
                            <button type="submit" class="btn btn-primary"> Simpan</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>

<?php $this->load->view('siswa/footer'); ?>