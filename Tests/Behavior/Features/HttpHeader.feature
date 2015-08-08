Feature: HttpHeader
  In order to see the active flow context
  As a client or browser
  There should be a HTTP header indicating the active context

  Scenario Outline: A client visits an URL
    Given the current active context is "Testing/Behat"
      And the header is configured to be <header>
     When I visit an URL
     Then the response should contain the HTTP header <header>
      And the value of the HTTP header should be "Testing/Behat"

    Examples:
      | header                  |  
      | "X-ACTUAL_FLOW_CONTEXT" |  
      | "FOOBAR"                |  
      | "Some_Other_Header"     |  
