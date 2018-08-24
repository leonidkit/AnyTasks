<?php
$start = microtime(true);
$mem_start = memory_get_usage();

//****************TREE*******************//

function print_tree($arr, int $depth = 0){
  if(!is_array($arr)) return;

  foreach ($arr as $key => $value) {
    if(is_array($value)) 
    {
      for($i = 0; $i < $depth; $i++) echo "--";
      echo $key . "\n";
    }
    if(is_array($value)) 
    {
      print_tree($value, $depth + 1);
    }
    else 
    {
      for($i = 0; $i < $depth; $i++) echo "--";
      echo $value . "\n";
    }
  }
}

//***************************************//

//**************REGULAR*****************//

function print_tree_regular($cats)
{
  $cats = preg_replace("~,~","",$cats);
  $cats = preg_replace("~[\'\"]([^\'\"]*)[\'\"][ ]*\=\>~U","<li>\\1",$cats);
  $cats = preg_replace("~[\'\"]([^\'\"]*)[\'\"]~U","<li>\\1</li>",$cats);
  $cats = preg_replace("~\[~i","<ul>",$cats);
  $cats = preg_replace("~\]~i","</ul></li>",$cats);
  $cats = preg_replace("~>[^a-z<>]*~iU",">",$cats);
  $cats = preg_replace("~[^a-z<>]*<~iU","<",$cats);
  $cats = preg_replace("~</li>$~iU","",$cats);
  file_put_contents("file.html", print_r($cats,true));
}

//**************************************//


//************NON-RECURSION*************//

function get_category_link(array $categories) { 
  $link = 'http://superduperdeal.com/' . implode('/',  
    array_map(  
      function($cat) { return urlencode($cat);}, $categories 
    )  
  ); 
  return $link; 
} 

function print_category_link(array $categories) { 
  $last_cat = count($categories)-1; 
  echo str_repeat("&nbsp;", $last_cat*2), '<a href="', get_category_link($categories) , '">', $categories[$last_cat], '</a><br/>';  
} 

function print_subtree_foreach($cats) {
    foreach($cats as $c1 => $c2) {
       print_r([$c1]);
       foreach($c2 as $c3 => $c4) {
        print_r([$c1, $c3]);
          foreach($c4 as $c5 => $c6) {
            print_r([$c1, $c3, $c5]);
              foreach($c6 as $c7) {
                print_r([$c1, $c3, $c5, $c7]);
              }
          }        
       }
    }
}
//**************************************//

