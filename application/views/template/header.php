                            <?php $current_uri = $this->router->fetch_class().'/'.$this->router->fetch_method(); ?>

                            <a class="brand" href="<?php echo site_url('dashboard/index'); ?>"><i class="icon-home icon-white"></i> Eleave System</a>

                            <ul class="nav user_menu pull-right">
								<?php if(($this->session->userdata('role_id')!=ADMIN)){ ?>
								<li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="Annual Leave"><?php echo $the_leave_data['leave_data_records']->annual_leave_balance; ?> <i class="splashy-contact_grey"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="Sick Leave"><?php echo $the_leave_data['leave_data_records']->sick_leave_balance; ?> <i class="splashy-add_outline"></i></a>
                                    </div>
                                </li>
								<?php } ?>
								 <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><li class="hidden-phone hidden-tablet">Welcome <?php echo $this->session->userdata('username'); ?></li></a>
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon-cog icon-white"></i><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="<?php echo site_url('profile_setting/index');?>"><i class="icon-user"></i> Profile Setting</a></li>
                                        <li class="divider"></li>
                                        <li><a href="<?php echo site_url('login/logout');?>"><i class="icon-off"></i> Logout</a></li>
                                    </ul>
                                </li>
                            </ul>

                            <!--<a data-target=".nav-collapse" data-toggle="collapse" class="btn_menu">
                                <span class="icon-align-justify icon-white"></span>
                            </a>-->
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <!--<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Pages <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="<?php //echo base_url(); ?>" target="_blank"><i class="icon-file"></i> Paapuu Home Page</a></li>
                                                <li><a href="http://www.facebook.com/PaapuuEducation" target="_blank"><i class="icon-file"></i> Paapuu Facebook</a></li>
                                                <li><a href="http://paapuu.com" target="_blank"><i class="icon-file"></i> Paapuu Blog</a></li>
                                            </ul>
                                        </li>-->
										<li class="dropdown">

                                          <!-- <ul class="dropdown-menu">
												<li class="dropdown">
													<a href="#">Sub menu <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.2</a></li>
														<li><a href="#">Sub menu 1.3</a></li>
														<li>
															<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
															<ul class="dropdown-menu">
																<li><a href="#">Sub menu 1.4.1</a></li>
																<li><a href="#">Sub menu 1.4.2</a></li>
																<li><a href="#">Sub menu 1.4.3</a></li>
															</ul>
														</li>
													</ul>
												</li>
											 </ul>	-->
											 <ul class="dropdown-menu">
												<li class="dropdown">

												</li>
                                            </ul>
                                        </li>
                                        <!--<li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"> menu <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">menu section</a></li>
                                                <li><a href="#">menu section</a></li>
                                                <li><a href="#">menu section</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"> menu <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">menu section</a></li>
                                                <li><a href="#">menu section</a></li>
                                                <li><a href="#">menu section</a></li>
                                            </ul>
                                        </li>-->
                                    </ul>
                                </div>
                            </nav>