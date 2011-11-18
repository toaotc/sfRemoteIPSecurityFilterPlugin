#sfRemoteIPSecurityFilterPlugin

This plugin adds remote IP-filtering to symfony's security context.

## Installation 

### git:
	
	git clone git://github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

### subversion:

    svn checkout http://svn.github.com/toaotc/sfRemoteIPSecurityFilterPlugin.git plugins/sfRemoteIPSecurityFilterPlugin

## How to…

### …enable the plugin
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


### …activate sfRemoteIPSecurityFilter
> config/filter.yml

``` yaml
rendering: ~
security:  ~

security_ip:
  class: sfRemoteIPSecurityFilter

cache:     ~
execution: ~

```

### …use
* app/your_app/config/security.yml
* app/your_app/modules/your_module/config/security.yml

``` yaml
all:
  addresses:
    - 127.0.0.1
```