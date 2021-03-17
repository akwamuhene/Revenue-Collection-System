<form method="POST" action="./server/rates.php">
    <div class="col-12 mt-3"><h6 class="text-danger">Showing Results for <?php echo $hsenum; ?> in <?php echo $year; ?></h6></div>
      <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="hsenum">House Number/Address</label>
    	  <input type="text" name="hsenum" class="form-control" value="<?php echo $row['hsenum']; ?>" style="width:100%;" readonly>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="amt">Amount Owed</label>
    	  <input type="number" name="amt" id="amt" class="form-control" value="<?php echo $row['amt']; ?>" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" readonly>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="amtpaid">Total Paid</label>
    	  <input type="number" name="amtpaid" id="amtpaid" class="form-control" value="<?php echo $row['sumamt']; ?>" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" readonly>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="bal">Remaining Balance</label>
    	  <input type="number" name="bal" id="bal" class="form-control" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" readonly>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="paid">Payment</label>
    	  <input type="number" name="paid" id="paid" class="form-control" value="Enter Amount to be paid" step="0.01" min="0" aria-label="Amount (to the nearest cedi)" required>
    	</div>
        <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
          <label for="gcr">GCR Number</label>
    	  <input type="text" name="gcr" class="form-control" value="<?php echo $row['gcr']; ?>" style="width:100%;" required>
    	</div>
    	  <input type="text" name="rate" value="<?php echo $row['rate']; ?>" hidden>
        <div class="col-lg-6 col-md-6 col-sm-6 mt-3">
          <label for="tel">Phone Number</label>
    	  <input type="tel" name="taxpayer" class="form-control" placeholder="Taxpayer Phone #" pattern="[0-9]+" maxlength="10" style="width:100%;" required>
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