<?php
 
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\Model as Paginator;


class ProductController extends ControllerBase
{
    /**
     * Index action
     */
    public function indexAction()
    {
        $this->persistent->parameters = null;
    }

    /**
     * Searches for product
     */
    public function searchAction()
    {
        $this->tag->setTitle('Phalcon :: Lista de producto');
        $numberPage = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, 'Product', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numberPage = $this->request->getQuery("page", "int");
        }

        $parameters = $this->persistent->parameters;
        if (!is_array($parameters)) {
            $parameters = [];
        }
        $parameters["order"] = "id";

        $product = Product::find($parameters);
        if (count($product) == 0) {
            $this->flash->notice("The search did not find any product");

            $this->dispatcher->forward([
                "controller" => "product",
                "action" => "index"
            ]);
            $this->persistent->parameters = null;
            return;
        }

        $paginator = new Paginator([
            'data' => $product,
            'limit'=> 10,
            'page' => $numberPage
        ]);

        $this->view->page = $paginator->getPaginate();
    }

    /**
     * Displays the creation form
     */
    public function newAction()
    { 
        $this->tag->setTitle('Phalcon :: Crear producto');

    }

    /**
     * Edits a product
     *
     * @param string $id
     */
    public function editAction($id)
    {
        $this->tag->setTitle('Phalcon :: Editar producto');
        $url_id = urldecode(strtr($id,"'",'%'));
        $articleId = $this->crypt->decryptBase64($url_id);
        if (!$this->request->isPost()) {

            $product = Product::findFirstByid($articleId);
            if (!$product) {
                $this->flash->error("product was not found");

                $this->dispatcher->forward([
                    'controller' => "product",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->id = $product->getId();

            $this->tag->setDefault("id", $product->getId());
            $this->tag->setDefault("name", $product->getName());
            $this->tag->setDefault("description", $product->getDescription());
            $this->tag->setDefault("updated_at", time());
            
        }
    }

    /**
     * Creates a new product
     */
    public function createAction()
    {
       
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'index'
            ]);

            return;
        }

        $product = new Product();
        $product->setname($this->request->getPost("name"));
        $product->setdescription($this->request->getPost("description"));
        $product->setcreatedAt(time());
        $product->setupdatedAt(time());
        

        if (!$product->save()) {
            foreach ($product->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("Producto agregado correctamente");

        // $this->dispatcher->forward([
        //     'controller' => "product",
        //     'action' => 'search'
        // ]);
        return $this->response->redirect('product/search');
    }

    /**
     * Saves a product edited
     *
     */
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'index'
            ]);

            return;
        }

        $id = $this->request->getPost("id");
        $product = Product::findFirstByid($id);

        if (!$product) {
            $this->flash->error("product does not exist " . $id);

            // $this->dispatcher->forward([
            //     'controller' => "product",
            //     'action' => 'index'
            // ]);
            return $this->response->redirect('product/search');

            return;
        }

        $product->setname($this->request->getPost("name"));
        $product->setdescription($this->request->getPost("description"));
        $product->setcreatedAt(time());
        $product->setupdatedAt(time());
        

        if (!$product->save()) {

            foreach ($product->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'edit',
                'params' => [$product->getId()]
            ]);

            return;
        }

        $this->flash->success("Producto actualizado correctamente");

        // $this->dispatcher->forward([
        //     'controller' => "product",
        //     'action' => 'index'
        // ]);
        return $this->response->redirect('product/search');
    }

    /**
     * Deletes a product
     *
     * @param string $id
     */
    public function deleteAction($id)
    {
        $url_id = urldecode(strtr($id,"'",'%'));
        $articleId = $this->crypt->decryptBase64($url_id);
        $product = Product::findFirstByid($articleId);
        if (!$product) {
            $this->flash->error("product was not found");

            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'index'
            ]);

            return;
        }

        if (!$product->delete()) {

            foreach ($product->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "product",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("Producto eliminado correctamente");

        // $this->dispatcher->forward([
        //     'controller' => "product",
        //     'action' => "index"
        // ]);
        return $this->response->redirect('product/search');
    }

}
