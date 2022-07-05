<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Comments;
use common\models\Post;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;

class PostController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Post::find()->with('tags')->where(['active' => true]),
            'pagination' => [
                'pageSize' => 10,
            ]
        ]);

        return $this->render('index', compact('dataProvider'));
    }

    public function actionView(string $category, string $code)
    {
        $category = Category::find()->where(['code' => $category])->one();

        /**@var Post $model */
        $model = Post::find()
            ->where(['code' => $code])
            ->one();
        //обработать ошибку
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