
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <style>
        /* Remove the navbar's default margin-bottom and rounded borders */
        .navbar {
            margin-bottom: 0;
            border-radius: 0;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {height: 450px}

        /* Set gray background color and 100% height */
        .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #555;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height:auto;}
        }
    </style>
</head>
<body>

	<?php

    include('httpful.phar');
   
    //$url = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$_POST['nme_earnings'];

	//$urlUser="http://localhost/gerenciadorfinanceiro/user/?nme_user=&last_nme_user=&email_user=&gender_user=&birthdate_user=&pass_user=";
  //   class URL
  //   {

		
			$urlEarnings = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=&value_earnings=&type_earnings=&date_earnings=";
			$urlDiscount = "http://localhost/gerenciadorfinanceiro/discount/?nme_discount=&value_discount=&type_discount=&date_discount=";

			$mandarUrl = new TransoformarURL;
			$earnings = $mandarUrl->transfomar($urlEarnings);
			$discount = $mandarUrl->transfomar($urlDiscount);
		

	//}
	class TransoformarURL
	{
		private $value;
		private $key;

		public function transfomar($url)
		{
			

			$response = \Httpful\Request::get($url)->send();

		    $contents = $response->body;
		    $contents = utf8_encode($contents);
		    $contents = substr($contents, 23, -1); //retira o connect da string e o ultimo caractere

			
		    $contentsArray = $this->replace($contents);
		    $request_response = $this->separarJson($contentsArray);

		    //$request_response = json_decode($contentsArray); //não funciona pq tem mais de uma string junta

			//echo "------- separação ------------";
		    //var_dump($request_response);
		} 

		public function replace($string)
		{
			$todasStrings = str_replace ("}," , "} ** " , $string); //substituir "}," por "} ** "
        	$arrayTodasStrings = explode("**", $todasStrings);

        	return $arrayTodasStrings;
		}

		 public function separarJson($array)
		{

			foreach ($array as $key => $value) 
			{
				$request_response = json_decode($value);
				//var_dump($request_response);
				foreach ($request_response as $key => $value) 
				{
					$this->set_key = $key;
					$this->set_value = $value;

					


				}

			}
		}
		public function get_key()
		{
			return $this->key;
		}
		private function set_key($variavel)
		{
			$this->key = $variavel;
		}

		public function get_value()
		{
			return $this->value;
		}
		private function set_value($variavel)
		{
			$this->value = $variavel;
		}
	}
	?>

		<script type="text/javascript">
			$.get("ajax.html"), function(data)
			{
				console.log(data);
			}
		</script>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://localhost/client/">Gerenciador Financeiro</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container-fluid text-center">
    <div class="row content">
        <div class="col-sm-2 sidenav">            
        </div>
        <div class="col-sm-8 text-left">
            <h1>Gerenciador Financeiro</h1>
            <p>Resultado da pesquisa:</p>
            <hr>
            <table class="table table-condensed">
                <tr>
                <th>Nome do Redimento</th>
                <th>Valor</th> 
                <th>Tipo</th>
                <th>Data</th>
                <th>Ação</th>
              </tr>
              <tr>
                <form action="earningsUp.php" method="post">
                <td> 
                	<?php 
                		$objeto = new TransoformarURL(); 
                		echo $objeto->get_key; ?> 
                </td>
                <td> <?php echo $value_earnings; ?> </td> 
                <td> <?php echo $type_earnings; ?> </td>
                <td> <?php echo $date_earnings; ?>  </td>
                <td>         
                    <input type="submit" value="Editar"/>
                </form>
                    
              </tr>
              <tr>
                <td> <?php echo $nme_earnings; ?> </td>
                <td> <?php echo $value_earnings; ?> </td> 
                <td> <?php echo $type_earnings; ?> </td>
                <td> <?php echo $date_earnings; ?>  </td>
              </tr>

            </table>
            
        </div>
        <div class="col-sm-2 sidenav">
        </div>
    </div>
</div>

</body>
</html>
    


   