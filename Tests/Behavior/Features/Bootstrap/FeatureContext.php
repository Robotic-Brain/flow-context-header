<?php
use Behat\Behat\Exception\PendingException;
use Behat\Gherkin\Node\TableNode,
	Behat\MinkExtension\Context\MinkContext;
use TYPO3\Flow\Utility\Arrays;
use PHPUnit_Framework_Assert as Assert;

require_once(__DIR__ . '/../../../../../Flowpack.Behat/Tests/Behat/FlowContext.php');

/**
 * Features context
 */
class FeatureContext extends MinkContext {
	/**
	 *
	 * @var \TYPO3\Flow\Object\ObjectManagerInterface
	 */
	protected $objectManager;
	
	/**
	 * Initializes the context
	 *
	 * @param array $parameters Context parameters (configured through behat.yml)
	 */
	public function __construct(array $parameters) {
		$this->useContext('flow', new \Flowpack\Behat\Tests\Behat\FlowContext($parameters));
		$this->objectManager = $this->getSubcontext('flow')->getObjectManager();
	}
	
	/**
	 * @Then /^I should see some output from behat$/
	 */
	public function iShouldSeeSomeOutputFromBehat() {
		return TRUE;
	}
	
	/**
	 * @Given /^the current active context is "([^"]*)"$/
	 */
	public function theCurrentActiveContextIs($arg1) {
		$actualContext = "Development";
		if ($actualContext !== $arg1) {
			throw new Exception("Actually switching the active context is not supported! Ctx: " . $actualContext);
		}
	}
	
	/**
	 * @Given /^the header is configured to be "([^"]*)"$/
	 */
	public function theHeaderIsConfiguredToBe($arg1) {
		if ($arg1 !== 'X-ACTUAL_FLOW_CONTEXT') {
			throw new PendingException("Canging configuration not supported yet");
		}
	}
	
	/**
	 * @When /^I visit an URL$/
	 */
	public function iVisitAnUrl() {
		$this->visit("/");
	}
	
	/**
	 * @Then /^the response should contain the HTTP header "([^"]*)" with the content "([^"]*)"$/
	 */
	public function theResponseShouldContainTheHttpHeaderWithTheContent($arg1, $arg2) {
		$arg1 = strtolower($arg1);
		$headers = $this->getSession()->getResponseHeaders();
		if (!isset($headers[$arg1])) {
			throw new Exception("Header not present" . print_r($headers, true));
		} elseif ($headers[$arg1][0] !== $arg2) {
			throw new Exception("Header value is " . $headers[$arg1][0]);
		}
	}
}
