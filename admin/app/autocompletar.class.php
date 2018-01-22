






<?php


 header("Content-Type: text/html; charset=utf-8", true);  //padrao brasil --acentua e ÇÇ


class Autocompletar
{

	private $dbh;



	public function __construct()
	{

          //IMPORTANTE---sempre ESPECF CHARSET msm definido la no BD
		  //$this->connection = new PDO('mysql:host='.DBHOST.';dbname='.DBNAME.';charset=utf8', DBUSER, DBPASS, self::$opt);//EXEMPLO
     
		$this->dbh = new PDO('mysql:host=;dbname=u;charset=utf8', "", "");
	}








    //AQUI Q VAI RETORNAR os __DADOS em ARRAY()__ENQUANTO  DIGITA______res ded resultado

	public function findData($search, $selecao)
	{
		//traz tal tal tal da tabela ONDE nome = search___ENQUANTO digita ainda

		if($selecao == 1){   //todos produ inteiro
		$query = $this->dbh->prepare("(SELECT id,nome,valor,prod FROM pizzas WHERE nome LIKE :search) UNION (SELECT id,nome,valor,prod FROM bebidas WHERE nome LIKE :search) UNION (SELECT id,nome,valor,prod FROM esfihoes WHERE nome LIKE :search) UNION (SELECT id,nome,valor,prod FROM porcoes WHERE nome LIKE :search)");
		
		}

		if($selecao == 2 || $selecao == 3 ){  //so pizzas ___pois so pizza e metade
			$query = $this->dbh->prepare("(SELECT id,nome,valor,prod FROM pizzas WHERE nome LIKE :search)");
		
		}
		
		
		
		

		
        $query->execute(array(':search' => '%'.$search.'%'));
        $this->dbh = null;
        
		
		if($query->rowCount() > 0)
        {
        	echo json_encode(array('res' => 'full', 'data' => $query->fetchAll()));  //ATENCAO___AQUI AINDA SAO OS DADOS ENQUANTO PESQUISA PUXA NOMES
        }
        else
        {
        	echo json_encode(array('res' => 'empty'));  //res VAZIO
        }
	}
	
	
}