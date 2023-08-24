<?php

namespace app\commands;
use yii\console\Controller;
use app\models\User;
use Yii;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); //удалить старые записи из БД

        //Создаем роли
        $guest = $auth->createRole('guest');
        $user = $auth->createRole('user');
        $admin = $auth->createRole('admin');

        //Запись ролей в БД
        $auth->add($guest);
        $auth->add($user);
        $auth->add($admin);

        //Создаем разрешение ролей
        $registration = $auth->createPermission('registration');
        $registration->description = 'Регистрация';

        $viewAdminPage = $auth->createPermission('viewAdminPage');
        $viewAdminPage->description = 'Административная панель';

        //Запись роли в БД
        $auth->add($registration);
        $auth->add($viewAdminPage);

        //Присваиваем разрешение ролям
        $auth->addChild($admin, $viewAdminPage);
        $auth->addChild($user, $registration);

        //Наследование ролей
        $auth->addChild($admin, $user);

        //Прописиваем, кто админ
        $auth->assign($admin, 1);
        // $auth->assign($user, 2);
    }
    
}