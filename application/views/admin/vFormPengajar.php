<?php $this->load->view('admin/header') ?>

        <!-- Basic Form Start -->
        <div class="basic-form-area mg-t-15 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline8-list">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Tambah Pengguna</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <h3>Sign In</h3>
                                                <p>Register User can get sign here</p>
                                                <form action="#">
                                                    <div class="form-group-inner">
                                                        <label>Email</label>
                                                        <input type="email" class="form-control" placeholder="Enter Email" />
                                                    </div>
                                                    <div class="form-group-inner">
                                                        <label>Password</label>
                                                        <input type="password" class="form-control" placeholder="password" />
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-sm btn-primary pull-right login-submit-cs" type="submit">Log In</button>
                                                            <label>
																	<input type="checkbox" class="i-checks"> Remember me </label>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                <h3>Not a member?</h3>
                                                <p>You can create an account:</p>
                                                <div class="create-account-sign">
                                                    <a href="#"><i class="fa fa-sign-in big-icon"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php $this->load->view('admin/footer') ?>