<!doctype html>
<?php
  //Convert the crap that's been posted to us from the form to something we'll readable
  $stime = $_POST[servicetime];
  $childreninfo = $_POST[child];
  $code = $_POST[codenumber];

  //Let's set the $date variable so we can use it later
  date_default_timezone_set('America/New_York');
  $date = Date('m/d/Y');

  //Create a function to make the Service Time human readable
  function get_servicetime($time) {
    if($time === "sat-1730"){
      return "Sat. 5:30 PM";
    } elseif ($time === "sun-0900") {
      return "Sun. 9:00 AM";
    } elseif ($time === "sun-1030") {
      return "Sun. 10:30 AM";
    } elseif ($time === "sun-1200") {
      return "Sun. 12:00 PM";
    } else {
      $error = 'Service Time Not Defined in Code';
      throw new Exception($error);
    }
  }

  //Create a function to make the grades prettier
  function get_grade($grade){
    if($grade == "ps") {
      return "Preschool";
    } elseif ($grade == "kg") {
      return "Kindergarten";
    } else {
      return $grade;
    }
  }


// for testing only
  function array_keys_multi(array $array)
{
    $keys = array();

    foreach ($array as $key => $value) {
        $keys[] = $key;

        if (is_array($value)) {
            $keys = array_merge($keys, array_keys_multi($value));
        }
    }

    return $keys;
}

//print("<pre>".print_r($_POST,true)."</pre>");
 //echo("Hello World");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Print Labels</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Load Custom CSS -->
    <link href="assets/css/labelmaker.css" rel="stylesheet">

    <!-- JS to print on page load -->
    <script type="text/javascript">
      function PrintPage() {
        //window.print();
        //window.location.href = 'index.html'
      }
    </script>

  </head>
  <body onload="PrintPage();">
    <table>
      <tr>
        <td class="seccode spacer"><strong><?php echo($code); ?></strong></td>
        <td class="seccode spacer"><strong><?php echo($code); ?></strong></td>
      </tr>
      <tr>
        <td class="spacer"><strong><?php echo($date); ?></strong></td>
        <td class="spacer"><strong><?php echo($date); ?></strong></td>
      </tr>
      <tr>
        <td class="spacer">Keep this label to pick up your child.</td>
        <td class="spacer">Keep this label to pick up your child.</td>
      </tr>
      <tr>
        <td><img src="assets/img/vklogo.png"></td>
        <td><img src="assets/img/vklogo.png"></td>
      </tr>
    </table>
    <?php foreach ($childreninfo as $child): ?>
    <table>
      <tr>
        <td class="seccode spacer-left" colspan="3"><strong><?php echo($child[fname]); ?></strong></td>
        <td class="seccode right-align spacer-right"><strong><?php echo($code); ?></strong></td>
      </tr>
      <tr>
        <td class="spacer-left"colspan="2"><strong><?php echo($child[lname]); ?></strong></td>
        <td class="right-align spacer-right"colspan="2"><?php echo(get_servicetime($stime)); ?></span></td>
      </tr>
      <tr>
        <td colspan="4" class="spacer-left">Area: <?php echo(get_grade($child[grade])); ?></td>
      </tr>
      <tr>
        <td colspan="4"><img class="img-big" src="assets/img/vklogo.png"></td>
      </tr>
    </table>
    <table>
      <tr>
        <td class="seccode spacer-left" colspan="3"><strong><?php echo($child[fname]); ?></strong></td>
        <td class="seccode right-align spacer-right"><strong><?php echo($code); ?></strong></td>
      </tr>
      <tr>
        <td class="spacer-left"colspan="2"><strong><?php echo($child[lname]); ?></strong></td>
        <td class="right-align spacer-right"colspan="2"><?php echo(get_servicetime($stime)); ?></span></td>
      </tr>
      <tr>
        <td colspan="4" class="spacer-left">Area: <?php echo(get_grade($child[grade])); ?></td>
      </tr>
      <tr>
        <td colspan="4"><img class="img-big" src="assets/img/vklogo.png"></td>
      </tr>
    </table>
    <?php endforeach; ?>
  </body>
</html>
