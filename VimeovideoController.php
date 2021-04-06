<?php
namespace Brightside\Vimeovideo\Controller;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Tanel Põld <tanel@brightside.ee>, t3brightside.com
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/


class VimeovideoController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * @var \TYPO3\CMS\Frontend\ContentObject\ContentObjectRenderer
	 */
	protected $contentObj;

	public function initializeAction() {
    }
	/**
     * @return string The rendered view
     */
	public function indexAction() {
		$this->contentObj = $this->configurationManager->getContentObject();
   		
   		$data = $this->contentObj->data;
   		$vimeo_url = $data['tx_vimeovideo_url'];

		if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo_url, $output_array)) {
			$vimeo_id = $output_array[5];
		}

   		$caption = $data['tx_vimeovideo_caption'];
   		$autoplay = $data['tx_vimeovideo_autoplay'];
   		$loop = $data['tx_vimeovideo_loop'];
   		$title = $data['tx_vimeovideo_title'];

   		$ratio = $data['tx_vimeovideo_ratio'];

    	$uid = $data['uid'];
    	
    	$this->view->assign('code', $vimeo_id);
    	$this->view->assign('caption', $caption);
    	$this->view->assign('autoplay', $autoplay);
    	$this->view->assign('loop', $loop);
    	$this->view->assign('title', $title);
    	$this->view->assign('ratio', $ratio);

    	$this->view->assign('uid', $uid);
    	$this->view->assign('data', $data);
    }
}
?>