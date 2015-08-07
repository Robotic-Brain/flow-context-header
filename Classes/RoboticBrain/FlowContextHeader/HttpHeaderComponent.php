<?php
namespace RoboticBrain\FlowContextHeader;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "RoboticBrain.FlowContextHeader".*
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Http\Component\ComponentInterface;
use TYPO3\Flow\Http\Component\ComponentContext;
use TYPO3\Flow\Annotations as Flow;

class HttpHeaderComponent implements ComponentInterface {
	
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Object\ObjectManagerInterface
	 */
	protected $objectManager;
	
	/**
	 * @var array
	 */
	protected $options;
	
	/**
	 * @param array $options
	 */
	public function __construct(array $options = array()) {
		$this->options = $options;
	}
	
	/**
	 * @param ComponentContext $componentContext
	 * @return void
	 */
	public function handle(ComponentContext $componentContext) {
		$httpResponse = $componentContext->getHttpResponse();
		$httpResponse->setHeader($this->options['headerName'], $this->objectManager->getContext()->__toString());
	}
}