$cats = array (
  'Category_1' => 
  array (
    'Category_1_1' => 
    array (
      'Category_1_1_1' => 
      array (
        0 => 'Category_1_1_1_1',
        1 => 'Category_1_1_1_2',
        2 => 'Category_1_1_1_3',
        3 => 'Category_1_1_1_4',
        4 => 'Category_1_1_1_5',
      ),
      'Category_1_1_2' => 
      array (
        0 => 'Category_1_1_2_1',
        1 => 'Category_1_1_2_2',
        2 => 'Category_1_1_2_3',
        3 => 'Category_1_1_2_4',
        4 => 'Category_1_1_2_5',
      ),
      'Category_1_1_3' => 
      array (
        0 => 'Category_1_1_3_1',
        1 => 'Category_1_1_3_2',
        2 => 'Category_1_1_3_3',
        3 => 'Category_1_1_3_4',
        4 => 'Category_1_1_3_5',
      ),
      'Category_1_1_4' => 
      array (
        0 => 'Category_1_1_4_1',
        1 => 'Category_1_1_4_2',
        2 => 'Category_1_1_4_3',
        3 => 'Category_1_1_4_4',
        4 => 'Category_1_1_4_5',
      ),
      'Category_1_1_5' => 
      array (
        0 => 'Category_1_1_5_1',
        1 => 'Category_1_1_5_2',
        2 => 'Category_1_1_5_3',
        3 => 'Category_1_1_5_4',
        4 => 'Category_1_1_5_5',
      ),
    ),
    'Category_1_2' => 
    array (
      'Category_1_2_1' => 
      array (
        0 => 'Category_1_2_1_1',
        1 => 'Category_1_2_1_2',
        2 => 'Category_1_2_1_3',
        3 => 'Category_1_2_1_4',
        4 => 'Category_1_2_1_5',
      ),
      'Category_1_2_2' => 
      array (
        0 => 'Category_1_2_2_1',
        1 => 'Category_1_2_2_2',
        2 => 'Category_1_2_2_3',
        3 => 'Category_1_2_2_4',
        4 => 'Category_1_2_2_5',
      ),
      'Category_1_2_3' => 
      array (
        0 => 'Category_1_2_3_1',
        1 => 'Category_1_2_3_2',
        2 => 'Category_1_2_3_3',
        3 => 'Category_1_2_3_4',
        4 => 'Category_1_2_3_5',
      ),
      'Category_1_2_4' => 
      array (
        0 => 'Category_1_2_4_1',
        1 => 'Category_1_2_4_2',
        2 => 'Category_1_2_4_3',
        3 => 'Category_1_2_4_4',
        4 => 'Category_1_2_4_5',
      ),
      'Category_1_2_5' => 
      array (
        0 => 'Category_1_2_5_1',
        1 => 'Category_1_2_5_2',
        2 => 'Category_1_2_5_3',
        3 => 'Category_1_2_5_4',
        4 => 'Category_1_2_5_5',
      ),
    ),
    'Category_1_3' => 
    array (
      'Category_1_3_1' => 
      array (
        0 => 'Category_1_3_1_1',
        1 => 'Category_1_3_1_2',
        2 => 'Category_1_3_1_3',
        3 => 'Category_1_3_1_4',
        4 => 'Category_1_3_1_5',
      ),
      'Category_1_3_2' => 
      array (
        0 => 'Category_1_3_2_1',
        1 => 'Category_1_3_2_2',
        2 => 'Category_1_3_2_3',
        3 => 'Category_1_3_2_4',
        4 => 'Category_1_3_2_5',
      ),
      'Category_1_3_3' => 
      array (
        0 => 'Category_1_3_3_1',
        1 => 'Category_1_3_3_2',
        2 => 'Category_1_3_3_3',
        3 => 'Category_1_3_3_4',
        4 => 'Category_1_3_3_5',
      ),
      'Category_1_3_4' => 
      array (
        0 => 'Category_1_3_4_1',
        1 => 'Category_1_3_4_2',
        2 => 'Category_1_3_4_3',
        3 => 'Category_1_3_4_4',
        4 => 'Category_1_3_4_5',
      ),
      'Category_1_3_5' => 
      array (
        0 => 'Category_1_3_5_1',
        1 => 'Category_1_3_5_2',
        2 => 'Category_1_3_5_3',
        3 => 'Category_1_3_5_4',
        4 => 'Category_1_3_5_5',
      ),
    ),
    'Category_1_4' => 
    array (
      'Category_1_4_1' => 
      array (
        0 => 'Category_1_4_1_1',
        1 => 'Category_1_4_1_2',
        2 => 'Category_1_4_1_3',
        3 => 'Category_1_4_1_4',
        4 => 'Category_1_4_1_5',
      ),
      'Category_1_4_2' => 
      array (
        0 => 'Category_1_4_2_1',
        1 => 'Category_1_4_2_2',
        2 => 'Category_1_4_2_3',
        3 => 'Category_1_4_2_4',
        4 => 'Category_1_4_2_5',
      ),
      'Category_1_4_3' => 
      array (
        0 => 'Category_1_4_3_1',
        1 => 'Category_1_4_3_2',
        2 => 'Category_1_4_3_3',
        3 => 'Category_1_4_3_4',
        4 => 'Category_1_4_3_5',
      ),
      'Category_1_4_4' => 
      array (
        0 => 'Category_1_4_4_1',
        1 => 'Category_1_4_4_2',
        2 => 'Category_1_4_4_3',
        3 => 'Category_1_4_4_4',
        4 => 'Category_1_4_4_5',
      ),
      'Category_1_4_5' => 
      array (
        0 => 'Category_1_4_5_1',
        1 => 'Category_1_4_5_2',
        2 => 'Category_1_4_5_3',
        3 => 'Category_1_4_5_4',
        4 => 'Category_1_4_5_5',
      ),
    ),
    'Category_1_5' => 
    array (
      'Category_1_5_1' => 
      array (
        0 => 'Category_1_5_1_1',
        1 => 'Category_1_5_1_2',
        2 => 'Category_1_5_1_3',
        3 => 'Category_1_5_1_4',
        4 => 'Category_1_5_1_5',
      ),
      'Category_1_5_2' => 
      array (
        0 => 'Category_1_5_2_1',
        1 => 'Category_1_5_2_2',
        2 => 'Category_1_5_2_3',
        3 => 'Category_1_5_2_4',
        4 => 'Category_1_5_2_5',
      ),
      'Category_1_5_3' => 
      array (
        0 => 'Category_1_5_3_1',
        1 => 'Category_1_5_3_2',
        2 => 'Category_1_5_3_3',
        3 => 'Category_1_5_3_4',
        4 => 'Category_1_5_3_5',
      ),
      'Category_1_5_4' => 
      array (
        0 => 'Category_1_5_4_1',
        1 => 'Category_1_5_4_2',
        2 => 'Category_1_5_4_3',
        3 => 'Category_1_5_4_4',
        4 => 'Category_1_5_4_5',
      ),
      'Category_1_5_5' => 
      array (
        0 => 'Category_1_5_5_1',
        1 => 'Category_1_5_5_2',
        2 => 'Category_1_5_5_3',
        3 => 'Category_1_5_5_4',
        4 => 'Category_1_5_5_5',
      ),
    ),
  ),
  'Category_2' => 
  array (
    'Category_2_1' => 
    array (
      'Category_2_1_1' => 
      array (
        0 => 'Category_2_1_1_1',
        1 => 'Category_2_1_1_2',
        2 => 'Category_2_1_1_3',
        3 => 'Category_2_1_1_4',
        4 => 'Category_2_1_1_5',
      ),
      'Category_2_1_2' => 
      array (
        0 => 'Category_2_1_2_1',
        1 => 'Category_2_1_2_2',
        2 => 'Category_2_1_2_3',
        3 => 'Category_2_1_2_4',
        4 => 'Category_2_1_2_5',
      ),
      'Category_2_1_3' => 
      array (
        0 => 'Category_2_1_3_1',
        1 => 'Category_2_1_3_2',
        2 => 'Category_2_1_3_3',
        3 => 'Category_2_1_3_4',
        4 => 'Category_2_1_3_5',
      ),
      'Category_2_1_4' => 
      array (
        0 => 'Category_2_1_4_1',
        1 => 'Category_2_1_4_2',
        2 => 'Category_2_1_4_3',
        3 => 'Category_2_1_4_4',
        4 => 'Category_2_1_4_5',
      ),
      'Category_2_1_5' => 
      array (
        0 => 'Category_2_1_5_1',
        1 => 'Category_2_1_5_2',
        2 => 'Category_2_1_5_3',
        3 => 'Category_2_1_5_4',
        4 => 'Category_2_1_5_5',
      ),
    ),
    'Category_2_2' => 
    array (
      'Category_2_2_1' => 
      array (
        0 => 'Category_2_2_1_1',
        1 => 'Category_2_2_1_2',
        2 => 'Category_2_2_1_3',
        3 => 'Category_2_2_1_4',
        4 => 'Category_2_2_1_5',
      ),
      'Category_2_2_2' => 
      array (
        0 => 'Category_2_2_2_1',
        1 => 'Category_2_2_2_2',
        2 => 'Category_2_2_2_3',
        3 => 'Category_2_2_2_4',
        4 => 'Category_2_2_2_5',
      ),
      'Category_2_2_3' => 
      array (
        0 => 'Category_2_2_3_1',
        1 => 'Category_2_2_3_2',
        2 => 'Category_2_2_3_3',
        3 => 'Category_2_2_3_4',
        4 => 'Category_2_2_3_5',
      ),
      'Category_2_2_4' => 
      array (
        0 => 'Category_2_2_4_1',
        1 => 'Category_2_2_4_2',
        2 => 'Category_2_2_4_3',
        3 => 'Category_2_2_4_4',
        4 => 'Category_2_2_4_5',
      ),
      'Category_2_2_5' => 
      array (
        0 => 'Category_2_2_5_1',
        1 => 'Category_2_2_5_2',
        2 => 'Category_2_2_5_3',
        3 => 'Category_2_2_5_4',
        4 => 'Category_2_2_5_5',
      ),
    ),
    'Category_2_3' => 
    array (
      'Category_2_3_1' => 
      array (
        0 => 'Category_2_3_1_1',
        1 => 'Category_2_3_1_2',
        2 => 'Category_2_3_1_3',
        3 => 'Category_2_3_1_4',
        4 => 'Category_2_3_1_5',
      ),
      'Category_2_3_2' => 
      array (
        0 => 'Category_2_3_2_1',
        1 => 'Category_2_3_2_2',
        2 => 'Category_2_3_2_3',
        3 => 'Category_2_3_2_4',
        4 => 'Category_2_3_2_5',
      ),
      'Category_2_3_3' => 
      array (
        0 => 'Category_2_3_3_1',
        1 => 'Category_2_3_3_2',
        2 => 'Category_2_3_3_3',
        3 => 'Category_2_3_3_4',
        4 => 'Category_2_3_3_5',
      ),
      'Category_2_3_4' => 
      array (
        0 => 'Category_2_3_4_1',
        1 => 'Category_2_3_4_2',
        2 => 'Category_2_3_4_3',
        3 => 'Category_2_3_4_4',
        4 => 'Category_2_3_4_5',
      ),
      'Category_2_3_5' => 
      array (
        0 => 'Category_2_3_5_1',
        1 => 'Category_2_3_5_2',
        2 => 'Category_2_3_5_3',
        3 => 'Category_2_3_5_4',
        4 => 'Category_2_3_5_5',
      ),
    ),
    'Category_2_4' => 
    array (
      'Category_2_4_1' => 
      array (
        0 => 'Category_2_4_1_1',
        1 => 'Category_2_4_1_2',
        2 => 'Category_2_4_1_3',
        3 => 'Category_2_4_1_4',
        4 => 'Category_2_4_1_5',
      ),
      'Category_2_4_2' => 
      array (
        0 => 'Category_2_4_2_1',
        1 => 'Category_2_4_2_2',
        2 => 'Category_2_4_2_3',
        3 => 'Category_2_4_2_4',
        4 => 'Category_2_4_2_5',
      ),
      'Category_2_4_3' => 
      array (
        0 => 'Category_2_4_3_1',
        1 => 'Category_2_4_3_2',
        2 => 'Category_2_4_3_3',
        3 => 'Category_2_4_3_4',
        4 => 'Category_2_4_3_5',
      ),
      'Category_2_4_4' => 
      array (
        0 => 'Category_2_4_4_1',
        1 => 'Category_2_4_4_2',
        2 => 'Category_2_4_4_3',
        3 => 'Category_2_4_4_4',
        4 => 'Category_2_4_4_5',
      ),
      'Category_2_4_5' => 
      array (
        0 => 'Category_2_4_5_1',
        1 => 'Category_2_4_5_2',
        2 => 'Category_2_4_5_3',
        3 => 'Category_2_4_5_4',
        4 => 'Category_2_4_5_5',
      ),
    ),
    'Category_2_5' => 
    array (
      'Category_2_5_1' => 
      array (
        0 => 'Category_2_5_1_1',
        1 => 'Category_2_5_1_2',
        2 => 'Category_2_5_1_3',
        3 => 'Category_2_5_1_4',
        4 => 'Category_2_5_1_5',
      ),
      'Category_2_5_2' => 
      array (
        0 => 'Category_2_5_2_1',
        1 => 'Category_2_5_2_2',
        2 => 'Category_2_5_2_3',
        3 => 'Category_2_5_2_4',
        4 => 'Category_2_5_2_5',
      ),
      'Category_2_5_3' => 
      array (
        0 => 'Category_2_5_3_1',
        1 => 'Category_2_5_3_2',
        2 => 'Category_2_5_3_3',
        3 => 'Category_2_5_3_4',
        4 => 'Category_2_5_3_5',
      ),
      'Category_2_5_4' => 
      array (
        0 => 'Category_2_5_4_1',
        1 => 'Category_2_5_4_2',
        2 => 'Category_2_5_4_3',
        3 => 'Category_2_5_4_4',
        4 => 'Category_2_5_4_5',
      ),
      'Category_2_5_5' => 
      array (
        0 => 'Category_2_5_5_1',
        1 => 'Category_2_5_5_2',
        2 => 'Category_2_5_5_3',
        3 => 'Category_2_5_5_4',
        4 => 'Category_2_5_5_5',
      ),
    ),
  ),
  'Category_3' => 
  array (
    'Category_3_1' => 
    array (
      'Category_3_1_1' => 
      array (
        0 => 'Category_3_1_1_1',
        1 => 'Category_3_1_1_2',
        2 => 'Category_3_1_1_3',
        3 => 'Category_3_1_1_4',
        4 => 'Category_3_1_1_5',
      ),
      'Category_3_1_2' => 
      array (
        0 => 'Category_3_1_2_1',
        1 => 'Category_3_1_2_2',
        2 => 'Category_3_1_2_3',
        3 => 'Category_3_1_2_4',
        4 => 'Category_3_1_2_5',
      ),
      'Category_3_1_3' => 
      array (
        0 => 'Category_3_1_3_1',
        1 => 'Category_3_1_3_2',
        2 => 'Category_3_1_3_3',
        3 => 'Category_3_1_3_4',
        4 => 'Category_3_1_3_5',
      ),
      'Category_3_1_4' => 
      array (
        0 => 'Category_3_1_4_1',
        1 => 'Category_3_1_4_2',
        2 => 'Category_3_1_4_3',
        3 => 'Category_3_1_4_4',
        4 => 'Category_3_1_4_5',
      ),
      'Category_3_1_5' => 
      array (
        0 => 'Category_3_1_5_1',
        1 => 'Category_3_1_5_2',
        2 => 'Category_3_1_5_3',
        3 => 'Category_3_1_5_4',
        4 => 'Category_3_1_5_5',
      ),
    ),
    'Category_3_2' => 
    array (
      'Category_3_2_1' => 
      array (
        0 => 'Category_3_2_1_1',
        1 => 'Category_3_2_1_2',
        2 => 'Category_3_2_1_3',
        3 => 'Category_3_2_1_4',
        4 => 'Category_3_2_1_5',
      ),
      'Category_3_2_2' => 
      array (
        0 => 'Category_3_2_2_1',
        1 => 'Category_3_2_2_2',
        2 => 'Category_3_2_2_3',
        3 => 'Category_3_2_2_4',
        4 => 'Category_3_2_2_5',
      ),
      'Category_3_2_3' => 
      array (
        0 => 'Category_3_2_3_1',
        1 => 'Category_3_2_3_2',
        2 => 'Category_3_2_3_3',
        3 => 'Category_3_2_3_4',
        4 => 'Category_3_2_3_5',
      ),
      'Category_3_2_4' => 
      array (
        0 => 'Category_3_2_4_1',
        1 => 'Category_3_2_4_2',
        2 => 'Category_3_2_4_3',
        3 => 'Category_3_2_4_4',
        4 => 'Category_3_2_4_5',
      ),
      'Category_3_2_5' => 
      array (
        0 => 'Category_3_2_5_1',
        1 => 'Category_3_2_5_2',
        2 => 'Category_3_2_5_3',
        3 => 'Category_3_2_5_4',
        4 => 'Category_3_2_5_5',
      ),
    ),
    'Category_3_3' => 
    array (
      'Category_3_3_1' => 
      array (
        0 => 'Category_3_3_1_1',
        1 => 'Category_3_3_1_2',
        2 => 'Category_3_3_1_3',
        3 => 'Category_3_3_1_4',
        4 => 'Category_3_3_1_5',
      ),
      'Category_3_3_2' => 
      array (
        0 => 'Category_3_3_2_1',
        1 => 'Category_3_3_2_2',
        2 => 'Category_3_3_2_3',
        3 => 'Category_3_3_2_4',
        4 => 'Category_3_3_2_5',
      ),
      'Category_3_3_3' => 
      array (
        0 => 'Category_3_3_3_1',
        1 => 'Category_3_3_3_2',
        2 => 'Category_3_3_3_3',
        3 => 'Category_3_3_3_4',
        4 => 'Category_3_3_3_5',
      ),
      'Category_3_3_4' => 
      array (
        0 => 'Category_3_3_4_1',
        1 => 'Category_3_3_4_2',
        2 => 'Category_3_3_4_3',
        3 => 'Category_3_3_4_4',
        4 => 'Category_3_3_4_5',
      ),
      'Category_3_3_5' => 
      array (
        0 => 'Category_3_3_5_1',
        1 => 'Category_3_3_5_2',
        2 => 'Category_3_3_5_3',
        3 => 'Category_3_3_5_4',
        4 => 'Category_3_3_5_5',
      ),
    ),
    'Category_3_4' => 
    array (
      'Category_3_4_1' => 
      array (
        0 => 'Category_3_4_1_1',
        1 => 'Category_3_4_1_2',
        2 => 'Category_3_4_1_3',
        3 => 'Category_3_4_1_4',
        4 => 'Category_3_4_1_5',
      ),
      'Category_3_4_2' => 
      array (
        0 => 'Category_3_4_2_1',
        1 => 'Category_3_4_2_2',
        2 => 'Category_3_4_2_3',
        3 => 'Category_3_4_2_4',
        4 => 'Category_3_4_2_5',
      ),
      'Category_3_4_3' => 
      array (
        0 => 'Category_3_4_3_1',
        1 => 'Category_3_4_3_2',
        2 => 'Category_3_4_3_3',
        3 => 'Category_3_4_3_4',
        4 => 'Category_3_4_3_5',
      ),
      'Category_3_4_4' => 
      array (
        0 => 'Category_3_4_4_1',
        1 => 'Category_3_4_4_2',
        2 => 'Category_3_4_4_3',
        3 => 'Category_3_4_4_4',
        4 => 'Category_3_4_4_5',
      ),
      'Category_3_4_5' => 
      array (
        0 => 'Category_3_4_5_1',
        1 => 'Category_3_4_5_2',
        2 => 'Category_3_4_5_3',
        3 => 'Category_3_4_5_4',
        4 => 'Category_3_4_5_5',
      ),
    ),
    'Category_3_5' => 
    array (
      'Category_3_5_1' => 
      array (
        0 => 'Category_3_5_1_1',
        1 => 'Category_3_5_1_2',
        2 => 'Category_3_5_1_3',
        3 => 'Category_3_5_1_4',
        4 => 'Category_3_5_1_5',
      ),
      'Category_3_5_2' => 
      array (
        0 => 'Category_3_5_2_1',
        1 => 'Category_3_5_2_2',
        2 => 'Category_3_5_2_3',
        3 => 'Category_3_5_2_4',
        4 => 'Category_3_5_2_5',
      ),
      'Category_3_5_3' => 
      array (
        0 => 'Category_3_5_3_1',
        1 => 'Category_3_5_3_2',
        2 => 'Category_3_5_3_3',
        3 => 'Category_3_5_3_4',
        4 => 'Category_3_5_3_5',
      ),
      'Category_3_5_4' => 
      array (
        0 => 'Category_3_5_4_1',
        1 => 'Category_3_5_4_2',
        2 => 'Category_3_5_4_3',
        3 => 'Category_3_5_4_4',
        4 => 'Category_3_5_4_5',
      ),
      'Category_3_5_5' => 
      array (
        0 => 'Category_3_5_5_1',
        1 => 'Category_3_5_5_2',
        2 => 'Category_3_5_5_3',
        3 => 'Category_3_5_5_4',
        4 => 'Category_3_5_5_5',
      ),
    ),
  ),
  'Category_4' => 
  array (
    'Category_4_1' => 
    array (
      'Category_4_1_1' => 
      array (
        0 => 'Category_4_1_1_1',
        1 => 'Category_4_1_1_2',
        2 => 'Category_4_1_1_3',
        3 => 'Category_4_1_1_4',
        4 => 'Category_4_1_1_5',
      ),
      'Category_4_1_2' => 
      array (
        0 => 'Category_4_1_2_1',
        1 => 'Category_4_1_2_2',
        2 => 'Category_4_1_2_3',
        3 => 'Category_4_1_2_4',
        4 => 'Category_4_1_2_5',
      ),
      'Category_4_1_3' => 
      array (
        0 => 'Category_4_1_3_1',
        1 => 'Category_4_1_3_2',
        2 => 'Category_4_1_3_3',
        3 => 'Category_4_1_3_4',
        4 => 'Category_4_1_3_5',
      ),
      'Category_4_1_4' => 
      array (
        0 => 'Category_4_1_4_1',
        1 => 'Category_4_1_4_2',
        2 => 'Category_4_1_4_3',
        3 => 'Category_4_1_4_4',
        4 => 'Category_4_1_4_5',
      ),
      'Category_4_1_5' => 
      array (
        0 => 'Category_4_1_5_1',
        1 => 'Category_4_1_5_2',
        2 => 'Category_4_1_5_3',
        3 => 'Category_4_1_5_4',
        4 => 'Category_4_1_5_5',
      ),
    ),
    'Category_4_2' => 
    array (
      'Category_4_2_1' => 
      array (
        0 => 'Category_4_2_1_1',
        1 => 'Category_4_2_1_2',
        2 => 'Category_4_2_1_3',
        3 => 'Category_4_2_1_4',
        4 => 'Category_4_2_1_5',
      ),
      'Category_4_2_2' => 
      array (
        0 => 'Category_4_2_2_1',
        1 => 'Category_4_2_2_2',
        2 => 'Category_4_2_2_3',
        3 => 'Category_4_2_2_4',
        4 => 'Category_4_2_2_5',
      ),
      'Category_4_2_3' => 
      array (
        0 => 'Category_4_2_3_1',
        1 => 'Category_4_2_3_2',
        2 => 'Category_4_2_3_3',
        3 => 'Category_4_2_3_4',
        4 => 'Category_4_2_3_5',
      ),
      'Category_4_2_4' => 
      array (
        0 => 'Category_4_2_4_1',
        1 => 'Category_4_2_4_2',
        2 => 'Category_4_2_4_3',
        3 => 'Category_4_2_4_4',
        4 => 'Category_4_2_4_5',
      ),
      'Category_4_2_5' => 
      array (
        0 => 'Category_4_2_5_1',
        1 => 'Category_4_2_5_2',
        2 => 'Category_4_2_5_3',
        3 => 'Category_4_2_5_4',
        4 => 'Category_4_2_5_5',
      ),
    ),
    'Category_4_3' => 
    array (
      'Category_4_3_1' => 
      array (
        0 => 'Category_4_3_1_1',
        1 => 'Category_4_3_1_2',
        2 => 'Category_4_3_1_3',
        3 => 'Category_4_3_1_4',
        4 => 'Category_4_3_1_5',
      ),
      'Category_4_3_2' => 
      array (
        0 => 'Category_4_3_2_1',
        1 => 'Category_4_3_2_2',
        2 => 'Category_4_3_2_3',
        3 => 'Category_4_3_2_4',
        4 => 'Category_4_3_2_5',
      ),
      'Category_4_3_3' => 
      array (
        0 => 'Category_4_3_3_1',
        1 => 'Category_4_3_3_2',
        2 => 'Category_4_3_3_3',
        3 => 'Category_4_3_3_4',
        4 => 'Category_4_3_3_5',
      ),
      'Category_4_3_4' => 
      array (
        0 => 'Category_4_3_4_1',
        1 => 'Category_4_3_4_2',
        2 => 'Category_4_3_4_3',
        3 => 'Category_4_3_4_4',
        4 => 'Category_4_3_4_5',
      ),
      'Category_4_3_5' => 
      array (
        0 => 'Category_4_3_5_1',
        1 => 'Category_4_3_5_2',
        2 => 'Category_4_3_5_3',
        3 => 'Category_4_3_5_4',
        4 => 'Category_4_3_5_5',
      ),
    ),
    'Category_4_4' => 
    array (
      'Category_4_4_1' => 
      array (
        0 => 'Category_4_4_1_1',
        1 => 'Category_4_4_1_2',
        2 => 'Category_4_4_1_3',
        3 => 'Category_4_4_1_4',
        4 => 'Category_4_4_1_5',
      ),
      'Category_4_4_2' => 
      array (
        0 => 'Category_4_4_2_1',
        1 => 'Category_4_4_2_2',
        2 => 'Category_4_4_2_3',
        3 => 'Category_4_4_2_4',
        4 => 'Category_4_4_2_5',
      ),
      'Category_4_4_3' => 
      array (
        0 => 'Category_4_4_3_1',
        1 => 'Category_4_4_3_2',
        2 => 'Category_4_4_3_3',
        3 => 'Category_4_4_3_4',
        4 => 'Category_4_4_3_5',
      ),
      'Category_4_4_4' => 
      array (
        0 => 'Category_4_4_4_1',
        1 => 'Category_4_4_4_2',
        2 => 'Category_4_4_4_3',
        3 => 'Category_4_4_4_4',
        4 => 'Category_4_4_4_5',
      ),
      'Category_4_4_5' => 
      array (
        0 => 'Category_4_4_5_1',
        1 => 'Category_4_4_5_2',
        2 => 'Category_4_4_5_3',
        3 => 'Category_4_4_5_4',
        4 => 'Category_4_4_5_5',
      ),
    ),
    'Category_4_5' => 
    array (
      'Category_4_5_1' => 
      array (
        0 => 'Category_4_5_1_1',
        1 => 'Category_4_5_1_2',
        2 => 'Category_4_5_1_3',
        3 => 'Category_4_5_1_4',
        4 => 'Category_4_5_1_5',
      ),
      'Category_4_5_2' => 
      array (
        0 => 'Category_4_5_2_1',
        1 => 'Category_4_5_2_2',
        2 => 'Category_4_5_2_3',
        3 => 'Category_4_5_2_4',
        4 => 'Category_4_5_2_5',
      ),
      'Category_4_5_3' => 
      array (
        0 => 'Category_4_5_3_1',
        1 => 'Category_4_5_3_2',
        2 => 'Category_4_5_3_3',
        3 => 'Category_4_5_3_4',
        4 => 'Category_4_5_3_5',
      ),
      'Category_4_5_4' => 
      array (
        0 => 'Category_4_5_4_1',
        1 => 'Category_4_5_4_2',
        2 => 'Category_4_5_4_3',
        3 => 'Category_4_5_4_4',
        4 => 'Category_4_5_4_5',
      ),
      'Category_4_5_5' => 
      array (
        0 => 'Category_4_5_5_1',
        1 => 'Category_4_5_5_2',
        2 => 'Category_4_5_5_3',
        3 => 'Category_4_5_5_4',
        4 => 'Category_4_5_5_5',
      ),
    ),
  ),
  'Category_5' => 
  array (
    'Category_5_1' => 
    array (
      'Category_5_1_1' => 
      array (
        0 => 'Category_5_1_1_1',
        1 => 'Category_5_1_1_2',
        2 => 'Category_5_1_1_3',
        3 => 'Category_5_1_1_4',
        4 => 'Category_5_1_1_5',
      ),
      'Category_5_1_2' => 
      array (
        0 => 'Category_5_1_2_1',
        1 => 'Category_5_1_2_2',
        2 => 'Category_5_1_2_3',
        3 => 'Category_5_1_2_4',
        4 => 'Category_5_1_2_5',
      ),
      'Category_5_1_3' => 
      array (
        0 => 'Category_5_1_3_1',
        1 => 'Category_5_1_3_2',
        2 => 'Category_5_1_3_3',
        3 => 'Category_5_1_3_4',
        4 => 'Category_5_1_3_5',
      ),
      'Category_5_1_4' => 
      array (
        0 => 'Category_5_1_4_1',
        1 => 'Category_5_1_4_2',
        2 => 'Category_5_1_4_3',
        3 => 'Category_5_1_4_4',
        4 => 'Category_5_1_4_5',
      ),
      'Category_5_1_5' => 
      array (
        0 => 'Category_5_1_5_1',
        1 => 'Category_5_1_5_2',
        2 => 'Category_5_1_5_3',
        3 => 'Category_5_1_5_4',
        4 => 'Category_5_1_5_5',
      ),
    ),
    'Category_5_2' => 
    array (
      'Category_5_2_1' => 
      array (
        0 => 'Category_5_2_1_1',
        1 => 'Category_5_2_1_2',
        2 => 'Category_5_2_1_3',
        3 => 'Category_5_2_1_4',
        4 => 'Category_5_2_1_5',
      ),
      'Category_5_2_2' => 
      array (
        0 => 'Category_5_2_2_1',
        1 => 'Category_5_2_2_2',
        2 => 'Category_5_2_2_3',
        3 => 'Category_5_2_2_4',
        4 => 'Category_5_2_2_5',
      ),
      'Category_5_2_3' => 
      array (
        0 => 'Category_5_2_3_1',
        1 => 'Category_5_2_3_2',
        2 => 'Category_5_2_3_3',
        3 => 'Category_5_2_3_4',
        4 => 'Category_5_2_3_5',
      ),
      'Category_5_2_4' => 
      array (
        0 => 'Category_5_2_4_1',
        1 => 'Category_5_2_4_2',
        2 => 'Category_5_2_4_3',
        3 => 'Category_5_2_4_4',
        4 => 'Category_5_2_4_5',
      ),
      'Category_5_2_5' => 
      array (
        0 => 'Category_5_2_5_1',
        1 => 'Category_5_2_5_2',
        2 => 'Category_5_2_5_3',
        3 => 'Category_5_2_5_4',
        4 => 'Category_5_2_5_5',
      ),
    ),
    'Category_5_3' => 
    array (
      'Category_5_3_1' => 
      array (
        0 => 'Category_5_3_1_1',
        1 => 'Category_5_3_1_2',
        2 => 'Category_5_3_1_3',
        3 => 'Category_5_3_1_4',
        4 => 'Category_5_3_1_5',
      ),
      'Category_5_3_2' => 
      array (
        0 => 'Category_5_3_2_1',
        1 => 'Category_5_3_2_2',
        2 => 'Category_5_3_2_3',
        3 => 'Category_5_3_2_4',
        4 => 'Category_5_3_2_5',
      ),
      'Category_5_3_3' => 
      array (
        0 => 'Category_5_3_3_1',
        1 => 'Category_5_3_3_2',
        2 => 'Category_5_3_3_3',
        3 => 'Category_5_3_3_4',
        4 => 'Category_5_3_3_5',
      ),
      'Category_5_3_4' => 
      array (
        0 => 'Category_5_3_4_1',
        1 => 'Category_5_3_4_2',
        2 => 'Category_5_3_4_3',
        3 => 'Category_5_3_4_4',
        4 => 'Category_5_3_4_5',
      ),
      'Category_5_3_5' => 
      array (
        0 => 'Category_5_3_5_1',
        1 => 'Category_5_3_5_2',
        2 => 'Category_5_3_5_3',
        3 => 'Category_5_3_5_4',
        4 => 'Category_5_3_5_5',
      ),
    ),
    'Category_5_4' => 
    array (
      'Category_5_4_1' => 
      array (
        0 => 'Category_5_4_1_1',
        1 => 'Category_5_4_1_2',
        2 => 'Category_5_4_1_3',
        3 => 'Category_5_4_1_4',
        4 => 'Category_5_4_1_5',
      ),
      'Category_5_4_2' => 
      array (
        0 => 'Category_5_4_2_1',
        1 => 'Category_5_4_2_2',
        2 => 'Category_5_4_2_3',
        3 => 'Category_5_4_2_4',
        4 => 'Category_5_4_2_5',
      ),
      'Category_5_4_3' => 
      array (
        0 => 'Category_5_4_3_1',
        1 => 'Category_5_4_3_2',
        2 => 'Category_5_4_3_3',
        3 => 'Category_5_4_3_4',
        4 => 'Category_5_4_3_5',
      ),
      'Category_5_4_4' => 
      array (
        0 => 'Category_5_4_4_1',
        1 => 'Category_5_4_4_2',
        2 => 'Category_5_4_4_3',
        3 => 'Category_5_4_4_4',
        4 => 'Category_5_4_4_5',
      ),
      'Category_5_4_5' => 
      array (
        0 => 'Category_5_4_5_1',
        1 => 'Category_5_4_5_2',
        2 => 'Category_5_4_5_3',
        3 => 'Category_5_4_5_4',
        4 => 'Category_5_4_5_5',
      ),
    ),
    'Category_5_5' => 
    array (
      'Category_5_5_1' => 
      array (
        0 => 'Category_5_5_1_1',
        1 => 'Category_5_5_1_2',
        2 => 'Category_5_5_1_3',
        3 => 'Category_5_5_1_4',
        4 => 'Category_5_5_1_5',
      ),
      'Category_5_5_2' => 
      array (
        0 => 'Category_5_5_2_1',
        1 => 'Category_5_5_2_2',
        2 => 'Category_5_5_2_3',
        3 => 'Category_5_5_2_4',
        4 => 'Category_5_5_2_5',
      ),
      'Category_5_5_3' => 
      array (
        0 => 'Category_5_5_3_1',
        1 => 'Category_5_5_3_2',
        2 => 'Category_5_5_3_3',
        3 => 'Category_5_5_3_4',
        4 => 'Category_5_5_3_5',
      ),
      'Category_5_5_4' => 
      array (
        0 => 'Category_5_5_4_1',
        1 => 'Category_5_5_4_2',
        2 => 'Category_5_5_4_3',
        3 => 'Category_5_5_4_4',
        4 => 'Category_5_5_4_5',
      ),
      'Category_5_5_5' => 
      array (
        0 => 'Category_5_5_5_1',
        1 => 'Category_5_5_5_2',
        2 => 'Category_5_5_5_3',
        3 => 'Category_5_5_5_4',
        4 => 'Category_5_5_5_5',
      ),
    ),
  ),
);


//print_tree($cats);
print_subtree_foreach($cats);


printf("TIME: %.5f\n", microtime(true) - $start); 
printf("MEMORY: %d\n", memory_get_usage() - $mem_start); 

?>
