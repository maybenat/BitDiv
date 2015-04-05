<?php
include 'peopleDB.php';

$q = $_REQUEST["q"];
if ($q == "") {
  foreach ($peopleList as $key => $val) {
    echo "<li class=\"list-group-item\"><div class=\"clear\"><a href=\"page_people.php?email=$key&following=0\">$val</a></div><small class=\"text-muted\">";
    switch ($riskList[$key])
    {
      case 0: echo "High Risk</small></li>"; break;
      case 1: echo "Medium Risk</small></li>"; break;
      case 2: echo "Low Risk</small></li>"; break;
    }
  }
} else {
  $hint = "";
  $q = strtolower($q);
  $len=strlen($q);
  foreach($peopleList as $key => $val) {
    if (stristr($q, substr($val, 0, $len))) {
      if ($hint === "") {
        $hint = "<li class=\"list-group-item\"><div class=\"clear\"><a href=\"page_people.php?email=$key&following=0\">$val</a></div><small class=\"text-muted\">";
        switch ($riskList[$key])
        {
          case 0: $hint .= "High Risk</small></li>"; break;
          case 1: $hint .= "Medium Risk</small></li>"; break;
          case 2: $hint .= "Low Risk</small></li>"; break;
        }
      } else {
        $hint .= "<li class=\"list-group-item\"><div class=\"clear\"><a href=\"page_people.php?email=$key&following=0\">$val</a></div><small class=\"text-muted\">";
        switch ($riskList[$key])
        {
          case 0: $hint .= "High Risk</small></li>"; break;
          case 1: $hint .= "Medium Risk</small></li>"; break;
          case 2: $hint .= "Low Risk</small></li>"; break;
        }
      }
    }
  }
}

$nosuggestion = "</br><div class=\"text-center\"> <a href class=\"btn btn-sm btn-primary padder-md m-b\">More Connections</a> </div>";

echo $hint == "" ? $nosuggestion : $hint;
?>