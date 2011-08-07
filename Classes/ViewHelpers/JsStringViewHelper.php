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
 * Usefull in Javascript.
 * 
 * Removes linebreaks and escapes ' (or ").
 * By default ' is replaced by \', but you can set the argument 
 * quote to say that all " should be replaced by \".
 *
 * = Examples =
 *
 * <code>
 * <script type="text/javascript">
 * var myString = '<f:jsString>this is a string<br />
 * perhaps it has a linebreak<br />
 * or it has a ' and would break the Javascript!</f:jsString>';
 * </script>
 * </code>
 * <output>
 * <script type="text/javascript">
 * var myString = 'this is a string<br />perhaps it has a linebreak<br />or it has a \' and would break the Javascript!';
 * </script>
 * </output>
 *
 * <code>
 * <script type="text/javascript">
 * var myString = "<f:jsString quote='\"'>this is a string and the " should be escaped</f:jsString>";
 * </script>
 * </code>
 * <output>
 * <script type="text/javascript">
 * var myString = "this is a string and the \" should be escaped";
 * </script>
 * </output>
 *
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 */
class Tx_ViewHelpers_ViewHelpers_JsStringViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {

	/**
	 * Inspired by Bastian Waidlich's nl2br-viewhelper
	 * 
	 * @param string $quote ' (default) or "
	 * @return string without newlines and escaped $quote
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function render($quote='\'') {		
		return str_replace($quote, '\\'.$quote, str_replace(array("\r\n", "\n", "\r"), '', $this->renderChildren()));
	}
}

?>