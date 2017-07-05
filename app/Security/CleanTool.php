<?php
// app/Security/CleanTools.php
namespace Security;

class CleanTool
{
	/**
	 * cleanPost
	 * @param array $_POST
	 * @return array $post
	 */

	public function cleanPost($post)
	{
		$post = array_map('trim', $post);
		$post = array_map('strip_tags', $post);
		return $post;
	}

	public function isAjax()
	{
		if(isset($_SERVER['HTTP_X_REQUESTED_WITH']) && !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest')
        {
        	return true;
        }
        return false;
	}
}
