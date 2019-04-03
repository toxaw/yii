<?php

namespace app\controllers;

use Yii;

use yii\web\Controller;

use app\models\LoginForm;

use app\models\RegistrForm;

use app\models\ContactForm;

use app\models\CollegeModel;

use app\models\StudentsModel;

use app\models\User;

use yii\base\Theme;

use yii\web\Response;

use yii\bootstrap\ActiveForm;

use yii\web\Cookie;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */

    public function behaviors() 
    {
        return [];
    }

    public function beforeAction($action)
    {
        //переопределяем тему на лету
        
        if(!is_null(Yii::$app->request->get('theme')))
        {
            if(Yii::$app->request->get('theme'))
            {
               Yii::$app->response->cookies->add(new Cookie([
                'name'  => 'theme',
                'value' => '1'
                ]));
            }
            else
            {
                Yii::$app->response->cookies->remove('theme');
            }
        }

        if((is_null(Yii::$app->request->get('theme')) && isset(Yii::$app->request->cookies['theme'])) || 
            (!is_null(Yii::$app->request->get('theme')) && Yii::$app->request->get('theme')))
        {

            Yii::$app->view->theme = new Theme([
                'baseUrl'    => 'protected/themes/mytheme', //базовая директория, в которой размещены темизированные ресурсы (CSS, JS, изображения, и так далее).
                'basePath'   => '@app/themes/mytheme', //базовый URL для доступа к темизированным ресурсам.
                'pathMap'    => ['@app/views' => '@app/themes/mytheme'], //правила замены файлов представлений
                ]);
        }

        return true;
    }

    public function actionIndex($theme = null)
    {
        if((is_null($theme) && isset(Yii::$app->request->cookies['theme'])) || 
            (!is_null($theme) && $theme))
        {
            $model = new StudentsModel();
        }
        else
        {
            $model = new CollegeModel();            
        }

        $data = $model->getAllRows();

        return $this->render('index',['data'=>$data]);
    }

    public function actionLogin() 
    {
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new LoginForm();

        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post()) && $model->login()) 
        {

            return $this->goHome();
        }

        $model->password = '';

        return $this->render('login', [
                    'model' => $model,
        ]);
    }

    public function actionRegistr() 
    {
        if (!Yii::$app->user->isGuest) 
        {
            return $this->goHome();
        }

        $model = new RegistrForm();
        
        if (Yii::$app->request->isAjax && $model->load(Yii::$app->request->post())) 
        {
            Yii::$app->response->format = Response::FORMAT_JSON;

            return ActiveForm::validate($model);
        }

        if ($model->load(Yii::$app->request->post())) 
        {
            if ($user = $model->registr()) 
            {
                if (Yii::$app->getUser()->login($user)) 
                {
                    return $this->goHome();
                }
            }
        }

        return $this->render('registr', [
                    'model' => $model,
        ]);
    }
   
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
