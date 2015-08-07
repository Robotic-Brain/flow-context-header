<?php
namespace RoboticBrain\FlowContextHeader;

/*
 * This script belongs to the TYPO3 Flow package "RoboticBrain.FlowContextHeader"
 */

use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class BootstrapProxy {
	
	protected $bootstrap;
	
	/**
	 * Constructor.
	 * The Object Manager will automatically be passed (injected) by the object
	 * framework on instantiating this class.
	 *
	 * @param \TYPO3\Flow\Object\ObjectManagerInterface $objectManager
	 */
	public function __construct(\TYPO3\Flow\Object\ObjectManagerInterface $objectManager) {
		$this->setBootstrapInstance(
				$objectManager->get('TYPO3\Flow\Core\Bootstrap')
		);
	}
	
	public function setBootstrapInstance(\TYPO3\Flow\Core\Bootstrap $bootstrap) {
		$this->bootstrap = $bootstrap;
	}
	
	public function getBootstrapInstance() {
		return $this->bootstrap;
	}
}