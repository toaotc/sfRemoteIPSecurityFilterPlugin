#sfRemoteIPSecurityFilterPlugin

This plugin adds remote IP-filtering to symfony's security context.

## Installation 

### git:
	
	git clone git://github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

### subversion:

    svn checkout http://svn.github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

## Configuration

### Enable the plugin
> config/ProjectConfiguration.class.php

``` php
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
> config/filter.yml

``` yaml
rendering: ~
security:  ~

security_ip:
  class: sfRemoteIPSecurityFilter

cache:     ~
execution: ~

```
