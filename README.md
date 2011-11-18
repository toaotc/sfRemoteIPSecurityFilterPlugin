#sfRemoteIPSecurityFilterPlugin

This plugin adds remote IP-filtering to symfony's security context.

## Installation 

### git:
	
	git clone git://github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

### subversion:

    svn checkout http://svn.github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

## Configuration

### Enable the plugin
``` php
// config/ProjectConfiguration.class.php

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
	// ...
    $this->enablePlugins('sfRemoteIPSecurityFilterPlugin');
  }
}
```	

### Activate sfRemoteIPSecurityFilter
``` yaml
// config/filter.yml

rendering: ~
security:  ~

security_ip:
  class: sfRemoteIPSecurityFilter

cache:     ~
execution: ~

```
