<div class="card-body" name="fines" id="fines" style="display:none;">
				    <form method="POST" action="./server/issue.php">
					  <div class="row">
					    <div class="col-lg-3 col-md-3 col-sm-3 mt-3">
					      <div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text bg-dark text-white">GH₵</span>
						  </div>
						  <input type="number" name="ghc" class="form-control" placeholder="eg. 2.00 or 2.50" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" required>
						</div>
					    </div>
					    <div class="col-lg-3 col-md-3 col-sm-3 mt-3">
					      <div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text bg-dark text-white">GCR</span>
						  </div>
						  <input type="text" name="gcr" class="form-control" value="Optional">
						</div>
					    </div>
					    <div class="col-lg-4 col-md-4 col-sm-4 mt-3">
					      <div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <label class="input-group-text bg-dark text-white" for="inputGroupSelect01"><i class="fas fa-2x fa-ballot-check">.</i></label>
						  </div>
						  <select class="custom-select" name="tolltypeid">
						    <option disabled selected>fine type</option>
						    <?php 
            					$query = mysqli_query($conn,"select * from `tolltype` where subhead = 2");
            					while($row = mysqli_fetch_array($query)){
            				?>
						    <option value="<?php echo $row['tolltypeid']; ?>"><?php echo $row['tolltype']; ?></option>
						    <?php
            			      }
            			      ?>
						  </select>
						</div>
					    </div>
					    <div class="col-lg-5 col-md-5 col-sm-5 mt-3">
					      <div class="input-group input-group-lg">
						  <div class="input-group-prepend">
						    <span class="input-group-text bg-dark text-white"><i class="fas fa-2x fa-sms"></i></span>
						  </div>
						  <input type="tel" name="tollpayer" class="form-control" placeholder="Tollpayer's Phone #" pattern="[0-9]+" maxlength="10" required>
						</div>
					    </div>
					  </div>
					  <input type="text" name="issuer" value="<?php echo $loggeduser['fname']; ?> <?php echo $loggeduser['lname']; ?>" hidden>
					  <input type="text" name="issid" value="<?php echo $userid ?>" hidden>
					  <input type="text" name="area" value="<?php echo $loggeduser['areaid']; ?>" hidden>
					  <input type="text" name="phone" value="<?php echo $loggeduser['phone']; ?>" hidden>
					  <br>
					  <div class="text-center">
					  	<button type="submit" name="submit" class="btn btn-lg btn-success">Submit</button>
					  </div>
					</form>
				</div>