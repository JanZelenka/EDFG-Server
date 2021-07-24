<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EDStarMap extends BaseConfig
{
    /**
     * The URI of the Elite Dangerous Star Map endpoints root.
     * @var string
     */
    public string $strUrlRoot = 'https://www.edsm.net/api-v1/';
}

