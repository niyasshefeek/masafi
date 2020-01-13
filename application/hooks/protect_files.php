<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Ionize
 *
 * @package		Ionize
 * @author		Ionize Dev Team
 * @license		http://doc.ionizecms.com/en/basic-infos/license-agreement
 * @link		http://ionizecms.com
 * @since		Version 1.0.4
 */

// ------------------------------------------------------------------------

/**
 * Hook ProtectFiles (post_controller_constructor - hook)
 *
 * Hook for protecting files in a folder to be served only to users logged
 * in and with a specific role.
 *
 * Install instructions:
 *
 * 1. put this file with the following file name in the following ionize
 * folder: /application/hooks/protect_files.php
 *
 * 2. Add the following code to the file /application/config/hooks.php
 *
 * $hook['post_controller_constructor'][] = array(
 * 	 'class'    => 'ProtectFiles',
 * 	 'function' => 'ProtectFiles',
 * 	 'filename' => 'protect_files.php',
 * 	 'filepath' => 'hooks'
 * );
 *
 * 3. Add a .htaccess file to the folders where you want to protect your
 * files to redirect the access to the index.php script
 *
 * Example for the .htaccess file:
 *
 * # redirect all access to /index.php
 * RewriteEngine On
 * RewriteRule ^(.*)$ /index.php?/$1 [L]
 *
 * 4. In the script below edit the array $allowed_roles to include the  
 * role_code of the groups which should be allowed to access the files
 *
 *
 * Written by Tensai (tensai@gmx.net)
 *
 *
 * Todo:
 * 
 * Make it more usable and flexible maybe with a backend module
 * Feel free to do so... ;-)
 *
 */

class ProtectFiles {
    
	// array for the allowed roles
	private $allowed_roles = array (
		'super-admin',
		'family'
		);
	
    public function ProtectFiles() {

		// generate the full server path for the requested uri by including the document root
		$file=$_SERVER['DOCUMENT_ROOT'].$_SERVER['REQUEST_URI'];
		
		// check if the requested uri is a file and exits - if not we have nothing to do
		if (is_file($file) AND file_exists($file)) {
			
			
			// check if the file is requested by a user currently logged in
			if (User()->logged_in()) {
				
				$user_role = User()->get_role();
				
				//check if the logged in user has correct role
				if (in_array($user_role['role_code'],$this->allowed_roles)) {
				
					// if everything is OK send the file to the browser and exit;
					$this->sendFile($file); 
					exit();
					
				}
			}
			
			else {

				// if not send a HTTP 403 Unauthorized header and exit
				header("HTTP/1.1 403 Unauthorized" );
				exit();
				
			}
			
		}
	}

	function sendFile($file) {

		// read the file
		$data = file_get_contents($file);
		
		// get the mime type to have appropriate header
		$mime = get_mime_by_extension($file);
		
		// get the last modified date/time in correct format -> used for doConditionalGet()
		$lastModifiedString	= gmdate('D, d M Y H:i:s', filemtime($file)) . ' GMT';
		
		// get the etag (md5 hash) of the file  -> used for doConditionalGet()
		$etag = md5($data);

		// check if file has already been served without modification
		$this->doConditionalGet($etag, $lastModifiedString);

		// if not send headers
		header("Accept-Ranges: bytes");
		header("Content-type: $mime");
		header('Content-Length: ' . strlen($data));
		header('Content-Disposition: inline;filename="'.basename($file).'"');

		// send the file to the browser
		echo $data;

	}

	function doConditionalGet($etag, $lastModified) {
	
		// send last-modified and etag header
		header("Last-Modified: $lastModified");
		header("ETag: \"{$etag}\"");
		
		// See if the client has provided the required headers
		$if_none_match = isset($_SERVER['HTTP_IF_NONE_MATCH']) ?
			stripslashes($_SERVER['HTTP_IF_NONE_MATCH']) : 
			false;
		
		$if_modified_since = isset($_SERVER['HTTP_IF_MODIFIED_SINCE']) ?
			stripslashes($_SERVER['HTTP_IF_MODIFIED_SINCE']) :
			false;
		
		// no headers are present - return
		if (!$if_modified_since && !$if_none_match)
			return;
		
		//at least one header is present so check them
		if ($if_none_match && $if_none_match != $etag && $if_none_match != '"' . $etag . '"')
			return; // etag is there but doesn't match
		
		if ($if_modified_since && $if_modified_since != $lastModified)
			return; // if-modified-since is there but doesn't match
		
		// Nothing has changed since last request - serve a 304 and exit
		header('HTTP/1.1 304 Not Modified');
		exit();
		
	}

}