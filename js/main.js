$(document).ready(function(){
    $("input").keyup(function(){
          var amt = +$("#amt").val();
          var amtpaid = +$("#amtpaid").val();
          var paid = +$("#paid").val();
          $("#bal").val(amtpaid+paid-amt);
        });
    });
    
$(document).ready(function(){
    $("input").keyup(function(){
          var amtn = +$("#amtn").val();
          var paidn = +$("#paidn").val();
          $("#baln").val(paidn-amtn);
        });
    });
    
$("#search").on("keyup", function() {
    var value = $(this).val();

    $("table tr").each(function(index) {
        if (index !== 0) {

            $row = $(this);

            var id = $row.find("td:nth-child(2)").text();

            if (id.indexOf(value) !== 0) {
                $row.hide();
            }
            else {
                $row.show();
            }
        }
    });
});
