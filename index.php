<?php
session_start();
include("config.php");
?>

<?php
  $Nome = $_SESSION['FULLNAME'];
  $primeiroNome = explode(" ", $Nome);
?>

<!doctype html>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
  <head>
    <title><?php echo $titulo; ?></title>
    <?php if (@$_GET['u'] != "") { ?>
      <?php if ($_SERVER['HTTP_REFERER'] == "https://www.facebook.com/") { ?>
      <meta http-equiv="refresh" content="0; url=<?php echo $url ?>/index.php">
      <?php } ?>
      <meta property="og:image" content="<?php echo $url; ?>/gerar/imagens/<?php echo base64_decode($_GET['u']); ?>.jpg"/>
      <?php } else { ?>
      <title><?php echo $url; ?></title>
      <meta property="og:image" content="<?php echo $url; ?>/img/splash.jpg"/>
    <?php } ?>
    <meta property="og:title" content="<?php echo $titulo; ?>">
    <meta property="og:description" content="<?php echo $descricao; ?>">
    <meta name="description" content="<?php echo $descricao; ?>">
    <meta property="og:type" content="website">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="800">
    <meta property="og:image:height" content="420">
    <meta charset="utf-8"/>
    <link rel="icon" type="image/png" href="img/favicon.png"/>
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/bootstrap-combined.min.css" rel="stylesheet"> 
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="gerar/html2canvas.js"></script>
 </head>
<body>

<?php if (@$_GET['u'] != "") { ?>
<!-- Modal -->
  <div class="modal fade" id="likePage" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Para continuar curta a Fanpage abaixo</h4>
        </div>
        <div class="modal-body">
          <div class="fb-page" data-href="https://www.facebook.com/<?php echo $fanpagelike; ?>" data-width="500" data-height="500" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/<?php echo $fanpagelike; ?>"><a href="https://www.facebook.com/<?php echo $fanpagelike; ?>"><?php echo $nomefanpage; ?></a></blockquote></div></div>
        </div>
          <button type="button" class="btn btn-primary btn-lg btn-block" data-dismiss="modal">Continuar</button>
      </div>
    </div>
  </div>
<?php } ?>



<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6&appId=1123548671034861";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<div class="conteudo">

<?php if ($_SESSION['FBID']): ?>

<?php
  $usuario = $_SESSION["FBID"];
  $content = file_get_contents("https://graph.facebook.com/".$usuario."/picture?type=large");
  $fp = fopen("copias/".$usuario.".jpg", "w");
  fwrite($fp, $content);
  fclose($fp);

if (@$_SESSION['GENDER'] == "male") { 

$frases = array(
  "cachorro01",
  "cachorro02",
  "cachorro03",
  "cachorro04",
  "detergente",
  "dinheiro",
  "dinheiro02",
  "dogao",
  "lanche",
  "iphone",
  "gravidez",
  "oculos04",
  "nokia",
  "nutella",
  "pc",
  "relogio03",
  "vassoura",
  "whey",
  "viagra",
  "porco",
  "cruze",
  "game01",
  "game02",
  "game03",
  "pizza",
  "crocs",
  "aguaesal",
  "meia"
);

} else {
  $frases = array(
  "bolsa01",
  "bolsa02",
  "bolsa03",
  "bolsa04",
  "bolsa05",
  "cachorro01",
  "cachorro02",
  "cachorro03",
  "cachorro04",
  "porco",
  "carro01",
  "carro02",
  "carro03",
  "detergente",
  "dinheiro",
  "dinheiro02",
  "dogao",
  "lanche",
  "iphone",
  "gravidez",
  "oculos01",
  "oculos02",
  "oculos03",
  "nokia",
  "nutella",
  "pc",
  "relogio01",
  "relogio02",
  "relogio03",
  "vassoura",
  "whey",
  "pizza",
  "crocs",
  "aguaesal",
);
}

srand ((float)microtime()*1000000);
shuffle ($frases);
?>

<?php if (@$_GET['u'] != "") { ?>

  <img src="<?php echo $url; ?>/gerar/imagens/<?php echo base64_decode($_GET['u']); ?>.jpg">
  <br><br>
  <div id="compartilhar">
  <a href="javascript: void(0);" style="color:#3b5999;" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php echo $url; ?>/index.php?u=<?php echo base64_encode($usuario) ?>&amp;titulo=Compartilhar','Compartilhar', 'toolbar=0, status=0, width=650, height=450');">
    <button class="fb-share-button btn btn-primary btn-lg btn-block continuar" data-href="<?php echo $url; ?>/index.php?u=<?php echo base64_encode($usuario) ?>" data-mobile-iframe="true"><i class="animated infinite flash fa fa-share-square-o" aria-hidden="true"></i> Compartilhe no seu Facebook </button>
  </a>
  </div>

<?php } else { ?>

<div id="canvas" class="card">
  <div class="titulo"><?php echo $primeiroNome[0]; ?> sorria!</b></div>
  <div class="presente"> <img src="img/<?php echo $frases[0]; ?>.png"> </div>
  <div class="fundo"> <img src="img/bg.png"> </div>
  <div class="foto"> <img src="copias/<?php echo $usuario; ?>.jpg"> </div>
</div>
<br>
<button id="capture" class="btn btn-primary btn-lg btn-block continuar"><i class="animated infinite flash fa fa-chevron-circle-right" aria-hidden="true"></i> Clique para Continuar </button>

<?php if (@$_GET['carregando'] == "s") { ?> <div class="loaderdiv loader"><img src="img/loader.gif"></div><?php } ?>
<?php } ?>

<?php else: ?>

<div id="splash"></div>
<a href="fbconfig.php">
  <br>
  <button id="capture" class="btn btn-primary btn-lg btn-block continuar"><i class="animated infinite flash fa fa-facebook-square" aria-hidden="true"></i> Acesse com seu Facebook</button>
</a>

<?php endif ?>

</div>

  <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78949162-1', 'auto');
  ga('send', 'pageview');

</script>

    <script type="text/javascript"> 
    $(window).load(function()
      {
      $('#likePage').modal('show');
    });

    $(function(){ 
      $('#capture').click(function(){
        $(".loaderdiv").toggle().fadeIn(1000);
        div_content = document.querySelector("#canvas")
        html2canvas(div_content).then(function(canvas) {
          data = canvas.toDataURL('image/jpeg');
          save_img(data);
        });
      });     
    });
    
    function save_img(data){
      $.post('gerar/save_jpg.php', {data: data, nome:'<?php echo $usuario; ?>'}, function(res){
        window.location = "<?php echo $url; ?>/index.php?u=<?php echo base64_encode($usuario) ?>";  
      });
    }
    </script>

  </body>
</html>