<?php
class System{
    public function database() 
    {
      global $config;
      $conn = mysqli_connect($config['SERVER'],$config['USERNAME'],$config['PASSWORD'],$config['DATABASE']) or die("Không Thể Kết Nối Database");
      mysqli_set_charset($conn,"utf8");
      return $conn;
    }
    public function setting($option=null)
    {
      global $Core;
      $setting =  $Core->sql_fetch_array("SELECT * FROM `setting` WHERE `id` = '1' LIMIT 1");
      return $setting[$option];
    }
    public function debug($a = NULL){
     return sprintf('%0.2f', (!function_exists('memory_get_usage')) ? '0' : round(memory_get_usage()/1024/1024, 2));
    }
    public function timeUp($a = NULL){
		if($a){
			$to = time();
			$diff = (int)abs($to - $a);
			if($diff <= 60){
				$since = sprintf('Vừa Xong');
			}
			else if($diff <= 3600){
				$mins = round($diff / 60);
				$since = sprintf('%s Phút Trước', $mins);
			}
			else if(($diff <= 86400)&&($diff > 3600)){
				$hours = round($diff/3600);
				if($hours <= 1){
					$hours = 1;
				}
				$since = sprintf('%s Giờ Trước', $hours);
			}
			else if($diff >= 86400){
				$days = round($diff / 86400);
				if($days <= 1){
					$days = 1;
				}
				$since = sprintf('%s Ngày Trước', $days);
			}
			return $since;
		}
   }
   public function version(){
       return phpversion();
   }
}
class Core{
    public function sql_query($option=null)
    {
       global $database;
       return mysqli_query($database,$option);
    }
    public function sql_num_row($option=null)
    {
       return mysqli_num_rows($this->sql_query($option));
    }
    public function sql_fetch_assoc($option=null)
    {
       return mysqli_fetch_assoc($this->sql_query($option));
    }
    public function sql_fetch_array($option=null)
    {
       return mysqli_fetch_array($this->sql_query($option));
    }
    public function sql_result($option=null)
    {
       return mysqli_result($this->sql_query($option));
    }
    public function href($url=null,$time=0)
    {
        return '<meta http-equiv="refresh" content="'.$time.';url='.$url.'">';
    }
    public function getEmail($email){
		$valid = preg_match('/[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})/i', $email, $m);
		if (array_key_exists("0",$m)){
			return($m[0]);
		}else{
			return false;
		}
    }
    public function randToken($length,$text="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789")
    {
		return substr(str_shuffle(str_repeat($x=$text, ceil($length/strlen($x)) )),1,$length);
	}  
    public function getURL()
    {
        if (isset($_SERVER["HTTPS"]) && $_SERVER["HTTPS"] == "on") {
            $pageURL = "https://";
        } else {
          $pageURL = 'http://';
        }
    
              $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
       
        return $pageURL;
    }
    public function getIP()
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
           $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}
class Curl{
    var $ch;
    public function url(){
      $head[] = 'Sec-Fetch-Site: same-origin';
      $head[] = 'Sec-Fetch-Mode: cors';
      $head[] = 'Sec-Fetch-Dest: empty'; 
      $this->ch = curl_init();
      curl_setopt($this->ch, CURLOPT_HTTPHEADER, $head);
      curl_setopt($this->ch, CURLOPT_HEADER, true);
      curl_setopt($this->ch, CURLOPT_SSL_VERIFYHOST, false);
      curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($this->ch, CURLOPT_ENCODING , 'gzip, deflate');
      curl_setopt($this->ch, CURLOPT_FAILONERROR, true);
      curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, true);
      curl_setopt($this->ch, CURLOPT_NOBODY, true);
      curl_setopt($this->ch, CURLOPT_VERBOSE, false);
      curl_setopt($this->ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    }
    public function log_cookie($file){
      curl_setopt($this->ch, CURLOPT_COOKIEJAR, $file);
      curl_setopt($this->ch, CURLOPT_COOKIEFILE, $file);
    }
    public function set_cookie($cookie){    
      curl_setopt($this->ch, CURLOPT_COOKIE, $cookie);
    }
    public function get($url){
      curl_setopt($this->ch, CURLOPT_URL,$url);
      curl_setopt($this->ch, CURLOPT_HTTPGET,true);
      curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($this->ch, CURLOPT_TIMEOUT, 60);
      $result_get = curl_exec($this->ch);
      return $result_get;
    }
    public function post($url,$post_data){
      curl_setopt($this->ch, CURLOPT_URL,$url);
      curl_setopt($this->ch, CURLOPT_RETURNTRANSFER,true);
      curl_setopt($this->ch, CURLOPT_POST, count($post_data));
      curl_setopt($this->ch, CURLOPT_POSTFIELDS, $post_data);
      curl_setopt($this->ch, CURLOPT_TIMEOUT, 60);
      $result_post = curl_exec($this->ch);
      return $result_post;
    }
    public function curl_info(){
      $info = curl_getinfo($this->ch);
      return var_dump($info);
    }
    public function close_curl(){
      curl_close($this->ch);
    }
  }  
?>