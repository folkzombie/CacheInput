Cache data... 

Disclaimer: only tested with ".txt" and ".json" files.

USAGE just an example
------------------------------------------

//INCLUDE CLASS
include(/PATH/TO/CacheInput.class.php');

$cache = new CacheInput(/PATH/TO/YOUR/CACHE_DIRECTORY/FILE); //Example: $_SERVER["DOCUMENT_ROOT"] . '/cache/data.json'

$cache->cache_timeout = TIMELIMIT; //Example: 3600

$cacheStatus = $cache->checkCache();

if($cacheStatus === true) {
	
	$data = //get the data we need to cache
	
	$cacheSearch->input = $data;
	
	$cacheSearch->generateCache();
	
} else {

	$data = $cache->readCache(); //read the cache file
	
}