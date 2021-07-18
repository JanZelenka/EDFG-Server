<?php
namespace App\Controllers\Base;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use App\Entities\BgsTick;

/**
 *
 * @author Jan Zelenka <jan.zelenka@telenet.be>
 *
 */
class TickSensitive extends Base
{
    /**
     * Constructor.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param LoggerInterface   $logger
     */
    public function initController(
            RequestInterface $request
            , ResponseInterface $response
            , LoggerInterface $logger
            )
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);


        //--------------------------------------------------------------------
        // Preload any models, libraries, etc, here.
        //--------------------------------------------------------------------
        // E.g.: $this->session = \Config\Services::session();
        BgsTick::refreshTick();
    }
}

