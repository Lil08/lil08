<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Comments;
use common\models\Post;
use frontend\helpers\SiteHelper;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class PostController extends Controller
{
    public function actionIndex(string $category)
    {
        $category = Category::find()->where(['code' => $category])->one();
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет');
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->with('tags')->where(['active' => true])->andWhere(['category_id' => $category->id]),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(string $category, string $code)
    {
        $category = Category::find()->where(['code' => $category])->one();
        if (empty($category)) {
            throw new NotFoundHttpException('Такой категории нет');
        }

        /**@var Post $model */
        $model = Post::find()
            ->where(['code' => $code])
            ->one();

        if (empty($model)) {
            throw new NotFoundHttpException('Такого поста не существует');
        }

        $comments = Comments::find()
            ->where(['post_id' => $model->id])
            ->andWhere(['active' => true])
            ->all();

        $formComment = new Comments();

        if ($this->request->isPost) {
            if ($formComment->load($this->request->post()) && $formComment->validate() && $formComment->save()) {
                Yii::$app->session->setFlash('success', 'Комментарий отправлен');
                return $this->refresh();
            }

        } else {
            Yii::$app->session->setFlash('error', 'Ошибка');
        }

        return $this->render('view', compact('model', 'comments', 'formComment'));
    }

}