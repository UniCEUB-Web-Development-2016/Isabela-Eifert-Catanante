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