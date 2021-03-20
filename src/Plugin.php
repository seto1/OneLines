<?php
namespace OneLines;

use BaserCore\BcPlugin;

class Plugin extends BcPlugin
{
    public function install($options = []) : bool
    {
        return parent::install($options);
    }

    public function uninstall(): bool
    {
        return parent::uninstall();
    }

}
