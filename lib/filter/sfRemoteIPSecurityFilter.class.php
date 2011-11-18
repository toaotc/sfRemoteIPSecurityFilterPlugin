<?php
class sfRemoteIPSecurityFilter extends sfFilter
{
	public function execute($filterChain)
	{
		$request = $this->context->getRequest();
		$ip = $request->getHttpHeader('addr', 'remote');
		
		$actionName = $this->context->getActionName();
		$moduleName = $this->context->getModuleName();
		$action = $this->context->getController()->getAction($moduleName, $actionName);
		
		$security = $this->context->getController()->getActionStack()->getLastEntry()->getActionInstance()->getSecurityConfiguration();
		$is_allowed = true;
		
		if(isset($security[$actionName]['addresses']))
		{
			$is_allowed = in_array($ip, $security[$actionName]['addresses']);
		}
		elseif(isset($security['all']['addresses']))
		{
			$is_allowed = in_array($ip, $security['all']['addresses']);
		}
		
		if(!$is_allowed)
		{
			if(sfConfig::get('sf_logging_enabled'))
			{
				$this->context->getEventDispatcher()->notify(new sfEvent($this, 'application.log', array(sprintf('Action "%s/%s" not allowed for IP %s', $moduleName, $actionName, $ip), 'priority' => sfLogger::NOTICE)));
			}
			
			$this->context->getController()->forward(sfConfig::get('sf_secure_module'), sfConfig::get('sf_secure_action'));
			throw new sfStopException();
			
//			$this->context->getResponse()->setStatusCode(401);
//			return sfView::HEADER_ONLY;
		}
		
		$filterChain->execute();
	}
}