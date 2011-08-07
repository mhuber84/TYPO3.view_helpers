<?php

/*                                                                        *
 * This script belongs to the FLOW3 package "Fluid".                      *
 *                                                                        *
 * It is free software; you can redistribute it and/or modify it under    *
 * the terms of the GNU Lesser General Public License as published by the *
 * Free Software Foundation, either version 3 of the License, or (at your *
 * option) any later version.                                             *
 *                                                                        *
 * This script is distributed in the hope that it will be useful, but     *
 * WITHOUT ANY WARRANTY; without even the implied warranty of MERCHAN-    *
 * TABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU Lesser       *
 * General Public License for more details.                               *
 *                                                                        *
 * You should have received a copy of the GNU Lesser General Public       *
 * License along with the script.                                         *
 * If not, see http://www.gnu.org/licenses/lgpl.html                      *
 *                                                                        *
 * The TYPO3 project - inspiring people to share!                         *
 *                                                                        */

/**
 * Put your Javascript to the <head>
 *
 * = Examples =
 *
 * <code>
 * <f:js>
 * var myJavascriptVar;
 * myJavascriptFunction();
 * </f:js>
 * </code>
 * <output>
 * <script type="text/javascript">
 * var myJavascriptVar;
 * myJavascriptFunction();
 * </script>
 * </output>
 *
 * <code>
 * <f:js path="path/to/my/javascript.js" />
 * </code>
 * <output>
 * <script type="text/javascript" src="path/to/my/javascript.js"></script>
 * </output>
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_ViewHelpers_ViewHelpers_JsViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 *
	 * @param string $path path to Javascript file
	 * @return string nothing
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function render($path='') {
		if($path){
			$GLOBALS['TSFE']->additionalHeaderData[md5($path)] .= '<script type="text/javascript" src="'.$path.'"></script>';
		} else {
			//I don't know why $GLOBALS['TSFE']->setJs() doesn't work here
			//$GLOBALS['TSFE']->setJs(md5($path), $this->renderChildren());
			$GLOBALS['TSFE']->additionalHeaderData[md5($path)] .= '<script type="text/javascript">'.$this->renderChildren().'</script>';
		}
		
		return '';
	}
}

?>
