<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Small Exercise</title>
  </head>
  <body>
    <p>
        <?php

        class MyModel
        {
            private $data;

            public function __construct()
            {
                $this->data = "Hello World!";
            }

            public function set_data($data)
            {
                $this->data = $data;
            }

            public function get_data()
            {
                return $this->data;
            }
        }

        class IndexView
        {
            private $model;
            private $controller;

            public function __construct($model, $controller)
            {
                $this->controller = $controller;
                $this->model = $model;
            }

            public function render()
            {
                return '<a href="index.php?action=mouseButtonPressed">' . $this->model->get_data() . '</a>';
            }
        }

        class IndexController
        {
            private $model;

            public function __construct($model)
            {
                $this->model = $model;
            }

            public function mouseButtonPressed()
            {
                $this->model->set_data("Updated Hello World!");
            }
        }

        $my_model = new MyModel();
        $index_controller = new IndexController($my_model);
        $index_view = new IndexView($my_model, $index_controller);

        if (isset($_GET['action']) && $_GET['action'] == 'mouseButtonPressed') {
            $index_controller->mouseButtonPressed();
        }

        echo $index_view->render();
        ?>

    </p>
  </body>
</html>
