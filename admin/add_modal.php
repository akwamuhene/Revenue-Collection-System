
<!-- Add Revenue Collector -->
    <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Tax Collector</h4></center>
                </div>
                    <div class="col-12">
                    <div class="modal-body">
                    <form role="form" method="POST" action="adduser.php">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon">First Name:</span>
                            <input type="text" class="form-control" name="fname" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Last Name:</span>
                            <input type="text" class="form-control" name="lname" required>
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Gender:</span>
                            <select class="form-control" name="gender">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Date of Birth:</span>
                            <input type="date" class="form-control" name="dob">
                        </div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Email:</span>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">Phone:</span>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon">User Rights:</span>
                            <select class="form-control" name="access" required>
                                <option selected disable>Choose...</option>
                                <option value="1">Admin</option>
                                <option value="2">Revenue Collector</option>
                            </select>
                        </div>
                        <?php
                        	$length = 4;
                            $randomString = substr(str_shuffle(str_repeat($x='1234567890', ceil($length/strlen($x)) )),1,$length);
                        ?>
                        <input type="text" value="<?php echo $randomString; ?>" name="pass" hidden>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
					</div>
				</div>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->

<!-- Add Target-->
    <div class="modal fade" id="addtarget" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Target</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addtarget.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Colletors:</span>
                            <select class="form-control" name="userid">
                                 <?php 
                                    $query = mysqli_query($conn,"select * from `users` where access=2");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['userid']; ?>"><?php echo $row['fname']; ?> <?php echo $row['lname']; ?></option>
                                <?php
                                  }
                                  ?>
                            </select>
                        </div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Target(GH₵):</span>
                            <input type="number" class="form-control" name="target">
                        </div>						
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->
<!-- Add Toll-->
    <div class="modal fade" id="addtoll" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    
                    <div class="form-group input-group">
                            <span class="input-group-addon">List of Revenues:</span>
                            <select class="form-control">
                                 <?php 
                                    $query = mysqli_query($conn,"select * from `tolltype`");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['tolltype']; ?>"><?php echo $row['tolltype']; ?></option>
                                <?php
                                  }
                                  ?>
                            </select>
                        </div>
                        <center><h4 class="modal-title" id="myModalLabel">Add New Revenue</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addtolltype.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Revenue subhead:</span>
                            <input type="text" class="form-control" name="tolltype" required>
                        </div>
                            <select class="form-control" name="revhead">
                                <option selected diasabled>Choose...</option>
                                <option value="1">Fees</option>
                                <option value="2">Fines</option>
                                <option value="3">Licences</option>
                            </select>
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->
<!-- Add Rate-->
    <div class="modal fade" id="addrate" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> 
                    <div class="form-group input-group">
                            <span class="input-group-addon">List of Rates:</span>
                            <select class="form-control">
                                 <?php 
                                    $query = mysqli_query($conn,"select * from `rates`");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['rate']; ?>"><?php echo $row['rate']; ?></option>
                                <?php
                                  }
                                  ?>
                            </select>
                        </div>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Rate</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addrate.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Rate:</span>
                            <input type="text" class="form-control" name="rate">
                        </div>
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->
<!-- Add Area-->
    <div class="modal fade" id="addarea" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <div class="form-group input-group">
                            <span class="input-group-addon">List of Areas:</span>
                            <select class="form-control">
                                 <?php 
                                    $query = mysqli_query($conn,"select * from `area`");
                                    while($row = mysqli_fetch_array($query)){
                                ?>
                                <option value="<?php echo $row['area']; ?>"><?php echo $row['area']; ?></option>
                                <?php
                                  }
                                  ?>
                            </select>
                        </div>
                    <center><h4 class="modal-title" id="myModalLabel">Add New Area</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
                    <form role="form" method="POST" action="addarea.php" enctype="multipart/form-data">
						<div class="container-fluid">
						<div style="height:15px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon">Area:</span>
                            <input type="text" class="form-control" name="area">
                        </div>
						</div>
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
					</form>
                </div>
			</div>
		</div>
    </div>
<!-- /.modal -->