RoboticBrain.FlowContextHeader |version| Documentation
==================================================================================================

.. note::
   This documentation covering version |release| has been rendered at: |today|

Introduction
------------

This package simply adds a HTTP header, which contains the active FlowContext.

.. note::
   This package is for development purposes only!

Configuration
--------------------

You can configure the header to be used in your Settings.yaml

.. literalinclude:: ../Configuration/Settings.yaml
   :start-after: # START SPHINX INCLUDE1
   :end-before: # END SPHINX INCLUDE1
   :emphasize-lines: 9


Helpful Snippets
---------------------

To enable context selection by the browser, add something like this to the top of your .htaccess file:

.. code-block:: apacheconf

   <IfModule setenvif_module>
       SetEnvIf X-FLOW_REQUEST_CONTEXT (.*) FLOW_CONTEXT=$1
   </IfModule>

.. danger::
   This might pose some serious security threats!
