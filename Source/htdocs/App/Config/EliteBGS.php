<?php
namespace Config;
use CodeIgniter\Config\BaseConfig;

/**
 *
 * @author Jan Zelenka <jan.zelenka@clickworks.eu>
 *
 */
class EliteBGS extends BaseConfig
{
    /**
     * The URI of the Elite BGS endpoints root.
     * @var string
     */
    public $strUrlRoot = 'https://elitebgs.app/api/ebgs/v5/';

    /**
     * The format times are sent back in by the Elite BGS service.
     * @var string
     */
    public $strTimeFormat = 'Y-m-d?H:i:s.v?';

    /**
     * The timezone of the Elite BGS time properties.
     * @var string
     */
    public $strTimeZone = 'UTC';
}

