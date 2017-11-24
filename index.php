<?php
	session_start();
	
	include "/model/zaport.php";
	
	if(isset($_POST['login']) && isset($_POST['senha'])){
		$login = $_POST['login'];
		$senha = $_POST['senha'];
		print "Login ".$login." e senha ".$senha."</br>";

		if(!empty($login) && !empty($senha)){
          
            $jsonLogin = json_decode(getAuth($login, $senha));
            
            if(property_exists($jsonLogin, "error")){
            	print "Longin ou senha incorretos!";
            }else{
            	print"Login aceito!";
                $login = $jsonLogin->result;
				$id = $jsonLogin->id;
                $_SESSION["LOGADO"] = TRUE;
                $_SESSION["USER"] = $login;
                $_SESSION["ID"] =$id;
                header("Location: /view/dashboard.php");
            }
            
    	}else{
        		print "erro";
        	 }
    }else{
    	print "Login ou senha não informados!";
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Zabbix Reports ver. 0.1.0</title>
        <!-- Bootstrap core CSS -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href="cover.css" rel="stylesheet">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <h1>Zabbix Reports</h1>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="login">
                    <form role="form" method="post" action="http://localhost/teste_html/index.php"> 
                        <div class="form-group"> 
                            <label class="control-label" for="exampleInputEmail1">Usuário</label>                             
                            <input type="text" class="form-control" id="login" name="login" placeholder="Informe o login"> 
                        </div>                         
                        <div class="form-group"> 
                            <label class="control-label" for="exampleInputPassword1">Senha
                                <br>
                            </label>                             
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Senha"> 
                        </div>                         
                        <button type="submit" class="btn btn-success btn-lg">Login</button>                         
                    </form>
                </div>
                <div class="cover-container">
                    <div class="mastfoot">
                        <div class="inner">
                            <p>Zabbix Reports ver. 0.1.0 - Powered by &nbsp;<a href="http://www.z3tasistemas.com">Z3ta Sistemas</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JavaScript
    ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="assets/js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
