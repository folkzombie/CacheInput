Cache data... 

Disclaimer: only tested with ".txt" and ".json" files.

USAGE just an example
------------------------------------------

//INCLUDE CLASS

include(/PATH/TO/CacheInput.class.php');

//SET YOUR FILE NAME //Example: $_SERVER["DOCUMENT_ROOT"] . '/cache/data.json'

$cache = new CacheInput(/PATH/TO/YOUR/CACHE_DIRECTORY/FILE); 

//SET YOUR TIME LIMIT (how long we'll be saving the data)

$cache->cache_timeout = TIMELIMIT; //Example: 3600

//GET THE STATUS OF THE CACHED FILE (if TRUE we need to cache the data, if FALSE we need to read the cached file)

$cacheStatus = $cache->checkCache();

if($cacheStatus === TRUE) {
	
	$data = //get the data we need to cache
	
	$cache->input = $data; //set the data
	
	$cache->generateCache();
	
} else {

	$data = $cache->readCache(); //read the cache file
	
}