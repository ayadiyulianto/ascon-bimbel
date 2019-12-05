  <div class="product-status mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="tab-content-details mg-b-30">
                            <h2>Latihan Soal</h2>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-status-wrap drp-lst">
                            <div class="asset-inner">
                                <table>
                                    <tr>
                                        <th>No</th>
                                        <th>Modul</th>
                                        <th>Status</th>
                                        <th>Tanggal Pengerjaan</th>
                                        <th>Nilai</th>
                                        <th></th>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>Latihan 1</td>
                                        <td>Berhasil</td>
                                        <td>11 Nov 19</td>
                                        <td>80</td>
                                        <td>
                                            <a href="<?php echo base_url('peserta/latihansoal/bahas')?>" class="pd-setting">Bahas</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Latihan 2</td>
                                        <td>Gagal</td>
                                        <td>12 Nov 19</td>
                                        <td>50</td>
                                        <td>
                                            <a href="<?php echo base_url('peserta/latihansoal/latihan')?>" class="ds-setting">Ulangi</a>
                                        </td>
                                    </tr>
                                    <?php for($i=0; $i<=5; $i++){ ?>
                                    <tr>
                                        <td>3</td>
                                        <td>Latihan 3</td>
                                        <td>Belum Dikerjakan</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <?php } ?>
                                </table>
                            </div>
                            <!-- <div class="custom-pagination">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                                    </ul>
                                </nav>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>