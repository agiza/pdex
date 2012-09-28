<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 *  *
 * Alchemy SDK handler
 *
 */

class Sentiment
{
	/**
	 * @access private
	 * @var    CodeIgniter
	 */
	private $CI = NULL;
	
	/**
	* @access private
	* @var    alchemyObj
	*/
	private $alchemyObj = NULL;
	
	/**
	 * @access public
	 * @param  void
	 * @return void
	 */
	public function __construct() {
		$this->CI = &get_instance();
		// Load the AlchemyAPI module code.
		include "alchemy/AlchemyAPI.php";
				
		// Create an AlchemyAPI object.
		$this->alchemyObj = new AlchemyAPI();
        $cwd = getcwd();
		// Load the API key from disk.
		$this->alchemyObj->loadAPIKey($cwd . "/application/config/ak.txt");
	}
	
	public function getSentiment($sentence,$target) {

	    // Enable Targeted Sentiment
	    $targetedSentimentParams = new AlchemyAPI_TargetedSentimentParams();
	    $targetedSentimentParams->setShowSourceText(1);
	    
	    $result = $this->alchemyObj->TextGetTargetedSentiment($sentence, $target, "json", $targetedSentimentParams);
	    return $result;

	}
    
}
