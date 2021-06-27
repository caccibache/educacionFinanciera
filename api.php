<?php
if(isset($_GET['acc'])){
    if($_GET['acc']=='frm'){
        if(isset($_POST['nombre']) && isset($_POST['telefono']) && isset($_POST['email'])  && isset($_POST['mensaje'])){
            include("sys/email/mail.php");
            $nombre=$_POST['nombre'];
            $telefono=$_POST['telefono'];
            $email=$_POST['email'];
            $mensaje=$_POST['mensaje'];


            enviarPorSMPT($email,"Zendha Systems: Mensaje recibido","
            <h2>Hola $nombre,</h2>
            <p>Hemos recibido su mensaje desde nuestro portal https://systems.zendha.net.</p>
            <p>Le recordamos que también tenemos a su disposición otros canales de comunicación como teléfono, whatsapp, telegram y redes sociales. Podrás encontrar todos nuestros canales en <a href='https://systems.zendha.net/contacto'>https://systems.zendha.net/contacto</a>.</p>
            <p>Nos pondremos en contacto con usted lo antes posible</p>
            <p>Muchas gracias por su preferencia</p>            
            ");



            enviarPorSMPT("aritz@zendha.net","Systems: Nuevo mensaje desde la web","
            <h2>Hola equipo,</h2>
            <p>Se ha recibido un nuevo mensaje desde el sitio web de Zendha systems, Aquí los datos del mensaje:</p>
            <div style='border:1px solid #ccc;padding:10px;margin:10px;background-color:#FCFCFC'>
                <p><b>Nombre:</b> $nombre</p>
                <p><b>Hora y fecha:</b> ".date("d/m/Y H:i:s")."</p>
                <p><b>IP:</b> ".$_SERVER['REMOTE_ADDR']."</p>
                <p><b>Telefono:</b> $telefono</p>
                <p><b>Email:</b> $email</p>
                <p><b>Mensaje:</b> $mensaje</p>            
            </div>
            ");

            echo 'El mensaje se ha enviado correctamente';
        }
    }elseif($_GET['acc']=='boletin'){

    }
}

?>