<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    
   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   
    <script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Work',     12 ],
          ['Eat',     22 ],
          ['Commute',  2],
          ['Watch TV', 2],
          ['Sleep',    7]
        ]);

        var options = {
          title: '',
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

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
        include ('../control/grafico.php');

        include ('../control/httpful.phar');
   
    //$url = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=".$_POST['nme_earnings'];

    //$urlUser="http://localhost/gerenciadorfinanceiro/user/?nme_user=&last_nme_user=&email_user=&gender_user=&birthdate_user=&pass_user=";
  //   class URL
  //   {

        
            $urlEarnings = "http://localhost/gerenciadorfinanceiro/earnings/?nme_earnings=&value_earnings=&type_earnings=&date_earnings=";
            $urlDiscount = "http://localhost/gerenciadorfinanceiro/discount/?nme_discount=&value_discount=&type_discount=&date_discount=";

            $mandarUrl = new Transformar;
            $earnings = $mandarUrl->transfomar($urlEarnings);
            $discount = $mandarUrl->transfomar($urlDiscount);
        

    //}
    class Transformar
    {
        private $totalEarnings = 0;
        private $totalDiscount = 0;

        public function transfomar($url)
        {
            

            $response = \Httpful\Request::get($url)->send();

            $contents = $response->body;
            $contents = utf8_encode($contents);
            $contents = substr($contents, 23, -1); //retira o connect da string e o ultimo caractere

            
            $contentsArray = $this->replace($contents);
            $request_response = $this->separarJson($contentsArray);

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
                

                    if ($key == 'value_earnings') 
                    {
                        $this->set_totalEarnings($value);
                    }

                    if($key == 'value_discount')
                    {
                        $this->set_totalDiscount($value);
                    }

                }
                
            }
        }

        public function set_totalEarnings($valor)
        { 
            $this->totalEarnings += $valor;
        }
        public function get_totalEarnings()
        {
            return $this->totalEarnings;
        }

        public function set_totalDiscount($valor)
        { 
            $this->totalDiscount += $valor;
        }
        public function get_totalDiscount()
        {
            return $this->totalDiscount;
            
        }

    }


    ?>

    <script type="text/javascript">

    </script>

<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Logo</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Home</a></li>
                <li><a href="about.html">Sobre nós</a></li>
                <li><a href="contact.html">Contato</a></li>
                <li><a href="faq.html">FAQ</a></li>
                <li><a href="pesquisa.html">Pesquisa</a></li>
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
            <p><a href="earnings.html">Inserir Renda</a></p>
            <p><a href="discount.html">Inserir Despesa</a></p>
            <p><a href="planning.html">Realizar Planejamento</a></p>
        </div>
        <div class="col-sm-8 text-left">
            <h1>Gerenciador Financeiro</h1>
            <p>Descrever o Sistema</p>
            <hr>
            <div>
                <form action="../control/Relatorio" method="post">
                    <input type="sumit" value="Relatório Rendimento">
                </form>
            </div>
            <hr>
            <h3>Gráficos</h3>
            <div id="donutchart" style="width: 900px; height: 500px;"></div>
            

        </div>
        <div class="col-sm-2 sidenav">
            <div class="well">
                <p>ADS</p>
            </div>
            <div class="well">
                <p>ADS</p>
            </div>
        </div>
    </div>
</div>

<footer class="container-fluid text-center">
    <p>Footer Text</p>
</footer>

</body>
</html>