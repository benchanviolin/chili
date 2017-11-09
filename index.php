<?php
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$maxNumber = 20; 
$blocks = array(
  array(
    'id'=>1,
    'title'=>'Best Taste',
    'background-color'=>'#00aa00'
  ),
  array(
    'id'=>2,
    'title'=>'Most Creative',
    'background-color'=>'#0000aa'
  ),
  array(
    'id'=>3,
    'title'=>'Best Spice Level',
    'background-color'=>'#aa0000'
  )
);
 ?>
<html>
<head>
  <title>Chili Cookoff</title>
  <style>
  .clearfix:after {
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
  }
  .clearfix { display: inline-block; }
  /* start commented backslash hack \*/
  * html .clearfix { height: 1%; }
  .clearfix { display: block; }

    html {
      width: 100%;
      height: 100%;
      text-align: center;
    }
    #header {
      height: 80px;
    }
    #footer {
      height: 80px;
    }
    .div-square {
      display: inline-block;
      width: calc(33.3% - 5px);
      height: calc(100% - 105px - 80px);
      overflow: hidden;
      padding: 0;
      margin: 0;      
      border: 1px solid black;
      vertical-align: top;
    }
    .div-square .header {
      height: 60px;
      line-height: 60px;     
      border-bottom: 1px solid black;
      vertical-align: middle;
      font-size: 1.5em;
      color: #fff;
    }
    .div-square .option {
      display: inline-block;
      width: 45%;
      padding: 5px 0 5px 0;
    }
    .button-option {
      width: calc(100% - 20px);
      height: <?=(120/$maxNumber)?>%;
      margin: 5px 10px 0px 10px;
    }
    .button-option-selected {
      border: 2px solid black;
      background-color: #ffff00;
    }
    .button-submit {
      height: 60px;
      width: calc(100%);
      margin: 15px 0 0 0;
      background-color: purple;
      color: #fff;
      font-size: 1.5em;
      display: none;    
    }
    @media only screen and (max-width: 768px) {
      .div-square {
        width: calc(100% - 5px);
        margin-bottom: 20px;
      }
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
  <h1 id="header">Select your favorite number for each category below:</h1>
  <?php foreach($blocks as $block) { ?>
  <div class="div-square">
    <div class="header" style="background-color: <?=$block['background-color']?>">
      <?=$block['title']?>
    </div>
    <?php for($i = 1; $i <= $maxNumber; $i++) { ?>
    <div class="option">
      <button class="button-option button-option-<?=$block['id']?>" data-block-id="<?=$block['id']?>"><?=$i?></button>
    </div>
    <?php } ?>
  </div>  
  <?php } ?>
  <div class="clearfix"></div>  
  <div id="footer">
    <button class="button-submit">
      SUBMIT
    </button>
  </div>
  
  <script>
    $( document ).ready(function() {      
      $('.button-option').click(function(){
        $('.button-option-'+$(this).attr('data-block-id')).removeClass('button-option-selected');
        $(this).addClass('button-option-selected');
                    
        if ($('.button-option-selected').length === 3) {
          $('.button-submit').show();
        } else {
          $('.button-submit').hide();
        }
      });
    });
  </script>
</body>
</html>

<?php
?>
