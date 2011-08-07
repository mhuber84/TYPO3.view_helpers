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
 * Basic math calculations, result can be output or stored in a new variable
 * So far no nesting and parenthesis, no precedence of operators
 *
 * = Examples =
 *
 * <code title="simple multiplication">
 * <f:calculation expressionString="3*4" aliasToCreate="twelve" />
 * </code>
 *
 * Output:
 * 12 (output defaults to TRUE!)
 * Stores the result in a new template variable "twelve"
 * <f:calculation expressionString="{twelve}-1+3" />
 * which here can be used in the next calculation ( with multicalculation / but no precedence of operators)
 * any defined variables in the template can be used. float is supported with . decimal separator
 * - as prefix is also supported <f:calculation expressionString="12+-4" />
 *
 * @version $Id: 
 * @license http://www.gnu.org/licenses/lgpl.html GNU Lesser General Public License, version 3 or later
 * @scope prototype
 * @todo refine documentation
 */
class Tx_ViewHelpers_ViewHelpers_GetFirstViewHelper extends Tx_Fluid_Core_ViewHelper_AbstractViewHelper {
	
	/**
	 *
	 * @param Tx_Extbase_Persistence_ObjectStorage $storage
	 * @param string $property
	 * @param integer $identifier
	 * @return object
	 */
	public function render($storage, $property, $identifier) {
		$first = $GLOBALS['TSFE']->register['Tx_ViewHelpers_ViewHelpers_GetFirstViewHelper_'.$identifier];
		if(!$first){
			$storageArray = $storage->toArray();
			$first = call_user_func(array($storageArray[0], 'get'.ucfirst($property)));
			$GLOBALS['TSFE']->register['Tx_ViewHelpers_ViewHelpers_GetFirstViewHelper_'.$identifier] = $first;
		}
		return $first;
	}
}


?>
