<?php
namespace Brightside\Vimeovideo\Hooks\PageLayoutView;

use \TYPO3\CMS\Backend\View\PageLayoutViewDrawItemHookInterface;
use \TYPO3\CMS\Backend\View\PageLayoutView;
	
class NewContentElementPreviewRenderer implements PageLayoutViewDrawItemHookInterface {
	 /**
     * Preprocesses the preview rendering of a content element of type "textmedia"
     *
     * @param \TYPO3\CMS\Backend\View\PageLayoutView $parentObject Calling parent object
     * @param bool $drawItem Whether to draw the item using the default functionality
     * @param string $headerContent Header content
     * @param string $itemContent Item content
     * @param array $row Record row of tt_content
     *
     * @return void
     */

	 public function preProcess(PageLayoutView &$parentObject, &$drawItem, &$headerContent, &$itemContent, array &$row) {
		if ($row['CType'] === 'vimeovideo_pi1') {

			$vimeo_url = $parentObject->renderText($row['tx_vimeovideo_url']);			
			if(preg_match("/(https?:\/\/)?(www\.)?(player\.)?vimeo\.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/", $vimeo_url, $output_array)) {
				$vimeo_id = $output_array[5];
			}

			$itemContent .= '<div class="vimeovideo">';
			$itemContent .= '<iframe class="vimeoIframe" src="https://player.vimeo.com/video/';
			$itemContent .= $vimeo_id;
			$itemContent .= '?byline=0&amp;portrait=0&amp;badge=0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
			<div class="breaker"></div>';

			if ($row['tx_vimeovideo_caption']) {
            	$itemContent .= '<p class="title"><b>' . $parentObject->linkEditContent($parentObject->renderText($row['tx_vimeovideo_caption']), $row) . '</b></p>';
			}
			if (!$row['tx_vimeovideo_caption']) {
				$itemContent .= '<br />';
			}
			if (($row['tx_vimeovideo_autoplay'] > 0) or ($row['tx_vimeovideo_loop'] > 0) or ($row['tx_vimeovideo_title'] > 0)) {
				$itemContent .= '<ul class="options">';
			}
			if ($row['tx_vimeovideo_autoplay'] > 0){
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText($row[''].'autoplay'), $row).'</li>';
			}
			if ($row['tx_vimeovideo_loop'] > 0){
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText($row[''].'loop'), $row).'</li>';
			}
			if ($row['tx_vimeovideo_title'] > 0){
				$itemContent .= '<li>' . $parentObject->linkEditContent($parentObject->renderText($row[''].'inline title'), $row).'</li>';
			}
			if (($row['tx_vimeovideo_autoplay'] > 0) or ($row['tx_vimeovideo_loop'] > 0) or ($row['tx_vimeovideo_title'] > 0)) {
				$itemContent .= '</ul><br />';
			}
			$itemContent .= '</div>';
			$drawItem = FALSE;
		}
	}
}