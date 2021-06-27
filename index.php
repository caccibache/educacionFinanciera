<?php
include("sys/bd.php");
$pag='home';
$isArticulo=false;
if(isset($_GET['link'])){
    if(strpos($_GET['link'],"..")!=-1){
        if(file_exists(("paginas/".$_GET['link'].".php"))){
         
            $pag=$_GET['link'];           
        }elseif(is_dir('paginas/'.$_GET['link'])){
            
            if(isset($_GET['pag'])){
                if(strpos($_GET['pag'],"..")!=-1){                    
                    if(file_exists(("paginas/".$_GET['link']."/".$_GET['pag'].".php"))){
                        $pag="".$_GET['link']."/".$_GET['pag']."";
                    }else{
                        
                    }
                }
            }
        }else{
            
        }
        
    }
}
$selc=array("","","","","","","","","","","","");
if($pag=='home'){
    $selc[0]="selected";
}else if($pag=='nosotros'){
    $selc[1]="selected";
}else if($pag=='servicios'){
    $selc[2]="selected";
}else if($pag=='blog'){
    $selc[3]="selected";
}else if($pag=='contacto'){
    $selc[4]="selected";
}else{
    $selc[10]="selected";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Innosocial :: <?php
    if($pag=="home"){
        echo "Inicio";
    }else{
        echo ucwords($pag); 
    }
    ?></title>
    <link href='/css/_ui/main.css' rel='stylesheet' />
    <link href='/css/general.css' rel='stylesheet' />
    <link href='/css/zendha.css' rel='stylesheet' />
    <link href='/css/menu.css' rel='stylesheet' />
    <link href='/css/blog.css' rel='stylesheet' />
    <link href='/css/footer.css' rel='stylesheet' />
    <link rel="icon" type="image/png" href="/assets/favicon.png">
    <link href='/css/paginas/<?php echo $pag; ?>.css' rel='stylesheet' />
</head>
<body id='pag_<?php echo $pag;?>' onscroll="menuControl()" class='system_ui'>
    <a href='https://wa.me/525534693936' target='_blank'><div class='whatsapp'></div></a>
    <div id='avisoCookies'>
        <div id='bannerCookies' class='fnd_oscuro'>
            <div class='row vcentr'>
                <div class='s12 m10 l10 x10 r10'>
                    <h2>Aviso de cookies</h2>
                    <p>Utilizamos cookies propias y de terceros para mejorar nuestros servicios. Si continua con la navegación consideramos que acepta las diferentes políticas y términos de este sitio web. Puede consultar las <a href='?link=legal&pag=cookies'>Políticas de cookies</a>, <a href='?link=legal&pag=tos'>Términos de uso</a> y <a href='?link=legal&pag=privacidad'>Política de privacidad</a> haciendo click en cada enlace.
                </div>
                <div class='s12 m2 l2 x2 r2'>
                    <div class='boton secundario derecho btn-chico' onclick='aceptarCookies()'>Aceptar</div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("componentes/menu.php"); 
    
    include("paginas/$pag.php");

    include("componentes/footer.php");
   ?>

</body>
</html>