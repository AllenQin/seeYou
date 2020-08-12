<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://doc.hyperf.io
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use App\Service\Live\LiveItemService;
use Hyperf\Di\Annotation\Inject;
use Hyperf\Di\Exception\NotFoundException;
use Hyperf\HttpServer\Annotation\AutoController;

/**
 * Class IndexController
 *
 * @AutoController()
 *
 * @package App\Controller
 */
class IndexController extends AbstractController
{
    /**
     * @Inject()
     *
     * @var LiveItemService
     */
    protected $liveItemService;

    public function index()
    {
        $item = $this->liveItemService->findItemById($this->request->query('id', 1));

        return $this->response->json($item);
    }

    public function update()
    {
        $id = $this->request->post('id', 1);

        if (!$item = $this->liveItemService->findItemById($id)) {
            throw new NotFoundException('Not Found');
        }

        $ret = $this->liveItemService->updateItem($item, $this->request->post());

        return $this->response->json(compact('ret'));
    }
}
