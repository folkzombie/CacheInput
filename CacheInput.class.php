<?

class CacheInput {

	private $the_file;
	public $input;
	public $cache_timeout;
	
	public function __construct($the_file, $input='', $cache_timeout=0) {          
		$this->the_file = $the_file;
		$this->input = $input; 
		$this->cache_timelimit = $cache_timeout;
	}
	
	///////////READ THE CACHE FILE
	public function readCache() {
		$cacheFile = $this->the_file;
		$handle = fopen($cacheFile, "r");
		$contents = fread($handle, filesize($cacheFile));
		return $contents;
	}
	
	///////////GENERATE THE CACHE FILE
	public function generateCache() {
		if (!$handle = fopen($this->the_file, 'w')) { return FALSE; } //Cannot open file
		if (fwrite($handle, $this->input) === FALSE) { return FALSE; } //Cannot write to file
		fclose($handle);
		return TRUE;
	}
	
	///////////CHECK THE CACHE FILE
	public function checkCache() {
		$time_created = @filemtime($this->the_file);
		$diff = time() - $this->cache_timeout; // check and see if file is older than a half a hour
		if($time_created > $diff) {
			return FALSE; // use cache file
		} else {
			return TRUE; // generate new file
		}
	}
	
}

?>