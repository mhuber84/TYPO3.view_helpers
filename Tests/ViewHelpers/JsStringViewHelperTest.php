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
 * @version $Id:$
 */
class JsStringViewHelperTest extends Tx_Extbase_Tests_Unit_BaseTestCase {

	/**
	 * Inspired by Bastian Waidlich's test for the nl2br-viewhelper
	 * 
	 * @test
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function viewHelperDoesNotModifyTextWithoutLineBreaks() {
		$viewHelper = $this->getMock('Tx_ViewHelpers_ViewHelpers_JsStringViewHelper', array('renderChildren'));
		$viewHelper->expects($this->once())->method('renderChildren')->will($this->returnValue('Some Text without line breaks'));
		$actualResult = $viewHelper->render();
		$this->assertEquals('Some Text without line breaks', $actualResult);
	}

	/**
	 * Inspired by Bastian Waidlich's test for the nl2br-viewhelper
	 * 
	 * @test
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function viewHelperRemovesLineBreaks() {		
		$viewHelper = $this->getMock('Tx_ViewHelpers_ViewHelpers_JsStringViewHelper', array('renderChildren'));
		$viewHelper->expects($this->once())->method('renderChildren')->will($this->returnValue('Line 1' . chr(10) . 'Line 2'));
		$actualResult = $viewHelper->render();
		$this->assertEquals('Line 1Line 2', $actualResult);
	}

	/**
	 * Inspired by Bastian Waidlich's test for the nl2br-viewhelper
	 * 
	 * @test
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function viewHelperRemovesWindowsLineBreaks() {
		$viewHelper = $this->getMock('Tx_ViewHelpers_ViewHelpers_JsStringViewHelper', array('renderChildren'));
		$viewHelper->expects($this->once())->method('renderChildren')->will($this->returnValue('Line 1' . chr(13) . chr(10) . 'Line 2'));
		$actualResult = $viewHelper->render();
		$this->assertEquals('Line 1Line 2', $actualResult);
	}

	/**
	 * @test
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function viewHelperEscapesSingleQuote() {
		$viewHelper = $this->getMock('Tx_ViewHelpers_ViewHelpers_JsStringViewHelper', array('renderChildren'));
		$viewHelper->expects($this->once())->method('renderChildren')->will($this->returnValue("This ' should be escaped!"));
		$actualResult = $viewHelper->render();
		$this->assertEquals("This \' should be escaped!", $actualResult);
	}

	/**
	 * @test
	 * @author Marco Huber <typo3extension@marco-huber.de>
	 */
	public function viewHelperEscapesDoubleQuote() {
		$viewHelper = $this->getMock('Tx_ViewHelpers_ViewHelpers_JsStringViewHelper', array('renderChildren'));
		$viewHelper->expects($this->once())->method('renderChildren')->will($this->returnValue('This " should be escaped!'));
		$actualResult = $viewHelper->render('"');
		$this->assertEquals('This \" should be escaped!', $actualResult);
	}

}

?>