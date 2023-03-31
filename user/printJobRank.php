<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<?php 
$jid = $_POST["jobId"];
// $fname = $_POST["jobId"];
echo $jid;
//echo $_GET["jobid"];

?>
<script>
var req='';
var cvs = '';
$.ajax({
      type: "POST",
      url: 'ajax.php?action=getjobdet',
      data: {jobid : <?php //echo '"'.$_GET["jobid"].'"'; ?>},
      success: function(response)
      {
          //document.write(response);
          console.log(response);
          const arr2 = response.split("#");
          req = arr2[1].trim();
          cvs = arr2[0].trim();
          cvs = cvs.slice(0, -1);
          var arr = 
          {
            // 'req': 'Azure,JavaScript,Zend,Codeigniter,Symfony,HTML5,PHP,OOP,CSS,SQL,MySQL',
            // 'cv': 'Alice Clark CV.pdf,Alice Clark CV1.pdf'
            'req': req,
            'cv': cvs
          }; 
          //console.log(arr);
          $.ajax({
              url: 'http://127.0.0.1:8000/cv_prediction/',
              type: 'POST',
              data: JSON.stringify(arr),
              contentType: 'application/json; charset=utf-8',
              dataType: 'json',
              async: false,
              success: function(msg) {
                //var data = JSON.stringify(msg);
                //document.write(msg);
                //console.log(msg);
                let strs='';
                for (let key in msg) {
                  if (msg.hasOwnProperty(key)) {
                    strs += key + '-' + msg[key] + '#';
                  }
                }
                console.log(strs);
                
                $.ajax({
                    type: "POST",
                    url: 'ajax.php?action=updaterank',
                    data: {strinfo : strs},
                    success: function(response)
                    {
                      document.write(response);
                      //console.log(msg);
                    }
                });

              }
          });
      }
  });


</script> 


