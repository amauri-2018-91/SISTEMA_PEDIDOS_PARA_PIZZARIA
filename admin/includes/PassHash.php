
<?php



class PassHash {
  
// blowfish
private static $algo = "$2a";
  
// parâmetro de custo
private static $cost = '$12';


  
// criada, principalmente, para uso interno
public static function unique_salt()
{
return substr(sha1(mt_rand()), 0, 22);

//return substr(hash("sha256",mt_rand()), 0, 22); //TENTAT algo mais forte


}
  
  
  
  
// isso será usado para gerar o hash
public static function hash($codegerar)
{
return crypt($codegerar,self::$algo.self::$cost.'$'. self::unique_salt());
}
  
  
  
  
  
  
  
// essa será usada para comparar a senha em relação ao hash
public static function check_password( $paramcru, $hash)
{
$full_salt = substr($hash, 0, 29);
  
$new_hash = crypt($paramcru, $full_salt);
  
return ($hash === $new_hash);

}













}


?>







