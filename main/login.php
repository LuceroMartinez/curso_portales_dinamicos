<? php
  // Variable de sesion
  error_reporting(0);
  session_start();
  include 'conecta.php';
  // Recuperar datos de el login
  $ usuario = $ conecta->real_escape_string($ _POST['usuario']);
  $ password = $ conecta->real_escape_string(md5($ _POST['password']));
  // Consulta para extraer los datos de la base de datos
  $ consulta = "SELECT * FROM Alumnos WHERE Usuario = '$usuario' and Password = '$password'";
  if ($ resultado = $ conecta->query($ consulta)) {
    while ($ row = $ resultado->fetch_array()) {
        $ userok = $ row['Usuario'];
        $ passwordok = $ row['Password'];
    }
    $ resultado->close();
  }
  $ conecta->close();
  if (isset($ usuario) && isset($ password)) {
     if ($ usuario == $ userok && $ password == $ passwordok) {
         $ _SESSION['login']= TRUE;
         $ _SESSION['Usuario']= $ usuario;
         header("location:../principal.php");
     }
      else {
          header("location:../Aplicacion1.php");
      }
    }     else{
       header("location:../Aplicacion1.php");
  }
 ?>