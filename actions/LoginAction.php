<?php
namespace denchotsanov\yii2usermodule\actions;

use Yii;
use yii\web\Response;
use yii\widgets\ActiveForm;
/**
 * Class LoginAction
 */
class LoginAction extends Action
{
    /**
     * @var string name of the view, which should be rendered
     */
    public $view = '@vendor/denchotsanov/yii2usermodule/views/login';
    /**
     * @var string Login Form className
     */
    public $modelClass = 'denchotsanov\yii2usermodule\models\LoginForm';
    /**
     * @var string layout the name of the layout to be applied to this view
     */
    public $layout;
    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->layout !== null) {
            $this->controller->layout = $this->layout;
        }
    }

    /**
     * Logs in a user.
     *
     * @return array|string
     * @throws \yii\base\InvalidConfigException
     */
    public function run()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirectTo(Yii::$app->getHomeUrl());
        }
        $model = Yii::createObject($this->modelClass);
        $load = $model->load(Yii::$app->request->post());
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }
        if ($load && $model->login()) {
            return $this->redirectTo(Yii::$app->getUser()->getReturnUrl());
        }
        return $this->controller->render($this->view, [
            'model' => $model,
        ]);
    }
}